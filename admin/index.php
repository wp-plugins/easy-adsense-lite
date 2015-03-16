<?php require('header.php'); ?>
<div>
  <ul class="breadcrumb">
    <li>
      <a href="#">Home</a>
    </li>
    <li>
      <a href="#">Dashboard</a>
    </li>
  </ul>
</div>

<?php
insertAlerts();
openRow();
openCell("Introduction", "home", 8);
$plgName = EzGA::getPlgName();
$plgMode = EzGA::getPlgMode();
require_once "$plgMode-intro.php";
$pluginURL = admin_url('plugins.php');
if (!EzGA::$isPro) {
  ?>
  <div style='padding:5px;margin:0;background-color:#ffdbdb'>
    <h3>Go Back to Non-AJAX Version<br>
      <small>Don't like this fancy AJAX interface?</small>
    </h3>
    You can always go back to the non-AJAX version if you are not happy with this slick new admin page, or if the plugin doesn't work as expected (ads not appearing on home/front page/posts, or any other kind of strange behavior). The AJAX version stores its options completely independent of the non-AJAX version. Your non-AJAX options are intact and untouched.
    <ul>
      <li>
        <a href='<?php echo $pluginURL; ?>' id='plugins' class='popup'>Deactivate and delete</a> this plugin.
      </li>
      <li>
        <a href='https://downloads.wordpress.org/plugin/easy-adsense-lite.7.61.zip'>Download</a> the non-AJAX version of the plugin.
      </li>
      <li>
        <a href='#' id='uploadHelp'>Upload and activate</a> the downloaded non-AJAX version.
      </li>
      <li>
        Find and click on the the <strong>Easy AdSense Lite</strong> menu item under your <strong>Settings</strong> menu, and you should see the non-AJAX version.
      </li>
    </ul>
    <strong class='red'>Please remember never to update the plugin if you are using the non-AJAX version, or it will get overwritten by the AJAX version. It's easy to recover though - just follow the above instructions again.</strong>
  </div>
  <script>
    $(document).ready(function () {
      $("#uploadHelp").click(function () {
        bootbox.alert({title: 'How to Upload and Install a Plugin', message: '<p>To install follow steps 1 through 4 in the pictures below. Go to the admin page of your blog, click on "Plugins" on your sidebar menu, select "Add New" and click on "Upload". On some installations, you may be prompted to provide your FTP credentials.</p><br><img src="img/install.png" alt="Installation Help" style="max-width:80%;" class="center-block"/>'});
      });
    });
  </script>
  <?php
}
closeCell();
openCell("Contact Author", 'envelope', 4, "", 260);
require_once 'support.php';
closeCell();
closeRow();
include('promo.php');
require('footer.php');
