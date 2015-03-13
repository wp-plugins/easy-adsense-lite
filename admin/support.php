<h4>Need Support?</h4>
<ul>
  <?php
  $plgSlug = EzGA::getSlug();
  if (empty($hideTour)) {
    ?>
    <li>Take a <a href="tour.php" title='Please take a tour to understand the features and capabilities of this plugin' data-toggle='tooltip'>tour</a> to familiarize yourself with the plugin interface.</li>
    <?php
  }
  ?>
  <li>Please check the <a href="http://www.thulasidas.com/plugins/<?php echo $plgSlug; ?>#faq" class="popup" title='Your question or issue may be already answered or resolved in the FAQ' data-toggle='tooltip'> Plugin FAQ</a> for answers.</li>
  <li>For the lite version, you may be able to get support from the <a href='https://wordpress.org/support/plugin/<?php echo $plgSlug; ?>-lite' class='popup' title='WordPress forums have community support for this plugin' data-toggle='tooltip'>WordPress support forum</a>.</li>
  <li>For preferential support and free updates, you can purchase a <a href='http://buy.thulasidas.com/support' class='popup' title='Support contract is only $2.95 a month, and you can cancel anytime.' data-toggle='tooltip'>support contract</a>.</li>
  <li>From one-off support issues, you can raise a one-time paid <a href='http://buy.thulasidas.com/ezsupport' class='popup' title='Support ticket costs $0.95 and lasts for 72 hours' data-toggle='tooltip'>support ticket</a> for prompt support.</li>
</ul>
<h4>Happy with this plugin?</h4>
<ul>
  <li>Please leave a short review and rate it at <a href=https://wordpress.org/plugins/<?php echo $plgSlug; ?>-lite/" class="popup" title='Please help the author and other users by leaving a short review for this plugin and by rating it' data-toggle='tooltip'>WordPress</a>. Thanks!</li>
</ul>

<h4>Need Custom Services?</h4>
<?php
EzGA::showService();
