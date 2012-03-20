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

function renderHeadText($name, $plg) {
  $plugindir = get_option('siteurl') . '/' . PLUGINDIR . '/' .  basename(dirname(__FILE__)) ;
  $value = '<em><strong>'.$plg['value'].'</strong></em>';
  $desc = $plg['desc'] ;
  $toolTip = $plg['title'] ;
  $url = 'http://www.thulasidas.com/plugins/' . $name ;
  $link = '<b><a href="' . $url . '" target="_blank">' . $value . '</a> </b>' ;
  $text = $link . $desc ;
  $price = $plg['price'] ;
  $moreInfo =
    "<b><a href='http://buy.thulasidas.com/$name' title='Buy the Pro version of $value for \$$price. Instant download link.'>Pro Version</a></b>" ;
  $toolTip .= addslashes('<br />' . $moreInfo) ;
  $why = addslashes($plg['pro']) ;
  $version = 'Lite' ;
  echo "<b>Get Pro Version!</b>
<a href='http://buy.thulasidas.com/$name' title='Buy the Pro version of the $name plugin. Instant download link.'><img src='$plugindir/ezpaypal.png' border='0' alt='ezPayPal -- Instant PayPal Shop.' class='alignright'/></a>
<br />
You are using the $version version of $value, which is also available as in a Pro version.
<ul><li>
$moreInfo
<li>$why And it costs only \$$price!</li>
</ul>" ;
}
function renderProText($name, $plg) {
  $value = '<em><strong>'.$plg['value'].'</strong></em>';
  $filter = '' ;
  if (strpos($name,'adsense')!== FALSE) $filter = " (e.g., a filter to ensure AdSense policy compliance) " ;
  $desc = $plg['desc'] ;
  $toolTip = $plg['title'] ;
  $price = $plg['price'] ;
  $moreInfo =
    "&nbsp; <a href='http://buy.thulasidas.com/$name/$name.zip' title='Download the Lite version of $value'>Lite Version </a>" .
    "&nbsp; <a href='http://buy.thulasidas.com/$name' title='Buy the Pro version of $value for \$$price'>Pro Version</a>" ;
  $toolTip .= addslashes('<br />' . $moreInfo) ;
  $why = addslashes($plg['pro']) ;
  echo '<div style="background-color:#ffcccc;padding:5px;border: solid 1px">
<center>
<big style="color:#a48;font-variant: small-caps;text-decoration:underline" onmouseover="TagToTip(\'pro\', WIDTH, 300, TITLE, \'Buy the Pro Version\',STICKY, 1, CLOSEBTN, true, CLICKCLOSE, true, FIX, [this, 5, 5])"><b>The Pro Version</b></big>
</center>' ;

  $value .= '<b><i> Lite</i></b>' ;
  echo "Thank you for using $value. The \"Pro\" version gives you more options$filter. Consider <a href='http://buy.thulasidas.com/$name' title='Pro version of this plugin. Instant download link.'>buying it</a>. It costs only \$$price." ;

  echo "<div id='pro'>" ;
  renderHeadText($name, $plg) ;
  echo "</div>" ;
}

function renderSupportText($name, $plg, $long=true) {
  $value = '<em><strong>'.$plg['value'].'</strong></em>';
  $supportText = "<div style=\"background-color:#cff;padding:5px;border: solid 1px\" id=\"support\"><b>Support $value. <a href=\"http://buy.thulasidas.com/$name\" title=\"Pro version of this plugin. Instant download link.\">Go Pro!</a></b>" ;
  if ($long) $longText = "How about " ;
  else $longText= '' ;
  $supportText .= "<br />$longText<span onmouseover=\"TagToTip('dropbox', WIDTH, 440, TITLE, 'What is DropBox?',STICKY, 1, CLOSEBTN, true, FIX, [this, -150, 2])\"><a href='http://db.tt/qsogWB1' title='Sign up for Dropbox -- free 2GB online storage on the cloud!' target='_blank'>2GB of <em>free</em> online storage</a></span>?" ;
  if ($long) $longText = "WordPress Hosting for " ;
  else $longText= 'Hosting for ' ;
  $supportText .= "<br />$longText<span onmouseover=\"TagToTip('arvixe', WIDTH, 300, TITLE, 'Arvixe - My favorite provider!',STICKY, 1, CLOSEBTN, true, FIX, [this, -200, 2])\"><a href='http://www.arvixe.com/1933.html' target='_blank'>just $4/month</a></span>. " ;
  if ($long) $longText = "My books on " ;
  else $longText= 'Books: ' ;
  $supportText .= "<br />$longText<span style=\"text-decoration:underline\" onmouseover=\"TagToTip('unreal', WIDTH, 205, TITLE, 'Buy &lt;em&gt;The Unreal Universe&lt;/em&gt;',STICKY, 1, CLOSEBTN, true, FIX, [this, 5, 2])\"><b><a href='http://www.amazon.com/exec/obidos/ASIN/9810575947/unrblo-20' target='_blank'>Physics</a></b></span> or " ;
  $supportText .= "<span style=\"text-decoration:underline\" onmouseover=\"TagToTip('pqd', WIDTH, 205, TITLE, '&lt;em&gt;Principles of Quant. Devel.&lt;/em&gt;',STICKY, 1, CLOSEBTN, true, FIX, [this, 5, 2])\"><b><a href='http://www.amazon.com/exec/obidos/ASIN/0470745703/unrblo-20' target='_blank'>Money</a></b></span>." ;
  echo $supportText ;
}

