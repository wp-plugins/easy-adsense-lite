<?php

function renderSupport($name, $plg) {
  $value = $plg['value'];
  $desc = $plg['desc'] ;
  $support = $plg['support'] ;
  $url = 'http://www.thulasidas.com/plugins/' . $name . '-more#FAQ' ;
  $link = '<b><a href="' . $url . '" target="_blank">' . $value . '</a> </b>' ;

echo "<b>$value uses a paid support model for both Lite and Pro versions</b><br />
Each support question costs $0.95. Please read the FAQ section on the $link page. It may answer all your questions. <br />" ;
_e('If you still need help, ', 'easy-adsenser') ;
echo "<a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=$support' title='" ;
_e('Ask a support question via PayPal @ $0.95', 'easy-adsenser') ;
 echo "'> " ;
_e('request Paid Support.', 'easy-adsenser') ;
echo "</a>" ;
}

renderSupport($plgName, $myPlugins[$plgName]) ;

?>