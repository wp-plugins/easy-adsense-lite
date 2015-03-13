<?php
require('header.php');
$plgName = EzGA::getPlgName();
$plgSlug = EzGA::getSlug();
?>
<div>
  <ul class="breadcrumb">
    <li>
      <a href="#">Home</a>
    </li>
    <li>
      <a href="#">Tour</a>
    </li>
  </ul>
</div>
<h3>Take a Tour of <?php echo $plgName; ?> Features</h3>
<?php
openBox("Tour and Help", "globe", 8);
?>
<h4>Quick Start</h4>
<p>Welcome to <?php echo $plgName; ?>, on of the most popular AdSense plugin ever. </p>
<ul>
  <li>Go to the <a href='<?php echo $plgSlug; ?>-admin.php'>admin page</a></strong> and enter your ad code and other details.</li>
  <li>If you have the <strong><a href="#" class='goPro' data-product='<?php echo $plgSlug; ?>'>Pro version</a></strong> of <?php echo $plgName; ?>, set up the <a href='pro.php'>Pro features</a>.</li>
  <li>Take this <strong><a class="restart" href="#">tour</a></strong> any time you would like to go through the application features again.</li>
</ul>
<h4>WordPress and Shortcodes</h4>
<p>If you are using the <strong><a href="#" class='goPro'>Pro version</a></strong> of <?php echo $plgName; ?>, you can use <a href='http://codex.wordpress.org/Shortcode' target='_blank'>shortcodes</a> to place your ads on your posts and pages. Use the shortcode <code>[adsense]</code> or <code>[ezadsense]</code> to place your ads exactly where you need them on any posts. You can set up intelligent shortcode priority schemes on the <a href='pro.php'>Pro page</a>.</p>

<h4>Context-Aware Help</h4>
<p>
  Every option on the plugin admin and pro pages has a popover help bubble. You just need to hover over the field to get a clear and concise description of what the option does and how to set it up.
</p>
<p>
  The admin and the pro pages also have generous help near the top, which can be expanded by clicking on a clearly marked button. For further support and assistance, please use the channels on the Contact Author panel next to this panel.
</p>
<hr />
<p class="center-text"> <a class="btn btn-success center-text restart" href="#" data-toggle='tooltip' title='Start or restart the tour any time' id='restart'><i class="glyphicon glyphicon-globe icon-white"></i>&nbsp; Start the Tour</a></p>
<?php
closeCell();
openCell("Contact Author", 'envelope', 4, "", 260);
$hideTour = true;
require_once 'support.php';
closeBox();
?>
<script>
  $(document).ready(function () {
    if (!$('.tour').length && typeof (tour) === 'undefined') {
      var tour = new Tour({backdrop: true, backdropPadding: 20,
        onShow: function (t) {
          var current = t._current;
          var toShow = t._steps[current].element;
          $(toShow).parent('ul').parent().siblings('.accordion').find('ul').slideUp();
          $(toShow).parent('ul').slideDown();
        }});
      tour.addStep({
        element: "#dashboard",
        placement: "right",
        title: "Dashboard",
        content: "<strong>Welcome to <?php echo $plgName; ?></strong><br> When you first visit your <?php echo $plgName; ?> Admin interface, you will find yourself in the Dashboard. Depending on the version of our plugin, you may see informational messages, statistics etc. on this page."
      });
      tour.addStep({
        element: "#update",
        placement: "left",
        title: "Updates and Upgrades",
        content: "If you would like to check for regular updates, or install a purchased module or Pro upgrade, visit the update page by clicking this button."
      });
      tour.addStep({
        element: "#standAloneMode",
        placement: "left",
        title: "Standalone Mode",
        content: "Open <?php echo $plgName; ?> Admin in a new window independent of WordPress admin interface. The standalone mode still uses WP authentication, and cannot be accessed unless logged in."
      });
      tour.addStep({
        element: "#tour",
        placement: "right",
        title: "Tour",
        content: "This page is the starting point of your tour. You can always come here to relaunch the tour, if you wish."
      });
      tour.addStep({// The first on ul unroll is ignored. Bug in BootstrapTour?
        element: "#google-adsense",
        placement: "right",
        title: "Manage Google AdSense",
        content: "This is the plugin admin interface to enter ad codes, specify alignment, colors etc. It is a drop-down menu with all your <strong>Option Sets</strong> (including the ones for mobile phones and tablets). You can edit any one of them and switch to it as the active one."
      });
      tour.addStep({// The first on ul unroll is ignored. Bug in BootstrapTour?
        element: "#easy-adsense",
        placement: "right",
        title: "Manage Easy AdSense",
        content: "This is the plugin admin interface to enter ad codes, specify alignment, colors etc. It is a drop-down menu with all your <strong>Option Sets</strong> (including the ones for mobile phones and tablets). You can edit any one of them and switch to it as the active one."
      });
      tour.addStep({// The first on ul unroll is ignored. Bug in BootstrapTour?
        element: "#adsense-now",
        placement: "right",
        title: "Manage AdSense Now!",
        content: "This is the plugin admin interface to enter ad codes, specify alignment, colors etc. It is a drop-down menu with all your <strong>Option Sets</strong> (including the ones for mobile phones and tablets). You can edit any one of them and switch to it as the active one."
      });
      tour.addStep({
        element: "#goPro",
        placement: "right",
        title: "Upgrade Your App to Pro",
        content: "To unlock the full potential of this Plugin, you may want to purchase the Pro version. You will get a link to download it instantly. It costs only a few dollars and adds tons of features. Click here to buy it now!"
      });
      tour.addStep({
        element: "#pro",
        placement: "right",
        title: "Edit Pro Options",
        content: "The Pro version gives you a safety feature to help minimize the risk of your AdSense account getting banned, mobile support, per category/post control on ads etc."
      });
      tour.addStep({
        element: "#options",
        placement: "right",
        title: "Plugin Configuration",
        content: "Set up the plugin admin page options, and other advanced options here."
      });
      tour.addStep({
        element: "#stats",
        placement: "right",
        title: "Ad Serving Statistics",
        content: "<p class='red'>This is an optional paid feature.</p><p>Here you can see how your ads are being served, and their performance."
      });
      tour.addStep({
        element: ".col-lg-4",
        placement: "left",
        title: "Support Channels",
        content: "If you need further support with Welcome to <?php echo $plgName; ?>, use one of these support channels."
      });
      tour.addStep({
        orphan: true,
        placement: "right",
        title: "Done",
        content: "<p>You now know the <?php echo $plgName; ?> Plugin interface. Congratulations!</p>"
      });
    }
    $(".restart").click(function () {
      tour.restart();
    });
  });
</script>
<?php
require('footer.php');
