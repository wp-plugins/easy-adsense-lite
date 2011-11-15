<?php

$myPlugins = array() ;

$needPHP53 = ' <p> <font color="#c00">Note that this plugin requires PHPv5.3+. Please use the Lite version first to ensure that it works before buying the Pro version. If it does not work on your web host, consider the amazing <a href="http://buy.ads-ez.com/easy-adsense/" title=The most popular plugin to insert AdSense on your blog"><em><strong>Easy AdSense Pro</strong></em></a> for all your advertising needs. It can insert non-AdSense blocks as well.</font></p>' ;

$myPlugins['easy-adsense'] =
  array('value' => 'Easy AdSense',
    'support' => 'HYZ5AWPYSC8VA',
    'price' => '4.95',
    'share' => true,
    'long' => true,
    'blurb' => '<em><strong>Easy AdSense</strong></em> is an updated version of a very popular (downloaded over 600,000 times) WordPress plugin. This premium plugin ',
    'desc' => 'manages all aspects of Google AdSense for your blog. Easy and complete!',
    'title' => '<em><strong>Easy AdSense</strong></em> provides a very easy way to generate revenue from your blog using Google AdSense. It can insert ads into posts and sidebar, and add a Google Search box. With its full set of features, <em><strong>Easy AdSense</strong></em> is perhaps the first plugin to give you a complete solution for everything AdSense-related.',
    'pro' => 'The Lite version of <em><strong>Easy AdSense</strong></em> is fully functional. But the Pro version gives you more features and control. In the Pro version, you get a filter to minimize the chance of your AdSense account getting banned. It uses a fast and effective keyword matching algorithm to examine the contents (including comments that you may have no control over) of each page on the fly and determines whether the page content could look offensive to Google. If so, it prevents your ads from appearing on those pages. And you can tweak the strength of the algorithm. The Pro version also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons AdSense bans you.',
    'benefits' => '<li>A safety filter to help you maintain your AdSense account standing. This fast and efficient filter will help keep your AdSense account in good standing by suppressing your ads on pages that may violate Google policies. For instance, if a visitor leaves a comment deemed offensive by Google, this filter will kick in as remove your ads from that page.</li>
<li>Ability to suppress your ads on some IPs to prevent accidental clicks on your own ads -- one of the main reasons for getting your AdSense account banned. It will also help prevent intentional clicks (by your jealous competitor, for instance).</li>
<li>A compatibility mode, if the ad insertion messes up the page layout. Some poorly coded themes may get your pages messed up by ad insertion. The compatibility mode will help prevent it.</li>'
) ;

$myPlugins['adsense-now'] =
  array('value' => 'AdSense Now!',
    'support' => 'UE28AQZUTTX8Q',
    'price' => '3.95',
    'share' => true,
    'long' => true,
    'blurb' => '<em><strong>AdSense Now!</strong></em> is an updated version of another popular (downloaded about 150,000 times) WordPress plugin. This premium plugin ',
    'desc' => 'gets you started with Google AdSense. No mess, no fuss.',
    'title' => '<em><strong>AdSense Now!</strong></em> is the simplest possible way to generate revenue from your blog using Google AdSense. Aiming at simplicity, <em><strong>AdSense Now!</strong></em> does only one thing: it puts your AdSense code in up to three spots in your posts and pages (both existing ones and those yet to be written).',
    'pro' => 'The Lite version of <em><strong>AdSense Now!</strong></em> is fully functional. In the Pro version, you get a filter to minimize the chance of your AdSense account getting banned. It uses a fast and effective keyword matching algorithm to examine the contents of each page on the fly and determines whether the page content could look offensive to Google. If so, it prevents your ads from appearing on those pages. And you can tweak the strength of the algorithm. The Pro version also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons AdSense bans you.',
    'benefits' => $myPlugins['easy-adsense']['benefits']) ;

