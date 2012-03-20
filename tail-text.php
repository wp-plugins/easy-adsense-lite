<?php
/*
Copyright (C) 2008 www.thulasidas.com

This file is part of the programs "Easy AdSense", "AdSense Now!",
"Theme Tweaker", "Easy LaTeX", "More Money" and "Easy Translator".

These programs are free software; you can redistribute them and/or
modify it under the terms of the GNU General Public License as
published by the Free Software Foundation; either version 3 of the
License, or (at your option) any later version.

These programs are distributed in the hope that they will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with the programs.  If not, see <http://www.gnu.org/licenses/>.
*/

function makeTextWithTooltip($text, $tip, $title='', $width='')
{
  if (!empty($title))
    $titleText = "TITLE, '$title',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true,";
  if (!empty($width))
    $widthText = "WIDTH, $width," ;
  $return = "<span style='text-decoration:none' " .
    "onmouseover=\"Tip('". htmlspecialchars($tip) . "', " .
    "$widthText $titleText FIX, [this, 5, 5])\" " .
    "onmouseout=\"UnTip()\">$text</span>" ;
  return $return ;
}
function makeTextWithTooltipTag($plg, $text, $tip, $title='', $width='')
{
  if (!empty($title))
    $titleText = "TITLE, '$title',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true,";
  if (!empty($width))
    $widthText = "WIDTH, $width," ;
  $return = "<span style='text-decoration:none' " .
    "onmouseover=\"TagToTip('". $plg . "', " .
    "$widthText $titleText FIX, [this, 5, 5])\" " .
    "onmouseout=\"UnTip()\">$text</span>" ;
  echo "<div id=$plg> $tip </div>";
  return $return ;
}
function renderPlg($name, $plg) {
  $plugindir = get_option('siteurl') . '/' . PLUGINDIR . '/' .  basename(dirname(__FILE__)) ;
  if ($plg['kind'] != '' && $plg['kind'] != 'plugin') return ;
  $value = '<em><strong>'.$plg['value'].'</strong></em>';
  $desc = $plg['desc'] ;
  $title = $plg['title'] ;
  $url = 'http://www.thulasidas.com/plugins/' . $name ;
  $link = '<b><a href="' . $url . '" target="_blank">' . $value . '</a> </b> ' ;
  $text = $link . $desc ;
  $price = $plg['price'] ;
  $moreInfo = "&nbsp;&nbsp;<a href='http://www.thulasidas.com/plugins/$name' title='More info about $value at Unreal Blog'>More Info</a> " ;
  $liteVersion = "&nbsp;&nbsp; <a href='http://buy.thulasidas.com/$name/$name.zip' title='Download the Lite version of $value'>Get Lite Version</a> " ;
  $proVersion = "&nbsp;&nbsp; <a href='http://buy.thulasidas.com/$name' title='Buy the Pro version of $value for \$$price'>Get Pro Version</a><br />" ;
  $why = "<a href='http://buy.thulasidas.com/$name' title='Buy the Pro version of the $name plugin'><img src='$plugindir/ezpaypal.png' border='0' alt='ezPayPal -- Instant PayPal Shop.' class='alignright' /></a>
<br />".$plg['pro'] ;
  echo "<li>" . makeTextWithTooltip($text, $title, $value, 350) .
    "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .
    makeTextWithTooltip($moreInfo, "Read more about $value at its own page.<br />".$title, "More Information about $value", 300) .
    makeTextWithTooltip($liteVersion, $title, "Download $value - the Lite version", 300) .
    makeTextWithTooltipTag($name, $proVersion, $why, "Get $value Pro!", 300) .
    "</li>\n" ;
}
function renderBook($name, $plg) {
  $plugindir = get_option('siteurl') . '/' . PLUGINDIR . '/' .  basename(dirname(__FILE__)) ;
  if ($plg['kind'] != 'book') return ;
  $value = '<em><strong>'.$plg['value'].'</strong></em>';
  $desc = $plg['desc'] ;
  $title = $plg['title'] ;
  $url = $plg['url'] ;
  $link = '<b><a href="' . $url . '" target="_blank">' . $value . '</a> </b> ' ;
  $text = $link . $desc ;
  $price = $plg['price'] ;
  $moreInfo = "&nbsp;&nbsp; <a href='$url' title='More info about $value at Unreal Blog'>More Info</a> " ;
  $amazon = $plg['amazon'] ;
  if (!empty($amazon)) $buyAmazon = "&nbsp;&nbsp; <a href='$amazon' title='Get $value from Amazon.com'>Get it at Amazon</a> " ;
  $buyNow = "&nbsp;&nbsp; <a href='http://buy.thulasidas.com/$name' title='Buy and download $value for \$$price'>Buy and Download now!</a><br />" ;
  $why = "<a href='http://buy.thulasidas.com/$name' title='$name'><img src='$plugindir/ezpaypal.png' border='0' alt='ezPayPal -- Instant PayPal Shop.' class='alignright' /></a>
<br />".$title.$desc." $value costs only \$$price -- direct from the author." ;
  echo "<li>" . makeTextWithTooltip($text, $title, $value, 350) .
    "<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .
    makeTextWithTooltip($moreInfo, "Read all about $value at its own site.<br />", "$value", 300) .
    makeTextWithTooltip($buyAmazon, $title, "Buy $value from Amazon", 350) .
    makeTextWithTooltipTag($name, $buyNow, $why, "Buy $value!", 300) .
    "</li>\n" ;
}
?>
<?php
?>
<span id="rate">
<iframe src="http://wordpress.org/extend/plugins/<?php echo $plgName ; ?>-lite" width="1000px" height="1000px">
</iframe>
</span>

