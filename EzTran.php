<?php

/*
  Copyright (C) 2008 www.ads-ez.com

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 3 of the License, or (at
  your option) any later version.

  This program is distributed in the hope that it will be useful, but
  WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
  General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if (!class_exists("PO")) {

  class PO { // an id-str pair with attributes

    var $num, $id, $str, $tranId, $tranVal, $keyId, $keyVal, $tl = '';

    const MINMATCH = 89;

    function __construct($id, $str) {
      $this->id = (string) $id;
      $this->str = (string) $str;
      $this->tranVal = self::MINMATCH;
      $this->keyVal = self::MINMATCH;
    }

    function PO($id, $str) {
      if (version_compare(PHP_VERSION, "5.0.0", "<")) {
        $this->__construct($id, $str);
        register_shutdown_function(array($this, "__destruct"));
      }
    }

    // Returns a properly escaped string
    static function decorate($str, $esc) {
      if (!get_magic_quotes_gpc()) {
        $str = addcslashes($str, $esc);
      }
      return $str;
    }

    static function undecorate($str) {
      if (!get_magic_quotes_gpc()) {
        $str = stripslashes($str);
      }
      return $str;
    }

    // Returns a text-area string of the Id
    function textId() {
      $ht = round(strlen($this->id) / 52 + 1) * 25;
      $col = 'background-color:#f5f5f5;';
      $tit = '';
      if ($this->keyVal > self::MINMATCH + 1) {
        $col = "background-color:#ffc;border: solid 1px #f00";
        $tit = 'onmouseover = "Tip(\'Another similar string: ' .
                htmlspecialchars('<br /><em><b>' . addslashes($this->keyId) .
                        '</b></em><br /> ', ENT_QUOTES) .
                'exists. Please alert the author.\',WIDTH, 300)" ' .
                'onmouseout="UnTip()"';
      }
      $s = '<textarea cols="50" rows="15" name="k' . $this->num .
              '" style="width: 45%;height:' . $ht . 'px;' . $col . '" ' .
              $tit . ' readonly="readonly">';
      $s .= htmlspecialchars($this->id, ENT_QUOTES);
      $s .= '</textarea>&nbsp;&nbsp;';
      return $s;
    }

    function textStr() {
      $ht = round(strlen($this->id) / 52 + 1) * 25;
      $col = '';
      $tit = '';
      if ($this->tranVal > self::MINMATCH + 1) {
        $col = "background-color:#fdd;border: solid 1px #f00";
        $tit = 'onmouseover = "Tip(\'Using the translation for a similar string: ' .
                htmlspecialchars('<br /><em><b>' . addslashes($this->tranId) .
                        '</b></em><br />', ENT_QUOTES) .
                'Please check carefully.\',WIDTH, 300)" ' .
                'onmouseout="UnTip()"';
      }
      if (empty($this->str) && !empty($this->tl)) {
        $col = "background-color:#dff;border: solid 1px #0ff";
        $tit = 'onmouseover = "Tip(\'Using Machine Translation from Google.<br />Please check carefully.\',WIDTH, 300)" ' .
                'onmouseout="UnTip()"';
        $this->str = $this->googleTran();
      }
      $s = '<textarea cols="50" rows="15" name="' . $this->num .
              '" style="width: 45%;height:' . $ht . 'px;' . $col . '" ' .
              $tit . '>';
      $s .= htmlspecialchars($this->str, ENT_QUOTES);
      $s .= '</textarea><br />';
      return $s;
    }

    function googleTran1($q) {
      $tl = $this->tl;
      $sl = "auto";
      if (!$q) {
        return;
      }
      $url = 'http://translate.google.com/translate_a/t?client=a&q=' . $q . '&tl=' . $tl . '&sl=' . $sl;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //must set agent for google to respond with utf-8
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
      $output = curl_exec($ch);
      curl_close($ch);
      if ($output === false) {
        return "No help (output) from Google!";
      }
      $jsonarr = json_decode($output);
      if (!$jsonarr) {
        return "No help (json) from Google!";
      }
      if (isset($jsonarr->results)) {
        $ret = $jsonarr->results[0]->sentences[0]->trans;
      }
      else {
        $ret = $jsonarr->sentences[0]->trans;
      }
      return $ret;
    }

    function googleTran() {
      $sentences = preg_split('/(?<=[.?!;:])\s+/', $this->id, -1, PREG_SPLIT_NO_EMPTY);
      $ret = '';
      foreach ($sentences as $s) {
        $q = urlencode($s);
        $ret .= ' ' . $this->googleTran1($q);
      }
      return trim($ret);
    }

    function setTl($tl) {
      $this->tl = $tl;
    }

  }

}

if (!class_exists("EzTran")) {

  class EzTran {

    var $status, $error, $plgName, $plgDir, $plgURL, $domain, $locale, $state,
            $isEmbedded = true, $isPro = false;
    var $adminMsg;
    var $helpers;

    function __construct($plgFile, $plgName, $domain = '') {
      $this->helpers = array('easy-adsense');
      if (!empty($_POST['ezt-savePot'])) {
        // saving cannot be done from handleSubmits
        // because it would be too late for the headers.
        $file = $_POST['potFile'];
        $str = $_POST['potStr'];
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header("Content-Transfer-Encoding: ascii");
        header('Expires: 0');
        header('Pragma: no-cache');
        ob_start();
        print htmlspecialchars_decode($str, ENT_QUOTES);
        ob_end_flush();
        $this->status = '<div class="updated">Pot file: ' . $file . ' was saved.</div> ';
        exit(0);
      }
      $this->status = '';
      $this->error = '';
      if (empty($plgName)) {
        $plgName = basename($plgFile, '.php');
        $plgName = ucfirst(strtr('-_', '  ', $plgName));
      }
      $this->plgName = $plgName;
      if (empty($domain)) {
        $domain = strtolower(strtr(' !.,', '----', $plgName));
        $domain = str_replace("--", "-", $domain);
      }
      $this->domain = $domain;
      $this->plgDir = dirname($plgFile);
      $this->plgURL = plugin_dir_url($plgFile);
      $locale = get_locale();
      $this->locale = str_replace('-', '_', $locale);
      if (!session_id()) {
        session_start();
      }
      if (empty($_SESSION[$this->domain])) {
        $_SESSION[$this->domain] = array();
      }
    }

    function EzTran($plgFile, $plgName = '', $domain = '') {
      if (version_compare(PHP_VERSION, "5.0.0", "<")) {
        $this->__construct($plgName, $domain);
        register_shutdown_function(array($this, "__destruct"));
      }
    }

    // Return the contents of all PHP files in the dir specified
    function getFileContents($dir = '') {
      if (empty($dir)) {
        $dir = $this->plgDir;
      }
      $files = glob("$dir/*.php");
      $page = "";
      foreach ($files as $f) {
        $page .= file_get_contents($f, FILE_IGNORE_NEW_LINES);
      }
      return $page;
    }

    // Percentage Levenshtein distance
    function levDist(&$s1, &$s2) {
      similar_text($s1, $s2, $p);
      return round($p);
    }

    // Get the closest existing translation keys, and the recursivley closest in the
    // key set
    function getClose(&$mo, &$POs) {
      foreach ($POs as $n => $po) {
        $s1 = $po->id;
        if (strlen($po->str) == 0) {
          if (!empty($mo)) {
            foreach ($mo as $mn => $mk) {
              $s2 = $mn;
              $result = $this->levDist($s1, $s2);
              if ($result > $po->tranVal) {
                $po->tranVal = $result;
                $po->tranId = $mn;
                $po->str = $mk->translations[0];
              }
            }
          }
        }
        foreach ($POs as $n2 => $po2) {
          if ($n != $n2) {
            $s2 = $po2->id;
            $result = $this->levDist($s1, $s2);
            if ($result > $po2->keyVal) {
              $po->keyVal = $result;
              $po->keyId = $po2->id;
              $po2->keyVal = $result;
              $po2->keyId = $po->id;
            }
          }
        }
      }
    }

    // Get the strings that look like translation keys
    function getTranPOs(&$contents, &$mo, $domain, &$POs) {
      $matches = array();
      preg_match_all("#_[_e].*\([\'\"](.+?)[\'\"]\s*,\s*[\'\"]" . $domain . "[\'\"]#", $contents, $matches);
      $keys = array_unique($matches[1]);
      $keys = str_replace(array("\'", '\"', '\n'), array("'", '"', "\n"), $keys);
      foreach ($keys as $n => $k) {
        if (!empty($mo[$k])) {
          $v = $mo[$k];
          $t = $v->translations[0];
        }
        else {
          $t = '';
        }
        $po = new PO($k, $t);
        $po->num = $n;
        if ($this->isEmbedded || $this->isPro) {
          $tl = substr($this->locale, 0, 2);
          $po->setTl($tl);
        }
        array_push($POs, $po);
      }
      $this->getClose($mo, $POs);
    }

    // Make a POT string from ids and msgs
    function mkPot(&$POs, $msg) {
      $time = current_time('mysql');
      $pot = <<<EOF
# This file was generated by EzTran for {$this->plgName}
# Your Name: {$msg["name"]}
# Your Email: {$msg["email"]}
# Your Website: {$msg["blog"]}
# Your URL: {$msg["url"]}
# Your Locale: {$msg["locale"]}
# Your Language: {$msg["lang"]}
#, fuzzy
msgid ""
msgstr ""
"Project-Id-Version: {$this->plgName}\\n"
"PO-Revision-Date: $time\\n"
"Last-Translator: {$msg['name']} <{$msg['email']}>\\n"
"MIME-Version: 1.0\\n"
"Content-Type: text/plain; charset={$msg['charset']}\\n"
"Content-Transfer-Encoding: 8bit\\n"


EOF;
      foreach ($POs as $po) {
        $pot .= "msgid " . '"' . PO::decorate($po->id, "\n\r\"") . '"' . "\n";
        $t = $msg[$po->num];
        $pot .= "msgstr " . '"' . PO::decorate($t, "\n\r") . '"' . "\n\n";
      }
      return $pot;
    }

    // Update the PO objects in $POs with the text box stuff
    function updatePot(&$POs, $msg) {
      foreach ($POs as $po) {
        $t = $msg[$po->num];
        $po->str = PO::undecorate($t);
      }
    }

    function handleSubmits() {
      $adminNeeded = false;
      if (empty($_POST)) {
        return $adminNeeded;
      }
      if (isset($_POST['ezt-english'])) {
        global $l10n;
        unset($l10n[$this->domain]);
        $this->adminMsg = "<div class='updated'><p><strong>Ok, in English for now."
                . " <input type='button' value='Switch Back' onClick='location.reload(true)'></strong></p> </div>";
        return $adminNeeded;
      }
      $adminNeeded = true;
      if (isset($_POST['ezt-translate'])) {
        $_POST['eztran'] = 'eztran';
        return $adminNeeded;
      }
      if (!isset($_POST['eztran'])) {
        return $adminNeeded;
      }
      if (!check_admin_referer('ezTranSubmit', 'ezTranNonce')) {
        return $adminNeeded;
      }
      if (isset($_POST['ezt-clear'])) {
        $this->status = '<div class="updated">Reloaded the translations from PHP files and MO.</div> ';
        unset($_SESSION[$this->domain]['ezt-POs']);
        return $adminNeeded;
      }
      if (!empty($_POST['ezt-mailPot'])) {
        if ($this->isEmbedded || $this->isPro) {
          $file = $_POST['potFile'];
          $str = stripslashes($_POST['potStr']);
          $str = str_replace("\'", "'", $str);

          if (!class_exists("phpmailer")) {
            require_once(ABSPATH . 'wp-includes/class-phpmailer.php');
          }
          $mail = new PHPMailer();
          $mail->From = get_bloginfo('admin_email');
          $mail->FromName = get_bloginfo('name');
          if ($this->isEmbedded) {
            $author = "Manoj Thulasidas";
            $authormail = 'Manoj@Thulasidas.com';
          }
          else {
            $author = $_POST['ezt-author'];
            $authormail = $_POST['ezt-authormail'];
          }
          $mail->AddAddress($authormail, $author);
          $mail->CharSet = get_bloginfo('charset');
          $mail->Mailer = 'php';
          $mail->SMTPAuth = false;
          $mail->Subject = $file;
          $mail->AddStringAttachment($str, $file);
          $pos1 = strpos($str, "msgstr");
          $pos2 = strpos($str, "msgid", $pos1);
          $head = substr($str, 0, $pos2);
          $mail->Body = $head;
          if ($mail->Send()) {
            $this->status = "<div class='updated'>Pot file:  $file was sent.</div>";
          }
          else {
            $this->error = "<div class='error'>Error: {$mail->ErrorInfo} Please save the pot file and <a href='mailto:$authormail'>contact $author</a></div>";
          }
        }
        else {
          $this->status = '<div style="background-color:#cff;padding:5px;margin:5px;border:solid 1px;margin-top:10px;font-weight:bold;color:red">In the <a href="http://buy.thulasidas.com/easy-translator">Pro Version</a>, the Pot file would have been sent to the plugin author.<br />In this Lite version, please download the PO file (using the "Display &amp; Save POT File" button above) and email it using your mail client.</div><br />';
        }
        return $adminNeeded;
      }
      return $adminNeeded;
    }

    // Prints out the admin page
    function printAdminPage() {
      echo '<script type="text/javascript">window.onload = function() {jQuery("#loading").fadeOut("slow");};</script>';
      echo "<div id='loading'><p><img src='{$this->plgURL}/loading.gif' alt='loading'/> Please Wait. Loading...</p></div>";
      $printed = false;
      if (!$this->handleSubmits()) {
        return $printed;
      }
      if (!isset($_POST['eztran'])) {
        return $printed;
      }
      if (isset($_POST['ezt-english'])) {
        return $printed;
      }
      $printed = true;
      if ($this->isEmbedded) {
        $backButtonVal = "Go Back to {$this->plgName} Admin";
      }
      else {
        $backButtonVal = "Go Back to Easy Translator";
      }
      $backButton = "<br /><b>If you are done with translating, <input type='button' value='$backButtonVal' onClick='location.reload(true)'><br />You can continue later, and your translation for the session will be remembered until you close the browser window.</b>";
      echo '<div class="wrap" style="width:1000px">';
      echo '<form method="post" action="#">';
      wp_nonce_field('ezTranSubmit', 'ezTranNonce');
      echo "<input type='hidden' name='eztran' value='eztran'>";
      $locale = $this->locale;
      $made = isset($_POST['ezt-make']);
      echo "\n<script type='text/javascript' src='{$this->plgURL}/wz_tooltip.js'></script>\n";
      if ($this->isEmbedded) {
        echo "<h2>Translation Interface for {$this->plgName}</h2>";
      }
      else {
        echo "<h2>Translating {$this->plgName} using Easy Translator</h2>";
      }
      $domain = $this->domain;

      if (isset($_SESSION[$this->domain]['ezt-POs'])) {
        if (empty($this->status)) {
          $this->status = '<div class="updated">Continuing from your last translation session. Click on "Reload Translation" if you would like to start from scratch.</div> ';
        }
        $POs = $_SESSION[$this->domain]['ezt-POs'];
      }
      else {
        global $l10n;
        $mo = array($l10n[$domain]->entries);
        $s = $this->getFileContents();
        $POs = array();
        $this->getTranPOs($s, $mo[0], $domain, $POs);
        // cache the POs
        $_SESSION[$this->domain]['ezt-POs'] = $POs;
      }

      if ($made) {
        $pot = htmlspecialchars($this->mkPot($POs, $_POST), ENT_QUOTES);
        $this->updatePot($POs, $_POST);
        // cache the updated POs
        $_SESSION[$this->domain]['ezt-POs'] = $POs;
      }
      else {
        global $current_user;
        $pot = '';
        if (count($POs) > 0) {
          get_currentuserinfo();
          $pot .= '<div style="width: 15%; float:left">Your Name:</div>' .
                  '<input type="text" style="width: 30%" name="name" value="' .
                  $current_user->user_firstname . " " .
                  $current_user->user_lastname . '" /><br />' . "\n";
          $pot .= '<div style="width: 15%; float:left">Your Email:</div>' .
                  '<input type="text" style="width: 30%" name="email" value="' .
                  $current_user->user_email . '" /><br />' . "\n";
          $pot .= '<div style="width: 15%; float:left">Your Website:</div>' .
                  '<input type="text" style="width: 30%" name="blog" value="' .
                  get_bloginfo('blog') . '" />' . "\n<br />";
          $pot .= '<div style="width: 15%; float:left">Your URL:</div>' .
                  '<input type="text" style="width: 30%" name="url" value="' .
                  get_bloginfo('url') . '" />' . "\n<br />";
          $pot .= '<div style="width: 15%; float:left">Your Locale:</div>' .
                  '<input type="text" style="width: 30%" name="locale" value="' .
                  $locale . '" /><br />' . "\n";
          $pot .= '<div style="width: 15%; float:left">Your Language:</div>' .
                  '<input type="text" style="width: 30%" name="lang" value="' .
                  get_bloginfo('language') . '" /><br />' . "\n";
          $pot .= '<div style="width: 15%; float:left">Character Set:</div>' .
                  '<input type="text" style="width: 30%" name="charset" value="' .
                  get_bloginfo('charset') . '" />' . "\n<br /><br />";

          $pot .= '<div style="width:800px;padding:10px;padding-top:25px"></div>';
          $pot .= '<div style="width:38%px;paddling:10px;padding-left:100px;float:left">' .
                  '<b>English (en_US)</b></div>';
          $pot .= '<div style="width:48%;paddling:10px;padding-left:10px;float:right">' .
                  '<b>Translation</b> (' . $locale . ')</div>';
          $pot .= '<div style="width:100%;padding:15px"></div>';

          if (!class_exists("PO")) {
            die("Class definition error on PO (on Chrome).");
          }
          foreach ($POs as $po) {
            if (!is_object($po) && gettype($po) == 'object') {
              $po = unserialize(serialize($po));
            } // need this only on Chrome!!
            $pot .= $po->textId() . "\n" . $po->textStr() . "\n\n";
          }
        }
        else {
          $pot .= "<div class='error'>No translatable strings found for the plugin {$this->plgName}. Although the translation interface is ready, the plugin author has not yet internationalized this plugin.</div>";
        }
      }
      $makeStr = '<div class="submit">
<input type="submit" name="ezt-make" value="Display &amp; Save POT File" title="Make a POT file with the translation strings below and display it" />&nbsp;
<input type="submit" name="ezt-clear" value="Reload Translation" title="Discard your changes and reload the translation" onclick="return confirm(\'Are you sure you want to discard your changes?\nThe page will take a few minutes to reload because we will be querying Google for translations for each translatable string in the plugin files.\nPlease be patient.\');" />&nbsp;
</div>' . $this->status . $this->error;
      $saveStr = '<div class="submit">
<input type="submit" name="ezt-savePot" value="Save POT file" title="Saves the strings shown below to your PC as a POT file" />&nbsp;
<input type="submit" name="ezt-mailPot" value="Mail POT file" title="Email the translation to the plugin autor" onClick="return confirm(\'Are you sure you want to email the author?\');" />&nbsp;
<input type="submit" name="ezt-editMore" value="Edit More" title="If you are not happy with the strings, edit it further"/>
</div>' . $this->status . $this->error;
      if ($made) {
        echo "<div style='background-color:#eef;border: solid 1px #005;padding:5px'>If you are happy with the POT file as below, please save it or email it to the author. If not, edit it further. $backButton</div>";
        $this->status = '<div class="updated">Ready to email to POT file to the author. Click on "Mail POT file" to send it.</div> ';
        echo '<input type="hidden" name="potFile" value="' .
        $domain . "-" . $locale . '.po" />';
        echo '<input type="hidden" name="potStr" value="' . $pot . '" />';
        if (!$this->isEmbedded) {
          $mail = "<br /><span style='width:15%;float:left;'>Plugin Author:</span><input type='text' style='width: 30%' name='ezt-author' value='' /><br />\n";
          $mail .= "<span style='width:15%;float:left'>Author's Email:</span><input type='text' style='width: 30%' name='ezt-authormail' value='' />\n<br />";
          echo $mail;
        }
        echo $saveStr;
        echo "\n" . '<pre>' . $pot . '</pre>';
      }
      else {
        echo <<<EOF1
<div style="background-color:#eef;border: solid 1px #005;padding:5px">
You are editing the <code>$locale</code> translation for <code>{$this->plgName}</code>.
Text Domain is <code>{$this->domain}</code>.
<br />
Enter the translated strings in the text boxes below and hit the "Display POT File" button.
$backButton
</div>
EOF1;
        echo $makeStr;
        echo $pot;
      }
      echo "</form>\n</div>";
      return $printed;
    }

    function getInvite() {
      $locale = $this->locale;
      $lo = substr($locale, 0, 2);
      if ($lo == 'en') {
        return "";
      }
      $plgName = $this->plgName;
      $patience = "I will include your translation in the next release.<br /><br /><span style=\"color:red;font-weight:bold\">Please note that the page may take a while to load because the plugin will query Google Translator for each string. Please be patient!</span>";
      if ($this->state == "Not Translated") {
        $tip = htmlentities("It is easy to have <b>$plgName</b> in your language. All you have to do is to translate some strings, and email the file to the author.<br /><br />If you would like to help, please use the translation interface. It picks up the translatable strings in <b>$plgName</b> and presents them (and their existing translations in <b>$locale</b>, if any) in an easy-to-edit form. You can then generate a translation file and email it to the author all from the same form. $patience");
        $invite = "<span style='color:red'> Would you like to see <b>$plgName</b> in your langugage (<b>$locale</b>)?&nbsp; <input type='submit' name='ezt-translate' onmouseover=\"Tip('$tip', WIDTH, 350, TITLE, 'How to Translate?', STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [this, 0, 5])\" onmouseout=\"UnTip()\" value ='Please help translate ' /></span>";
      }
      else {
        $tip = htmlentities("If you would like to improve this translation, please use the translation interface. It picks up the translatable strings in <b>$plgName</b> and presents them and their existing translations in <b>$locale</b> in an easy-to-edit form. You can then generate a translation file and email it to the author all from the same form. Slick, isn\'t it? $patience");
        $invite = "<span style='color:red'> Would you like to improve this translation of <b>$plgName</b> in your langugage (<b>$locale</b>)?  <input type='submit' name='ezt-translate' onmouseover=\'Tip('$tip', WIDTH, 350, TITLE, 'How to Translate?', STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [this, 0, 5])\' onmouseout=\'UnTip()\' value='Improve $locale translation' /></span>";
      }
      return $invite;
    }

    function loadTran($helper = '') {
      $locale = '';
      if (empty($helper)) {
        $moDir = "{$this->plgDir}/lang";
      }
      else {
        $moDir = "{$this->plgDir}/../$helper/lang";
      }
      $moFile = "$moDir/{$this->locale}.mo";
      $lo = substr($this->locale, 0, 2);
      if (file_exists($moFile) && is_readable($moFile)) {
        load_textdomain($this->domain, $moFile);
        $locale = basename(dirname($moFile));
      }
      else {
        // look for any other similar locale with the same first two characters
        $moFiles = glob("$moDir/$lo*.mo");
        if (!empty($moFiles)) {
          $moFile = $moFiles[0];
          load_textdomain($this->domain, $moFile);
          $locale = basename(dirname($moFile));
        }
      }
      return $locale;
    }

    function setLang() {
      $locale = $this->locale;
      $lo = substr($locale, 0, 2);
      if ($lo != 'en') {
        $locale = $this->loadTran();
        // Append translations in the helpers
        foreach ($this->helpers as $helper) {
          $this->loadTran($helper);
        }
      }
      if (empty($locale)) {
        $this->state = "Not Translated";
      }
      else if ($locale == $this->locale) {
        $this->state = "Translated";
      }
      else {
        $this->state = "Alternate MO";
      }
      return $locale;
    }

    function renderTranslator() {
      if (strncmp($this->locale, "en", 2) == 0) {
        return;
      }
      echo "<br />\n";
      echo "<br />\n";
      echo '<div style="background-color:#ddd;padding:5px;border: solid 1px;margin:5px;">';
      echo $this->getInvite();
      if ($this->state != "Not Translated") {
        echo "<input type='image' title='Switch to English temporarily' onmouseover = 'Tip(\"If you want to temporarily switch to English, please click here.\",WIDTH, 200)' onmouseout='UnTip()' src='{$this->plgURL}/english.gif' style='float:right;padding:0' name='ezt-english' value='english'>";
        echo '</div>';
        echo $this->adminMsg;
        return;
      }
      echo "<br />";
      $plgName = strtr(' ', '-', str_replace(' pro', '', strtolower($this->plgName)));
      echo "<script type='text/javascript'>
<!--
function hideTranslator(id, btn, translator) {
  var e = document.getElementById(id);
  var eBtn = document.getElementById(btn);
  e.style.display = 'none';
  eBtn.innerHTML = 'Show ' + translator;
}
function showTranslator(id, btn, translator) {
  var e = document.getElementById(id);
  var eBtn = document.getElementById(btn);
  e.style.display = 'block';
  eBtn.innerHTML = 'Hide ' + translator;
}
function toggleVisibility(id, btn, translator) {
  var e = document.getElementById(id);
  if (translator == 'Google') hideTranslator('MicrosoftTranslatorWidget', 'btnMS', 'Microsoft');
  if (translator == 'Microsoft') hideTranslator('GoogleTranslatorWidget', 'btnGG', 'Google');
  if(e.style.display == 'block') {
    hideTranslator(id, btn, translator);
  }
  else {
     showTranslator(id, btn, translator);
  }
}
//-->
</script>";
      $ms = true;
      $google = true;
      if ($ms) {
        $msBtn = " <button type='button' id='btnMS' onclick=\"toggleVisibility('MicrosoftTranslatorWidget', 'btnMS', 'Microsoft');\">Show Microsoft</button>";
        $msLink = "<a target=_blank href='http://www.bing.com/translator'>Microsoft<sup>&reg;</sup></a> ";
        $msJS = "<div id='MicrosoftTranslatorWidget' style='margin-left:auto;margin-right:auto;display:none; width: 200px; min-height: 83px; border-color: #404040; background-color: #A0A0A0;'><noscript><a href='http://www.microsofttranslator.com/bv.aspx?a=http%3a%2f%2fwww.thulasidas.com%2fplugins%2f$plgName'>Translate this page</a><br />Powered by <a href='http://www.bing.com/translator'>Microsoft® Translator</a></noscript></div> <script type='text/javascript'> /* <![CDATA[ */ setTimeout(function() { var s = document.createElement('script'); s.type = 'text/javascript'; s.charset = 'UTF-8'; s.src = ((location && location.href && location.href.indexOf('https') == 0) ? 'https://ssl.microsofttranslator.com' : 'http://www.microsofttranslator.com' ) + '/ajax/v2/widget.aspx?mode=manual&from=en&layout=ts'; var p = document.getElementsByTagName('head')[0] || document.documentElement; p.insertBefore(s, p.firstChild); }, 0); /* ]]> */ </script>";
      }
      else {
        $msBtn = $msJs = $msLink = '';
      }
      if ($google) {
        $ggBtn = " <button type='button' id='btnGG' onclick=\"toggleVisibility('GoogleTranslatorWidget', 'btnGG', 'Google');\">Show Google</button>";
        $ggLink = "<a target=_blank href='https://translate.google.com/'>Google<sup>&reg;</sup></a>";
        $ggJS = "<div id='GoogleTranslatorWidget' style='text-align:center;display:none;'><div id='google_translate_element'></div><script type='text/javascript'>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script></div>";
      }
      else {
        $ggBtn = $ggJS = $ggLink = '';
      }
      if ($google && $ms) {
        $or = "or";
      }
      echo "See this page in your language (<code>{$this->locale}</code>) using machine translation. $ggLink $or $msLink Translator.";
      echo $ggBtn . $msBtn . $ggJS . $msJS;
      echo '</div>';
    }

  }

}