$myPlugins['easy-ads'] =
  array('value' => 'Easy Ads',
    'support' => 'YBB5HXSJ97C7E',
    'price' => '8.95',
    'share' => true,
    'long' => false,
    'blurb' => '<em><strong>Easy Ads</strong></em> is a multi-provider advertising plugin. This streamlined plugin ',
    'desc' => 'showcases AdSense and its alternatives on your blog',
    'title' => '<em><strong>Easy Ads</strong></em> provides a unified and intuitive interface to manage multiple ad providers on your blog. It lets you insert ads provided by <a href="http://www.clicksor.com/pub/index.php?ref=105268" title="Careful, do not double-date with AdSense and Clicksor, they get very jealous of each other!">Clicksor</a>, <a href="http://www.bidvertiser.com/bdv/bidvertiser/bdv_ref_publisher.dbm?Ref_Option=pub&amp;Ref_PID=229404" title="Another fine ad provider">BidVertiser</a> or <a href="http://chitika.com/publishers.php?refid=manojt" title="Compatible with AdSense">Chitika</a> into your existing and future blog posts and pages.',
    'pro' => 'The Lite version of <em><strong>Easy Ads</strong></em> is fully functional.  In the Pro version, you get a filter to minimize the chance of your AdSense and other accounts getting banned. It uses a fast and effective keyword matching algorithm to examine the contents of each page on the fly and determines whether the page content could look offensive to Google and others. If so, it prevents your ads from appearing on those pages. And you can tweak the strength of the algorithm (for each provider). The Pro version also gives you control over other global options like activating and deactivating various ad providers, resetting all options etc. The Pro version also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons the ad providers may ban you.' . $needPHP53) ;

$myPlugins['easy-chitika'] =
  array('value' => 'Easy Chitika',
    'support' => 'K2XN646VT5LVQ',
    'price' => '4.95',
    'share' => true,
    'long' => false,
    'blurb' => '<em><strong>Easy Chitika</strong></em> is an specialized, single-provider version of <em><strong>Easy Ads</strong></em>. If you are planning to use more than two providers, it may be easier and more economical to use <em><strong>Easy Ads</strong></em>. <em><strong>Easy Chitika</strong></em> ',
    'desc' => 'provides you with a fully streamlined interface to manage Chitika ads on your blog.',
    'title' => '<a href="http://chitika.com/publishers.php?refid=manojt" title="Compatible with AdSense">Chitika</a> is a good option if you want to supplement your AdSense income. <a href="http://buy.ads-ez.com/plugins/easy-chitika/" title="A new plugin to handle Chitika"><em><strong>Easy Chitika</strong></em></a> provides you with a specialized and intuitive interface to manage all aspects of Chitika ads on your blog, with size selectors, widget options, color-picker to customize your colors, etc.',
    'pro' => 'The Lite version of <em><strong>Easy Chitika</strong></em> is fully functional.  But the Pro version gives you more features and control. In the Pro version, you get a filter to minimize the chance of your account getting banned. It uses a fast and effective keyword matching algorithm to examine the contents of each page on the fly and determines whether the page content could look offensive to the provider. If so, it prevents your ads from appearing on those pages. And you can tweak the strength of the algorithm. The Pro version also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons the ad providers may ban you.' . $needPHP53) ;

$myPlugins['easy-bidvertiser'] =
  array('value' => 'Easy BidVertiser',
    'support' => '4W6E6JVP5RYQU',
    'price' => '4.95',
    'share' => true,
    'long' => false,
    'blurb' => '<em><strong>Easy BidVertiser</strong></em> is an specialized, single-provider version of <em><strong>Easy Ads</strong></em>. If you are planning to use more than two providers, it may be easier and more economical to use <em><strong>Easy Ads</strong></em>. <em><strong>Easy BidVertiser</strong></em> ',
    'desc' => 'provides you with a fully streamlined interface to manage BidVertiser ads on your blog.',
    'title' => '<a href="http://www.bidvertiser.com/bdv/bidvertiser/bdv_ref_publisher.dbm?Ref_Option=pub&amp;Ref_PID=229404" title="Another fine ad provider">BidVertiser</a> is another fine ad provider. <a href="http://buy.ads-ez.com/plugins/easy-bidvertiser/" title="A new plugin to handle BidVertiser"><em><strong>Easy BidVertiser</strong></em></a> gives you a good interface to manage BidVertiser ads on your blog, with sidebar widget options.',
    'pro' => 'The Lite version of <em><strong>Easy BidVertiser</strong></em> is fully functional. But the Pro version gives you more features and control. In the Pro version, you get a filter to minimize the chance of your account getting banned. It uses a fast and effective keyword matching algorithm to examine the contents of each page on the fly and determines whether the page content could look offensive to the provider. If so, it prevents your ads from appearing on those pages. And you can tweak the strength of the algorithm. The Pro version also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons the ad providers may ban you.' . $needPHP53) ;

