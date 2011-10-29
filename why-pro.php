<?php

function renderWhyPro($name, $plg) {
  $value = $plg['value'];
  $desc = $plg['desc'] ;
  $toolTip = $plg['title'] ;
  $url = 'http://www.thulasidas.com/plugins/' . $name ;
  $link = '<b><a href="' . $url . '" target="_blank">' . $value . '</a> </b>' ;
  $text = $link . $desc ;
  $price = $plg['price'] ;
  $moreInfo =  " &nbsp;  &nbsp; <a href='http://www.thulasidas.com/plugins/$name' title='More info about $value'> More Info </a>" .
    "&nbsp; <a href='http://buy.ads-ez.com/$name/$name.zip' title='Download the Lite version of $value'>Get Lite Version </a>" .
    "&nbsp; <a href='http://buy.ads-ez.com/$name' title='Buy the Pro Lite version of $value for \$$price'>Get Pro Version</a>" ;
  $toolTip .= addslashes('<br />' . $moreInfo) ;
  $why = addslashes($plg['pro']) ;
  echo "<b>Get Pro Version!</b>
<a href='http://buy.ads-ez.com/$name' title='Pro version of the $value plugin for \$$price'><img src='https://www.paypalobjects.com/en_GB/SG/i/btn/btn_buynowCC_LG.gif' border='0' alt='PayPal — The safer, easier way to pay online.' class='alignright'/></a>
<br />
You are using the Lite version of $value, which is available in two versions:
<ul><li>
$moreInfo
<li>$why</li>
</ul>" ;
}

renderWhyPro($plgName, $myPlugins[$plgName]) ;
?>
