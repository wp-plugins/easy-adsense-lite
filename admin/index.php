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
closeCell();
openCell("Contact Author", 'envelope', 4, "", 260);
require_once 'support.php';
closeCell();
closeRow();
include('promo.php');
require('footer.php');