function renderTipDivs($name) {
  $plugindir = get_option('siteurl') . '/' . PLUGINDIR . '/' .  basename(dirname(__FILE__)) ;
echo <<<ENDDIVS
<div id="arvixe">
  <a href="http://www.arvixe.com/1933-27-1-310.html" target="_blank">Arvixe</a> is my favorite hosting provider. Friendly service, extremely competitive rates, and of course a great affiliate program.
</div>

<span id="dropbox">
  Dropbox! gives you 2GB of network (cloud) storage for free, which I find quite adequate for any normal user. (That sounds like the famous last words by Bill Gates, doesn’t it? “64KB of memory should be enough for anyone!”) And, you can get 250MB extra for every successful referral you make. That brings me to my ulterior motive – please use this link to sign up. When you do, I get 250MB extra. Don’t worry, you get 250MB extra as well. So I can grow my online storage up to 8GB, which should keep me happy for a long time. Thank you!
</span>

<div id="unreal" style="margin-left:auto;margin-right:auto;width:200px;display:block;">
<div style="text-align:center;width:200px;padding:1px;background:#aad;margin:2px;">
<div style="text-align:center;width:192px;height:180px;padding:2px;border:solid 1px #000;background:#ccf;margin:1px;">
<a style="text-decoration:none;" href="http://buy.thulasidas.com/unreal-universe" title="Find out more about The Unreal Universe and buy it ($1.49 for eBook, $15.95 for paperback). It will change the way you view life and reality!">
<big style="font-size:14px;font-family:arial;color:#a48;font-variant: small-caps;"><b>The Unreal Universe</b></big><br />
<small style="font-size:12px;font-family:arial;color:#000;">
A Book on Physics and Philosophy
</small>
</a>
<hr />
<table border="0" cellpadding="0" cellspacing="0" summary="" width="100%" align="center">
<tr><td width="65%">
<a style="text-decoration:none;" href="http://buy.thulasidas.com/unreal-universe" title="Find out more about The Unreal Universe and buy it ($1.49 for eBook or Kindle, $15.95 for paperback). It will change the way you view life and reality!">
<small style="font-size:10px;font-family:arial;color:#000;">
Pages: 292<br />
(282 in eBook)<br />
Trimsize: 6" x 9" <br />
Illustrations: 34<br />
(9 in color in eBook)<br />
Tables: 8 <br />
Bibliography: Yes<br />
Index: Yes<br />
ISBN:<br />9789810575946&nbsp;<br />
<font color="red"><b>Only $1.49!</b></font>
</small>
</a>
</td>
<td>
<a style="text-decoration:none;" href="http://buy.thulasidas.com/unreal-universe" title="Find out more about The Unreal Universe and buy it ($1.49 for eBook or Kindle, $15.95 for paperback). It will change the way you view life and reality!">
<img class="alignright" src="$plugindir/unreal.gif" border="0px" alt="TheUnrealUniverse" title="Read more about The Unreal Universe" />
</a>
</td>
</tr>
</table>
</div>
</div>
</div>

<div id="pqd" style="margin-left:auto;margin-right:auto;width:200px;display:block;">
<div style="text-align:center;width:200px;padding:1px;background:#000;margin:2px;">
<div style="text-align:center;width:190px;height:185px;padding:2px;padding-top:1px;padding-left:4px;border:solid 1px #fff;background:#411;margin:1px;">
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/0470745703/unrblo-20" title="Find out more about Principles of Quantitative Development and buy it from Amazon.com">
<big style="font-size:14px;font-family:arial;color:#fff;font-variant: small-caps;">A Remarkable Book from Wiley-Finance</big>
</a>
<hr />
<table border="0" cellpadding="2px" cellspacing="0" summary="" width="100%" align="center">
<tr><td style="padding:0px">
<div style="border:solid 1px #faa;height:126px;width:82px;">
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/0470745703/unrblo-20" title="Find out more about Principles of Quantitative Development and buy it from Amazon.com">
<img src="$plugindir/pqd-82x126.gif" border="0px" alt="PQD" title="Principles of Quantitative Development from Amazon.com" />
</a>
</div>
</td>
<td style="padding:3px">
<a style="text-decoration:none;" href="http://www.amazon.com/exec/obidos/ASIN/0470745703/unrblo-20" title="Find out more about Principles of Quantitative Development and buy it from Amazon.com">
<em style="font-size:14px;font-family:arial;color:#fff;">"An excellent book!"</em><br />
<small style="font-size:13px;font-family:arial;color:#faa;">&nbsp;&nbsp;&#8212; Paul Wilmott</small>
<br />
<small style="font-size:11px;font-family:arial;color:#fff;">
Want to break into the lucrative world of trading and quantitative finance? You <b>need </b> this book!
</small>
</a>
</td>
</tr>
</table>
</div>
</div>
</div>
ENDDIVS;
}

echo '<td width="30%">' ;

renderSupportText($plgName, $myPlugins[$plgName], $myPlugins[$plgName]['long']) ;

echo '</td>' ;
echo '<td width="30%">' ;

renderProText($plgName, $myPlugins[$plgName]) ;
renderTipDivs($name) ;

echo '</td>' ;

?>
