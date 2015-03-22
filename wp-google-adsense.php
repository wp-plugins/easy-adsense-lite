<?php

include('ezKillLite.php');

if (is_admin()) {
  if (!class_exists("GoogleAdSense")) {
    require_once 'EZWP.php';

    class GoogleAdSense {

      var $isPro, $plgName, $plgDir, $plgURL, $options;
      var $ezTran, $slug, $domain;

      function GoogleAdSense() { //constructor
        $this->plgDir = dirname(__FILE__);
        $this->plgURL = plugin_dir_url(__FILE__);
        $this->isPro = file_exists("{$this->plgDir}/admin/options-advanced.php");
        $this->slug = EZWP::getSlug("{$this->plgDir}/admin");
        $this->plgName = EZWP::getPlgName("{$this->plgDir}/admin");
        require_once 'EzTran.php';
        $this->ezTran = new EzTran(__FILE__, $this->plgName, $this->slug);
        $this->ezTran->setLang();
      }

      function getQuery($atts) {
        $query = "";
        $vars = array("id" => "", "code" => "", "key" => "");
        $vars = shortcode_atts($vars, $atts);
        foreach ($vars as $k => $v) {
          if (!empty($v)) {
            $query = "&$k=$v";
            return $query;
          }
        }
      }

      function addAdminPage() {
        add_options_page($this->plgName, $this->plgName, 'activate_plugins', basename(__FILE__), array($this, 'printAdminPage'));
      }

      function addWidgets() {
        $widgetFile = "{$this->plgDir}/{$this->slug}-widget.php";
        if (file_exists($widgetFile)) {
          require_once $widgetFile;
        }
        return;
      }

      static function install() {
        require_once 'admin/Migrator.php';
        $migrator = new Migrator();
        $migrator->migrate();
        return;
      }

      function printAdminPage() {
        $isPro = $this->isPro;
        $installImg = $this->plgURL . "admin/img/install.png";
        echo "<div class='error'>";
        require $this->plgDir . '/admin/no-ajax.php';
        $src = plugins_url("admin/index.php", __FILE__);
        if (!@file_get_contents($src)) {
          echo "<div style='padding:10px;margin:10px;font-size:1.3em;color:red;font-weight:500'>This plugin needs direct access to its files so that they can be loaded in an iFrame. Looks like you have some security setting denying the required access.  If you have an <code>.htaccess</code> file in your <code>wp-content</code> folder, please remove it or modify it to allow access to the php files in <code>{$this->plgDir}/</code>.<br> Or <em><strong>Go back to the Non-AJAX Version</strong></em> by following the directions above.</div>";
          return;
        }
        echo "</div>";
        ?>
        <script type="text/javascript">
          function calcHeight() {
            var w = window,
                    d = document,
                    e = d.documentElement,
                    g = d.getElementsByTagName('body')[0],
                    y = w.innerHeight || e.clientHeight || g.clientHeight;
            document.getElementById('the_iframe').height = y - 70;
          }
          if (window.addEventListener) {
            window.addEventListener('resize', calcHeight, false);
          }
          else if (window.attachEvent) {
            window.attachEvent('onresize', calcHeight);
          }
          jQuery(document).ready(function () {
            jQuery("#the_iframe").show();
            jQuery("#noAjax").hide();
          });
        </script>
        <?php

        echo "<iframe src='$src' frameborder='0' style='overflow:hidden;overflow-x:hidden;overflow-y:hidden;width:100%;position:absolute;top:5px;left:-10px;right:0px;bottom:0px;display:none;' width='100%' height='900px' id='the_iframe' onLoad='calcHeight();'></iframe>";
      }

      static function switchTheme() {
        $oldTheme = EZWP::getGenOption('theme');
        $newTheme = get_option('stylesheet');
        global $wpdb;
        $table = $wpdb->prefix . "ez_adsense_options";
        $sql = "INSERT IGNORE INTO $table (plugin_slug, theme, provider, optionset, name, value) SELECT plugin_slug, '$newTheme', provider, optionset, name, value FROM $table s WHERE theme = '$oldTheme'";
        if ($wpdb->query($sql) === false) {
          // A warning may be shown, but not being able to create the options
          // is not serious enough. They will become defaults anyway.
        }
        EZWP::putGenOption('theme', $newTheme);
      }

      function verifyDB() {
        global $wpdb;
        $table = $wpdb->prefix . "ez_adsense_options";
        if ($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
          $this->install();
        }
      }

    }

    //End Class GoogleAdSense
  }
  else {
    $ezFamily = array("google-adsense/google-adsense.php",
        "google-adsense-lite/google-adsense.php",
        "google-adsense-pro/google-adsense.php",
        "easy-adsense/easy-adsense.php",
        "easy-adsense-pro/easy-adsense.php",
        "easy-adsense-lite/easy-adsense.php",
        "easy-adsense-lite/easy-adsense-lite.php",
        "adsense-now/adsense-now.php",
        "adsense-now-pro/adsense-now.php",
        "adsense-now-lite/adsense-now.php",
        "adsense-now-lite/adsense-now-lite.php");
    $ezActive = array();
    foreach ($ezFamily as $lite) {
      $ezKillLite = new EzKillLite($lite);
      $liteName = $ezKillLite->deny();
      if (!empty($liteName)) {
        $ezActive[$lite] = $liteName;
      }
    }
    if (count($ezActive) > 1) {
      $ezAdminNotice = '<ul>';
      foreach ($ezActive as $k => $p) {
        $ezAdminNotice .= "<li><code>$k</code>: <b>{$p}</b></li>\n";
      }
      $ezAdminNotice .= "</ul>";
      EzKillLite::$adminNotice .= '<div class="error"><p><b><em>Ads EZ Family of Plugins</em></b>: Please have only one of these plugins active.</p>' . $ezAdminNotice . 'Otherwise they will interfere with each other and work as the last one.</div>';
      add_action('admin_notices', array('EzKillLite', 'admin_notices'));
    }
  }

  if (class_exists("GoogleAdSense")) {
    $gAd = new GoogleAdSense();
    if (isset($gAd)) {
      if (method_exists($gAd, 'verifyDB')) {
        $gAd->verifyDB();
      }
      add_action('admin_menu', array($gAd, 'addAdminPage'));
      $gAd->addWidgets();
      $file = dirname(__FILE__) . "/{$gAd->slug}.php";
      register_activation_hook($file, array("GoogleAdSense", 'install'));
      add_action('switch_theme', array("GoogleAdSense", 'switchTheme'));
    }
  }
}
else {
  require plugin_dir_path(__FILE__) . 'EzGA.php';
  EzGA::doPluginActions();
}