$myPlugins['easy-google'] =
  array('value' => 'Easy Google',
    'support' => '6M4A94KQMA9UL',
    'price' => '4.95',
    'share' => true,
    'long' => false,
    'blurb' => '<em><strong>Easy Google</strong></em> is a single-provider version of <em><strong>Easy Ads</strong></em> specialized for Google AdSense serving. If you are planning to use more than two providers, it may be easier and more economical to use <em><strong>Easy Ads</strong></em>. <em><strong>Easy Google</strong></em> ',
    'desc' => 'provides you with a fully streamlined interface to manage Google AdSense on your blog.',
    'title' => '<a href="http://buy.ads-ez.com/plugins/easy-google/" title="A new plugin to handle Google"><em><strong>Easy Google</strong></em></a> gives you a specialized and intuitive interface to manage AdSense ads on your blog, with size selectors, widget options, color-picker to customize your colors, etc. It is a new generation plugin with a fancy, tabbed interface.',
    'pro' => 'The Lite version of <em><strong>Easy Google</strong></em> is fully functional.  But the Pro version gives you more features and control. In the Pro version, you get a filter to minimize the chance of your AdSense account getting banned. It uses a fast and effective keyword matching algorithm to examine the contents of each page on the fly and determines whether the page content could look offensive to Google. If so, it prevents your ads from appearing on those pages. And you can tweak the strength of the algorithm. The Pro version also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons AdSense bans you.' . $needPHP53) ;

