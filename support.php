<?php

function renderSupport($name, $plg) {
  $value = $plg['value'];
  $desc = $plg['desc'] ;
  $support = $plg['support'] ;
  $url = 'http://www.thulasidas.com/plugins/' . $name . '#FAQ' ;
  $link = '<a href="' . $url . '" target="_blank">' . $value . '</a>' ;

printf(__("If you need help with %s, please read the FAQ section on the $link page. It may answer all your questions.", 'easy-adsenser'), $value, $link) ;
echo "<br />" ;
_e("Or, if you still need help, you can raise a support ticket.", 'easy-adsenser') ;
echo "&nbsp;<a href='http://support.thulasidas.com' onclick=\"popupwindow('http://support.thulasidas.com','ezSupport for $value', 1024, 768);return false;\" title='" ;
_e('Ask a support question (in English or French only) via ezSupport @ $0.95', 'easy-adsenser') ;
echo "'>" ;
_e("[Request Paid Support]", 'easy-adsenser') ;
echo "</a>&nbsp;" ;
_e('The paid support is implemented using our ezSupport Ticket System.', 'easy-adsenser') ;
}

renderSupport($plgName, $myPlugins[$plgName]) ;

?>