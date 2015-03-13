<?php

class EzAdSenseFront {

  var $leadin, $leadout, $options, $defaultText;
  static $ezMax = 3, $ezCount = 0;
  static $urMax = 1, $urCount = 0;

  function EzAdSenseFront() {
    $optionSet = EzGA::getMobileType();
    if ($optionSet == "Killed") {
      EzGA::$noAds = true;
      $optionSet = "";
    }
    $this->options = EzGA::getOptions($optionSet);
    $this->defaultText = $this->options['defaultText'];
    // Counts and limis
    self::$ezMax = $this->options['max_count'];
    self::$urMax = $this->options['max_link'];
  }

  function ezMax() {
    return self::$ezMax;
  }

  function ezCount() {
    return self::$ezCount;
  }

  function handleDefaults() {
    $texts = array('text_leadin', 'text_midtext', 'text_leadout');
    foreach ($texts as $t) {
      $text = $this->options[$t];
      $this->options[$t] = EzGA::handleDefaultText($text);
    }
  }

  function mkAdBlock($slot) {
    if ($slot != 'lu' && $slot != 'gsearch') {
      self::$ezCount++;
    }
    $adText = $this->options["text_$slot"];
    $info = EzGA::info();
    if (empty($adText)) {
      $adBlock = "\n$info\n<!-- [$slot: Empty adText: " . self::$ezCount . " of " .
              self::$ezMax . "] -->\n";
    }
    else {
      $border = EzGA::mkBorder();
      $show = EzGA::$metaOptions["show_$slot"];
      $margin = $this->options["margin_$slot"];
      if (!empty($this->options['kill_linebreaks'])) {
        $linebreak = "";
      }
      else {
        $linebreak = "\n";
      }
      if (!empty($this->options['kill_inline'])) {
        $inline = '';
      }
      else {
        $inline = 'style="' . $show . ';margin:' .
                $margin . 'px;' . $border . '"';
      }
      $unreal = EzGA::showUnreal(false);
      $adBlock = stripslashes($linebreak . $info . $linebreak .
              "<!-- [$slot: " . self::$ezCount . " of " . self::$ezMax .
              " urCount: " . self::$urCount . " urMax: " . self::$urMax .
              "] -->$linebreak" .
              "<div class='ezAdsense adsense adsense-$slot' $inline>" .
              $adText .
              (self::$urCount++ < self::$urMax ? $unreal : '') .
              "</div>" . $linebreak . $info . $linebreak);
    }
    return $adBlock;
  }