<table class="form-table" >
<tr>
<td>
<ul style="padding-left:10px;list-style-type:circle; list-style-position:inside;" >
  <li><a href="#" onclick="TagToTip('rate', TITLE, 'WordPress: <?php echo $myPlugins[$plgName] ;?> Lite', STICKY, 1, CLOSEBTN, true, FIX, [25, 25])"><font color="red">If you like this plugin, please give it a 5* rating.</font></a> People tend to vote or comment only when something doesn't work, and it skews the overall rating. Please do your bit to unskew it!</li>
<li>
<?php _e('Please report any problems. And share your thoughts and comments.', 'easy-adsenser') ; ?>&nbsp;<a href="http://wordpress.org/tags/<?php echo $plgName . "-lite" ; ?>" title="<?php _e('Post it in the WordPress forum', 'easy-adsenser') ; ?>" target="_blank"><?php _e("[WordPress Forum]", 'easy-adsenser') ?> </a>
<li>
  If you need support, please read more information about <a href="http://www.Thulasidas.com/plugins/<?php echo $plgName ; ?>-more#FAQ" target="_blank" title="<?php _e('Go to the plugin description page', 'easy-adsenser') ; ?>"><?php echo $myPlugins[$plgName]['value'] ; ?></a> first -- in particular, the FAQ section.
</li>
<li>
  <?php _e("Or, if you still need help, you can raise a support question.", 'easy-adsenser') ?> <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=<?php echo $myPlugins[$plgName]['support']  ; ?>" title="<?php _e('Ask a support question via PayPal @ $0.95', 'easy-adsenser') ; ?>"> <?php _e("[Request Paid Support]", 'easy-adsenser') ?></a>
</li>
<li>
<?php _e('Check out my other plugin efforts:', 'easy-adsenser') ; ?>

<ul style="margin-left:0px; padding-left:30px;list-style-type:square; list-style-position:inside;" >

<?php
  foreach ($myPlugins as $name => $plg) if ($name != $plgName) renderPlg($name, $plg) ;
?>

</ul>
</li>

<li>
<?php _e('My Books -- on Physics, Philosophy, making Money etc:', 'easy-adsenser') ; ?>

<ul style="margin-left:0px; padding-left:30px;list-style-type:square; list-style-position:inside;" >

<?php
  foreach ($myPlugins as $name => $plg){ renderBook($name, $plg) ;}
?>

</ul>
</li>

</ul>

</td>
</tr>

<?php echo '</table>' ; ?>
