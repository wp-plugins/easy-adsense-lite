<?php
function ezPluginInfo(){
  $me = basename(dirname(__FILE__)) ;
  $plugins = get_plugins() ;
  $ret = array('Version' => '', 'Info' => '') ;
  $break = '' ;
  foreach ($plugins as $k => $p) {
    $baseDir = dirname($k) ;
    if ($baseDir == $me) {
      $version = $p['Version'] ;
      $info = "$break{$p['Title']} V{$p['Version']} (Referer: {$_SERVER['HTTP_REFERER']})" ;
      $ret[] = array('Version' => $version, 'Info' => $info) ;
    }
  }
  return $ret ;
}
function renderSupport($name, $plg) {
  $plugindir = get_option('siteurl') . '/' . PLUGINDIR . '/' .  basename(dirname(__FILE__)) ;
  $value = $plg['value'];
  $desc = $plg['desc'] ;
  $support = $plg['support'] ;
  $url = 'http://www.thulasidas.com/plugins/' . $name . '#FAQ' ;
  $link = '<a href="' . $url . '" target="_blank">' . $value . '</a>' ;
  echo "&nbsp;<a href='http://support.thulasidas.com' onclick=\"popupwindow('http://support.thulasidas.com','ezSupport for $value', 1024, 768);return false;\" title='" ;
  _e('Ask a support question (in English or French only) via ezSupport @ $0.95', 'easy-adsenser') ;
  echo "'><img src='$plugindir/ezsupport.png' class='alignright' border='0' alt='ezSupport Portal'/></a>" ;
  printf(__("If you need help with %s, please read the FAQ section on the $link page. It may answer all your questions.", 'easy-adsenser'), $value, $link) ;
  echo "<br />" ;
  _e("Or, if you still need help, you can raise a support ticket.", 'easy-adsenser') ;
  echo "&nbsp;<a href='http://support.thulasidas.com' onclick=\"popupwindow('http://support.thulasidas.com','ezSupport for $value', 1024, 768);return false;\" title='" ;
  _e('Ask a support question (in English or French only) via ezSupport @ $0.95', 'easy-adsenser') ;
  echo "'>" ;
  _e("[Request Paid Support]", 'easy-adsenser') ;
  echo "</a>&nbsp;<small><em>[" ;
  _e('Implemented using our ezSupport Ticket System.', 'easy-adsenser') ;
  echo "]</em></small>" ;
  $info = ezPluginInfo() ;
  $_SESSION['ezSupport'] = $info[0]['Info'] ;
}

renderSupport($plgName, $myPlugins[$plgName]) ;

?>