$myPlugins['theme-tweaker'] =
  array('value' => 'Theme Tweaker',
    'support' => 'UKPDMR89Z22DN',
    'price' => '3.95',
    'share' => false,
    'long' => true,
    'blurb' =>'<em><strong>Theme Tweaker</strong></em> is a remarkable plugin that ',
    'desc' => 'lets you modify the colors in your theme with no CSS/PHP editing.',
    'title' => '<em><strong>Theme Tweaker</strong></em> displays the existing colors from your current theme, and gives you a color picker to replace them. It also lets you change them in bulk, like invert all colors, use grey scale etc.',
    'pro' => 'Note that <em><strong>Theme Tweaker</strong></em> may not work with some themes. Please verify its suitability using the Lite version first. The Lite version of the plugin is fully functional. The Pro version lets you create and save your tweaked <code>style.css</code> files, and even generate your own child themes!',
    'benefits' => '<li>Ability to generate and download <code>style.css</code> files with your modified colors.</li>
<li>Ability to create a child theme so that your changes can be applied even when the underlying theme is updated.</li>') ;

$myPlugins['easy-latex'] =
  array('value' => 'Easy WP LaTeX',
    'support' => 'UFFMGT9QHJY2N',
    'price' => '2.95',
    'share' => false,
    'long' => true,
    'blurb' =>'<em><strong>Easy WP LaTeX</strong></em> is a premium plugin that ',
    'desc' => 'provides a very easy way to display math and equations in your posts.',
    'title' => '<em><strong>Easy WP LaTeX</strong></em> provides a very easy way to display equations or mathematical formulas (typed in as TeX or LaTeX code) in your posts. It translates LaTeX formulas like this [math](a+b)^2 = a^2 + b^2 + 2ab[/math] into this:<br/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="http://l.wordpress.com/latex.php?latex=(a%2bb)^2%20=%20a^2%20%2b%20b^2%20%2b%202ab&amp;bg=E2E7FF&amp;s=1" style="vertical-align:-70%;" alt="(a+b)^2 = a^2 + b^2 + 2ab" />',
    'pro' => 'The Lite version of the plugin is fully functional. The Pro version gives you options to cache the equation images so that your pages load faster.') ;

$myPlugins['easy-translator'] =
  array('value' => 'Easy Translator',
    'support' => '48XZQ7LRDAV28',
    'price' => '1.95' ,
    'share' => false,
    'long' => true,
    'blurb' =>'<em><strong>Easy Translator</strong></em> ',
    'desc' => 'is a plugin translation tool for authors and translators. (Not a blog page translator!)',
    'title' => '<em><strong>Easy Translator</strong></em> is a plugin to translate other plugins. It picks up translatable strings (in _[_e]() functions) and presents them and their existing translations (from the MO object of the current text-domain, if loaded) in a user editable form. It can generate a valid PO file that can be emailed to the plugin author directly from the its window, streamlining your work.',
    'pro' => 'The Lite version of Easy Translator is fully functional. The Pro version adds the ability to email the generated PO file directly, without having to save it and attach it to a mail message.') ;

$myPlugins['unreal-universe'] =
  array('value' => 'The Unreal Universe - eBook',
    'support' => '',
    'url' => 'http://www.theunrealuniverse.com',
    'amazon' => 'http://www.amazon.com/exec/obidos/ASIN/9810575947/unrblo-20',
    'price' => '1.49',
    'share' => false,
    'long' => true,
    'blurb' => '<em><strong>The Unreal Universe</strong></em> is a remarkable book on physics and philosophy, science and religion. This compelling read ',
    'desc' => 'will change the way you look at reality and understand the universe around you. Ever wonder why nothing can faster than light? And the Earth was void until God said "Let there be light"? Here are some of the answers.',
    'title' => '<em><strong>The Unreal Universe</strong></em> is a remarkable book on physics, philosophy and surprising interconnections among seemingly disconnected silos of human knowledge.',
    'pro' => '',
    'isBook' => true) ;

function renderInvite($plg, $plgName) {
  $plgLongName = $plg['value'] ;
  $plgPrice = $plg['price'] ;
  $benefits = $plg['benefits'] ;
  $yesTip = sprintf(__('Buy %s Pro for $%s. Instant download.', 'easy-adsenser'),$plgLongName, $plgPrice) ;
  $yesTitle = __('Get the Pro version now!', 'easy-adsenser') ;
  $noTip = __('Continue using the Lite version, and hide this message for now.', 'easy-adsenser') ;
  $noTitle = __('Stay Lite', 'easy-adsenser') ;
  if (empty($benefits)) return ;
echo <<<ENDINVITE
<div style="background-color:#fdd;border: solid 1px #f00; padding:5px" id="tnc">
<p><h3>Want More Features? <a href="#" onmouseover="Tip('$yesTip', WIDTH, 200, CLICKCLOSE, true, TITLE, '$yesTitle')" onmouseout="UnTip()" onclick = "buttonwhich('Yes')">Go Pro!</a></h3>
The Pro version of this plugin gives you more features and benefits. For instance,
<ol>
$benefits
</ol>
And much more. New features and bug fixes will first appear in the Pro version before being ported to this freely distributed Lite edition. </p>
<input onmouseover="Tip('$yesTip', WIDTH, 200, CLICKCLOSE, true, TITLE, '$yesTitle')" onmouseout="UnTip()" type = "button" id = "ybutton" value = "Go Pro!" onclick = "buttonwhich('Yes')">
<input onmouseover="Tip('$noTip', WIDTH, 200, CLICKCLOSE, true, TITLE, '$noTitle')" onmouseout="UnTip()" type = "button" id = "nbutton" value = "No thanks" onclick = "buttonwhich('No')">

<script type = "text/javascript">
function hideInvite() {
  document.getElementById("tnc").style.display = 'none';
}
function buttonwhich(message) {
  document.getElementById("ybutton").style.display = 'none';
  document.getElementById("nbutton").disabled = 'true';
  document.getElementById("nbutton").value = 'Thank you for using $plgLongName Lite!';
  setTimeout('hideInvite()', 2000);
  if (message == 'Yes') window.open('http://buy.ads-ez.com/$plgName') ;
}
</script>
</div>
ENDINVITE;
}
?>