  function filterContent($content) {
    $content = EzGA::preFilter($content);
    if (EzGA::$noAds) {
      return $content;
    }

    if (!empty($this->options['force_widget']) && self::$ezCount == 0) {
      // reserve a count for the widget
      self::$ezMax--;
    }
    $plgName = EzGA::getPlgName();
    if (self::$ezCount >= self::$ezMax) {
      return $content . " <!-- $plgName: Unfiltered [count: " .
              self::$ezCount . " is not less than " . self::$ezMax . "] -->";
    }

    $adMax = self::$ezMax;
    $adCount = 0;
    if (!is_singular()) {
      if (isset(EzGA::$options['excerptNumber'])) {
        $adMax = EzGA::$options['excerptNumber'];
      }
    }

    list($content, $return) = EzGA::filterShortCode($content);
    if ($return) {
      return $content;
    }

    $this->handleDefaults();
    $wc = str_word_count($content);
    $metaOptions = EzGA::getMetaOptions();
    $show_leadin = $metaOptions['show_leadin'];
    $leadin = '';
    if ($show_leadin != 'no' && empty($this->options['header_leadin']) && $wc > $this->options['wc_leadin']) {
      if (self::$ezCount < self::$ezMax && $adCount++ < $adMax) {
        $leadin = $this->mkAdBlock("leadin");
      }
    }

    $show_midtext = $metaOptions['show_midtext'];
    $midtext = '';
    if ($show_midtext != 'no' && $wc > $this->options['wc_midtext']) {
      if (self::$ezCount < self::$ezMax && $adCount++ < $adMax) {
        if (!EzGA::$foundShortCode) {
          $paras = EzGA::findParas($content);
          $half = sizeof($paras);
          while (sizeof($paras) > $half) {
            array_pop($paras);
          }
          $split = 0;
          if (!empty($paras)) {
            $split = $paras[floor(sizeof($paras) / 2)];
          }
          if ($this->options['force_midad'] || $half > 10) {
            $midtext = $this->mkAdBlock("midtext");
            $content = substr($content, 0, $split) . $midtext . substr($content, $split);
          }
        }
        else {
          $midtext = $this->mkAdBlock("midtext");
        }
      }
    }

    $show_leadout = $metaOptions['show_leadout'];
    $leadout = '';
    if ($show_leadout != 'no' && $wc > $this->options['wc_leadout']) {
      if (self::$ezCount < self::$ezMax && $adCount++ < $adMax) {
        $leadout = $this->mkAdBlock("leadout");
        if (!EzGA::$foundShortCode && strpos($show_leadout, "float") !== false) {
          $paras = EzGA::findParas($content);
          $split = array_pop($paras);
          if (!empty($split)) {
            $content1 = substr($content, 0, $split);
            $content2 = substr($content, $split);
          }
        }
      }
    }
    if (!empty($this->options['header_leadin'])) {
      $this->leadin = $leadin;
      $leadin = '';
    }
    if (!empty($this->options['footer_leadout'])) {
      $this->leadout = $leadout;
      $leadout = '';
    }
    if (EzGA::$foundShortCode) {
      $content = EzGA::handleShortCode($content, $leadin, $midtext, $leadout);
    }
    else {
      if (empty($content1)) {
        $content = $leadin . $content . $leadout;
      }
      else {
        $content = $leadin . $content1 . $leadout . $content2;
      }
    }
    return $content;
  }

  // This is add_action target to either the_content, loop_start or send_headers.
  function filterHeader($arg) {
    if (is_admin()) {
      return $arg;
    }
    // is_feed() is not ready, because the WP query may not be run yet.
    if (strpos($_SERVER['REQUEST_URI'], 'feed') !== false) {
      return $arg;
    }
    if (EzGA::isKilled()) {
      return $arg;
    }
    $show_leadin = $this->options['show_leadin'];
    if ($show_leadin != 'no') {
      $metaOptions = EzGA::getMetaOptions();
      if (empty($metaOptions['adsense']) ||
              (!empty($metaOptions['adsense']) && $metaOptions['adsense'] != 'no')) {
        EzGA::$metaOptions['show_leadin'] = '';
        echo $this->mkAdBlock("leadin");
        EzGA::$metaOptions = array();
      }
    }
    return $arg;
  }

  function filterFooter($arg) {
    if (is_admin()) {
      return $arg;
    }
    echo $this->leadout;
    return $arg;
  }

}

$ezAdSenseFront = new EzAdSenseFront();
if (!empty($ezAdSenseFront)) {
  add_filter('the_content', array($ezAdSenseFront, 'filterContent'));
  require_once 'easy-adsense-widget.php';
  EzWidget::setPlugin($ezAdSenseFront);
  if (EzGA::isPro()) {
    if (!empty(EzGA::$options['enableShortCode'])) {
      $shortCodes = array('ezadsense', 'adsense');
      foreach ($shortCodes as $sc) {
        add_shortcode($sc, array('EzGAPro', 'processShortcode'));
      }
    }
  }
  if (EzGA::$options['max_link'] === -1) {
    add_action('wp_footer', array($ezAdSenseFront, 'showUnreal', 1));
  }
  if (!empty(EzGA::$options['header_leadin'])) {
    add_action(EzGA::$options['header_leadin'], array($ezAdSenseFront, 'filterHeader'));
  }
  if (!empty(EzGA::$options['footer_leadout'])) {
    add_action(EzGA::$options['footer_leadout'], array($ezAdSenseFront, 'filterFooter'));
  }
}
