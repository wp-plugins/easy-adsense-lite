=== Easy AdSense Lite ===
Contributors: manojtd
Donate link: http://buy.ads-ez.com/easy-adsense
Tags: adsense, ad, ads, advertising, google
Requires at least: 2.6
Tested up to: 3.2
Stable tag: 5.01

Easy AdSense manages all aspects of Google AdSense for your blog: insert ads into posts and sidebar, and add a Google Search box. Easy and complete!

== Description ==

Easy AdSense provides a very easy way to generate revenue from your blog using Google AdSense. With its full set of features, Easy AdSense is perhaps the first plugin to give you a complete solution for everything AdSense-related.

= Features =

1. Enforces the Google policy of not more than three ad blocks per page.
2. Sidebar Widgets:
 - For AdSense for content with custom title.
 - For search with customizable text or image title.
 - For Link Units.
3. Rich set of Options:
 - Put Link Units or Ad Blocks in header or footer.
 - Suppress ads on all pages (as opposed to posts), or on the front/home page.
 - Add a customizable mouse-over border decoration on ad blocks.
 - Display ad blocks based on the post length.
4. Control over the positioning and display of AdSense blocks in each post or page.
5. Simplest possible configuration interface -- nothing more than cutting and pasting AdSense code, and with sensible defaults for the few options present, all with clear instructions.
6. Internationalized (multiple languages supported).

Easy AdSense Lite is the freely distributed version of a premium plugin. The [Pro version](http://buy.ads-ez.com/easy-adsense/ "Pro version of the Easy AdSense plugin") gives you more benefits. It gives you filter to ensure that your ads show only on those pages that seem to comply with Google AdSense policies, which can be important since some comments may render your pages inconsistent with those policies. It also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons AdSense bans you. Also in the works for the Pro version is a compatibility mode, which solves the issue of the ad insertion messing up your page appearances when using some  themes. These features will minimize your chance of getting banned. The Pro version costs $4.95, and is appropriate if you expect to make more than $100 of ad revenue from your site.

If you feel that these features are a bit too much, consider my lean and mean AdSense plugin [AdSense Now!](http://www.thulasidas.com/plugins/adsense-now/ "The simplest possible way to AdSense enable your blog")

Want to go beyond AdSense? Use my new plugin [Easy Ads](http://www.thulasidas.com/plugins/easy-ads/ "A new plugin to handle AdSense and its alternatives") that can handle [Clicksor](http://www.clicksor.com/pub/index.php?ref=105268 "Careful, don't double-date with AdSense and Clicksor, they get very jealous of each other!"), [BidVertiser](http://www.bidvertiser.com/bdv/bidvertiser/bdv_ref_publisher.dbm?Ref_Option=pub&Ref_PID=229404 "Another fine ad provider") or [Chitika](http://chitika.com/publishers.php?refid=manojt "Compatible with AdSense") and, of course, AdSense!

PS: You'll need a [Google AdSense Account](http://adsense.google.com/).

If you like Easy AdSense, you may want to check out my other plugins: [Theme Tweaker](http://www.thulasidas.com/plugins/theme-tweaker/ "To tweak the colors in your theme with no CSS/PHP editing") and [Easy WP LaTeX](/http://www.thulasidas.com/plugins/easy-latex/ "To display mathematical equations in your blog using LaTeX"). And my plugin for plugin authors: [Easy Translator](http://www.thulasidas.com/plugins/easy-translator/  "To translate any plugin (with internationalized strings) to your language.").

= Coming Soon! =

A major version upgrade is planned for later this year, which will be released as a new plugin, [Easy Google](http://www.thulasidas.com/plugins/easy-google/ "Easy Google, the next generation AdSense plugin"). This plugin will sport a modern, tabbed interface, and a completely re-written, refactored and optimized codebase and option data model, resulting in a more robust and extensible design, and better performance.

= New in 5.01 =

Documentation changes.

== Upgrade Notice ==

= 5.01 =

Documentation changes.

== Screenshots ==

1. How to set the options for Easy AdSense
2. Easy AdSense in action - on my own blog.

== Installation ==

1. Upload the Easy AdSense plugin (the whole easy-adsense folder) to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the Setup -> Easy AdSense and enter your AdSense code and options.
4. Go to Themes -> Widgets to add widgets to your side bar(s).

= Tips =

Although the Easy AdSense plugin is designed to handle Google AdSense efficiently, there is nothing preventing you from using the text boxes to place any other kind of text in your blog posts and pages. In particular, you can use ad text from other providers, especially in the header and footer.

== Frequently Asked Questions ==

= Why do I get a "Plugin does not have valid header" error? =

This seems to be a problem with some WordPress installations. I have never been able to reproduce this error on any of my installations. I have found [this on the web](http://webdesign.anmari.com/2312/activation-error-plugin-does-not-have-valid-header-still-activates/ "This may give you some ideas") though.

= What are the different versions of the plugin? =

Easy AdSense Lite is the freely distributed version of a premium plugin. The [Pro version](https://buy.ads-ez.com/easy-adsense/ "Pro version of the Easy AdSense plugin") gives you more benefits -- lets you activate a filter to ensure that your ads show only on those pages that seem to comply with Google AdSense policies. It also lets you specify a list of computers where your ads will not be shown, in order to prevent accidental clicks on your own ads -- one of the main reasons AdSense bans you. These features will minimize your chance of getting banned. The Pro version costs $4.95, and is appropriate if you expect to make more than $100 of ad revenue from your site.

Note that support is *not* included. Each [support question](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HYZ5AWPYSC8VA "Ask a support question via PayPal") (for both the Lite and Pro versions) will be charged at $0.95. The same charges will apply for follow-up questions as well. In other words, support pricing is on a per-question basis, not a per-issue basis.

= The new placement option for lead-in ad block in the header doesn't work the way I like. Can you fix it? =

Short answer: No, I couldn't figure out how to do it better.

Long answer: This option works by adding an action to a hook in WordPress. I could not find a hook that would get activated right after the `<body>` tag in the generated HTML, and right after the header image is placed (and before the sidebars are inserted). If you know the hook names, please let me know. Also, if your theme has "side" bars near the header and footer (north and south sidebars), there may be conflicts between `add_action` hooks resulting in unexpected behavior.

Note that the `Below Header` and `End of Page` options are hacks that may not be compatible with the WordPress default widget for `Recent Posts` or anything else that may use DB queries or loops. If you have problems with your sidebars and/or font sizes, please choose some other `Position` option.

= I get the error "Error locating or loading the defaults! Ensure 'defaults.php' exists, or reinstall the plugin." What to do? =

Please copy *all* the files in the zip archive to your plugin directory. The zip archive `easy-adsense-lite.?.??.zip` contains the directories `easy-adsense-lite` and `easy-adsense-lite/lang`. You need all the files in the `easy-adsense` directory. One of these files is the missing `defaults.php`. The `lang` directory, on the other hand, is optional and is meant for international users.

= How can I control the appearance of the adsense using CSS? =

All `<div>`s that Easy AdSense creates have the class attribute `adsense`. Furthermore, they have class attributes like `adsense-leadin`, `adsense-midtext`, `adsense-leadout`, `adsense-widget` and `adsense-lu` depending on the type. You can set the style for these classes in your theme `style.css` to control their appearance.

= Why does my AdSense code disappear when I switch to a new theme? =

One of my motivations in writing Easy AdSense was the fact that every time I switched between themes, I had to regenerate the AdSense code to match my new colors. Since I often switched back to the original theme (when I would have to regenerate the code again), I wanted to keep the AdSense code *per theme* in my database. Now, with Easy AdSense activated, I can switch among my themes without worrying about the AdSense color mismatch. This is what I meant when I said, "Remembers AdSense code and your options by theme, so that you don't have to re-enter them if you play with multiple themes. [This feature provides a solution to Google's unwillingness to let you modify and customize the AdSense code -- you just store all the code variants in your blog database.]" as the most important feature of Easy AdSense.

But this unfortunately means that you do have to set the code *once* whenever you switch to a new theme. I suppose I could have checked your database for some other AdSense code and presented it as defaults, but such complex logic usually results in less robust programs, and pain and suffering down the road.

= Can I control how the ad blocks are formatted in each page? =

Yes! Now, in V2.1+, you more options [through **custom fields**] to control ad blocks in individual posts/pages. Add custom fields with keys like **adsense-top, adsense-middle, adsense-bottom, adsense-widget, adsense-search** and with values like **left, right, center** or **no** to have control how the ad blocks show up in each post or page. The value "**no**" suppresses all AdSense ad blocks in the post or page.

= I find this *easy* plugin too complex with too many options. Any alternatives? =

If you feel that the features of Easy AdSense are a bit too much, consider my lean and mean AdSense plugin [AdSense Now!](http://www.thulasidas.com/plugins/adsense-now/ "The simplest possible way to AdSense enable your blog")

= I just upgraded to WordPress version 2.8. My widget is gone and I'm mad. What gives? =

WP2.8 uses a different widget API. Easy AdSense is compatible with it. Just go to your widget page, and drag and drop it again in the sidebar of your choice at the right point. Fret not, your settings and AdSense code are safely saved (per theme), and you don't have to cut and paste those details again.

= I just activated the plugin. How come I don't see any ads in my blog? =

Note that you have to generate your adsense code from Google, and paste the *entire* code in the text boxes, replacing the existing text. There are three main text boxes corresponding to three ad locations - Lead-in, Mid-text and Lead-out. If you don't want to use a particular location, please suppress it by selecting the appropriate option. Otherwise, the plugin will show a red box indicating where you ad would be shown.

If you just created the new Google AdSense code, it may not be active yet. Google takes about ten minutes or so before serving ads. Please try again later.

= I am having a difficult time getting the middle of post ads to show. They show in some posts, but not all of them. Any possible recommendations? =

The middle ads are designed to show up only on long posts (of more than 20 paragraphs). Use the option to force the mid-text ads (in v1.82+) to override this length check.

= How do I report a bug or ask a question? =

Easy AdSense now uses a paid support model. Each [support question](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HYZ5AWPYSC8VA "Ask a support question via PayPal") question is now sent along with a payment of $0.95 via a PayPal interface.

== Translations ==

* Turkish: [Omer Faruk](http://ramerta.com "Easy AdSense in Turkish (Turkce Ceviri)"), [Nurullah DEMIR](http://ndemir.com "Nurullah DEMIR"), [Murat Umutlu](http://www.simavlilar.com "Simav Sitesi Simav Bilgileri Simav Hakkõnda"), [Murat Kolukırık](http://www.sachkuafor.com "Sach ® Kuaför Saç Kaynak Merkezi").
* Spanish: [Joaquin R. Rizer](http://www.shanky.com.ar "Joaquin R. Rizer"), [Maikel Frias](http://www.maikeladas.es "Maikel Frias"), [Argelio D&Atilde;&shy;az](http://www.goymad.com "El Ca&Atilde;&plusmn;izo"), [MaLk Gopher](http://malk-gopher.com/blog "MaLk Gopher & Friends"), [Pablog Pabloixx](http://rockstarunder.com.ar "RockStar Under"), [Navarra-Tu poblacion](http://navarra.tupoblacion.com "Navarra-Tu poblacion"), [Federico](http://www.posadasgalipan.com "Posadas Galipan"), [J. Marcos Troncoso](http://www.yanotesigue.com "@YaNoTeSigue"), [Jesús Ángel del Pozo Domínguez](http://masters.abloque.com "Ciclismo máster"), [Alberto Montoya](http://www.twittplaya.com "Twitt Playa")
* Portuguese: `pt_BR`: [Maicon Vieira](http://maiconvieira.com "Maicon Vieira"), [Blog da Associação Atlética Portuguesa MK](http://portuguesamk.com "Blog da Associação Atlética Portuguesa MK"), [Ivan Carlos](http://www.icarlos.net "Ivan Carlos"), [Carlos Henrique](http://www.nuncapare.com "NuncaPare"), [Murillo Ferrari](http://www.cparadiso.com.br "Cinema Paradiso"), [Eduardo Dantas Correia](http://eduardo.dantascorreia.com.br "Eduardo Dantas Correia"), [Leandro Vilela](http://www.vilela.pro.br "Leandro Vilela ._."), [Rubens Souza](http://www.panguo.com.br "Panguo"). `pt_PT`: [Rui Macdonald](http://ruimacdonald.com/wordpress "Rui Macdonald"), [jatefoste](http://jatefoste.com "Notícias sobre as últimas novidades tecnológicas"), [Tiago Alves](http://www.ptbyte.net/home ":::PTBYTE:::")
* Italian: [Angelo D Agostino](http://www.console-war.com "Angelo D Agostino"), [NokiaSymbian](http://www.nokiasymbian.it/wp "NokiaSymbian"), Saverio Tonno, [Fabio Napoleoni](http://techblog.zenit.org "Fabio's Tech Blog"), [Miglioriamo Velletri](http://www.miglioriamovelletri.it "Miglioriamo Velletri"), [Guadagno Col Web](http://www.guadagnoiocolweb.com "Guadagno Col Web").
* Bahasa Indonesia: [Hendry](http://debuk.com/ "Hendry"), [Percikan Info](http://gemparuang.com/new "Percikan Info").
* Belarusian: [Marcis Gasuns](http://www.fatcow.com/ "Marcis Gasuns").
* German: [Ole Emken](http://www.ganz-einfach.com "GANZ EINFACH"), [Andre Foltys](http://www.kindergarten-tip.de "Kindergarten-Tip.de"), [Mathias Roth](http://trade-service.eu "Service Center Weserstrasse"), [Albrecht Boucher](http://albrechtboucher.harth-server.de "Albrecht Boucher Blog"), Vincent Kollin.
* Chinese: `zh_CN`: [Akii Snow](http://www.akii.org "Akii Snow"), [ShenMeng](http://shenmeng.org "ShenMeng"), [Joojen](http://www.keege.com "Joojen"), [http://imxiaoku.co.cc](http://imxiaoku.co.cc "http://imxiaoku.co.cc"). `zh_TW`: [AKiRA](http://akr.tw/ "AKiRA"), [人已散。曲未终。](http://leots.me "人已散。曲未终。")
* Russian: ["ARCHIPOD"](http://archipod.ru "Vitaliy Alt"), [VN STUDIA](http://vlad.arvixe.ru, "VN-STUDIA") [be-os.ru](http://www.be-os.ru "be-os.ru"), [Алексей Ермаков](http://niagarin.ru "NiagariN.ru")
* Arabic: [Aadil Ennia](http://www.darfx.com "Forex Home"), [Ahmed Ashraf](http://www.aatkcoblog.com "Aatkco Blog")
* French: [Pierric DOMMEC](http://www.nos-comportements.fr "Nos Comportements")
* Polish: [Daniel Fruzynski](http://www.poradnik-webmastera.com/ "Sir Zooro")
* Ukrainian: [Vitalij](http://wpp.pp.ua "WordPress Plugins Ukraine")
* Norwegian: [Terje Storsanden](http://www.storsanden.com/blog "Terje Storsanden")
* Thai: [Poonyapat Wichuma](http://www.newbiesbiz.com/ "Guide to success in your e-commerce business.")
* Danish: [Georg S. Adamsen](http://wordpress.blogos.dk/2009/10/27/google-adsense-plugins-pa-dansk/ "Georg S. Adamsen"), [Morten Beutelmann](http://www.team-devo.dk "Devotion").
* Iranean: [Soheil](http://sabzclick.com/blog "soheil")
* Romanian: `ro_RO` [Bican Valeriu Marian](http://3d-paradise.co.cc "3D-Paradise"), [Anunturi Jibo](http://www.jibo.ro "jIBO.ro")
PS: Plugin author does not endorse any of the translators' websites, nor is he responsible for the contents therein.

A big "Thank You" to all my translators. Easy AdSense V2.6+ sports an *Easy Translator* interface that will make the maintenance of translations a breeze. Please take a look (by following the link on the plugin admin page inviting you to improve the existing translation) and update your translations, when you get a chance. This translation interface works only on WP2.8+; please report any issues you encounter so that I can improve it. Thanks!

== Change Log ==

* V5.01: Documentation changes. [Oct 31, 2011]
* V5.00: Moving the old Pro features to the Lite edition, and releasing it. [Oct 25, 2011]
* V4.10: Removing unused, legacy code. [Oct 8, 2011]
* V4.09: Simplifying `defaults.php`. [Oct 6, 2011]
* V4.08: Releasing updated translations. [Oct 4, 2011]
* V4.07: Changes to translation interface. [Sep 13, 2011]
* V4.06: Another minor bug fix. [Aug 31, 2011]
* V4.05: Documentation and admin-page display changes. Non-critical. [Aug 30, 2011]
* V4.04: Another bug fix. [Aug 29, 2011]
* V4.03: Simplifying the code, removing unused functions etc. and minor bug fixes. [Aug 25, 2011]
* V4.02: Critical bug fix. [Aug 21, 2011]
* V4.01: Minor changes to support and info links on the admin page. [Aug 7, 2011]
* V4.00: First commercial release. [July 30, 2011]
* V3.02: Documentation changes. [July 3, 2011]
* V3.01: Ensured compatibility with WordPress 3.2. [June 17, 2011]
* V3.00: Multiple translation updates and changes to default ads. [June 12, 2011]
* V2.99: Emergency bug fix. [Oct 18, 2010]
* V2.98: More translation updates and support options, and Admin interface changes. [Oct 15, 2010]
* V2.97: Suppressing ads in feeds (user request), changing default and shared ads, and translation update (`pt_PT`). [Oct 2, 2010]
* V2.96: Translation updates. Minor bug fixes and enhancements. [Sep 16, 2010]
* V2.95: Documentation (FAQ) and default changes. [Aug 18, 2010]
* V2.94: More performance optimizations and minor bug fixes. [Aug 12, 2010]
* V2.93: Performance optimization, updating some translations, and changing the default and shared ads (to publicize the author's books and to include other providers). [Aug 10, 2010]
* V2.92: Major revamping of default ads: The default (and shared) ads have been changed to referral images. The text boxes on the admin page now show a reminder to generate and paste your AdSense code. [June 27, 2010]
* V2.91: Updated some translations and added a new reminder on Google policy. [May 20, 2010]
* V2.90: Updated the Russian translation. [Apr 10, 2010]
* V2.89: Updated translations (`da_DK`,`pt_PT` and  `es_ES`). [Mar 20, 2010]
* V2.88: A minor fix on the number of ad blocks on a page. [Mar 6, 2010]
* V2.87: Disabling ads in feeds if header placements are chosen (bug fix). Adding warning on potential incompatibility between some header/footer position options and other WordPress widgets/plugins. [Feb 9, 2010]
* V2.86: Re-enabling header options: Above/below header options stopped working in WP2.91. Here is a fix.[Jan 30, 2010]
* V2.85: Minor bug fixes: some margin settings (on widget and link-unit) were not updating. [Jan 27, 2010]
* V2.84: New feature: Display ad blocks based on the post length. Possible bug fix: suppress RSS feeds filtering. [Jan 22, 2010]
* V2.83: Bug fix (ads on admin pages). New translation (Danish `da_DK`). Updating several translations. [Dec 10, 2009]
* V2.82: Option to suppress in-line style statements so that you can use your style.css to control the ad blocks. Updating a few translations (`tr_TR`, `de_DE`). [Oct 25, 2009]
* V2.81: New text wrapping options around ad blocks. Updating a few translations (`es_ES`, `zh_CN`), and releasing Norwegian (`nb_NO`), and Thai (`th_TH`). [Oct 14, 2009]
* V2.80: Code clean up, updated Italian and new Ukrainian (`uk_UA`) translations. [Sept 24, 2009]
* V2.79: Updating some translations (`es_ES`, `pt_BR`, `de_DE`). [Sept 7, 2009]
* V2.78: More translations. Minor bug fixes (to silence `WP_DEBUG` warnings). [Sept 1, 2009]
* V2.77: French Translation, finally! [August 22, 2009]
* V2.76: Releasing new Arabic, and updated German and Indonesian translations. [Aug 19, 2009]
* V2.75: Improvements on the header and footer options. Partially switching to ClickBank for the donated ad slots. Releasing more translations. [August 10, 2009]
* V2.73: A long overdue option for putting ad blocks near the header and footer. Preparation to use other ad providers (ClickBank for now) in the donated ad slots. [August 2, 2009]
* V2.72: A bug fix related to suppressing the search box and link units titles. [July 30, 2009]
* V2.71: Option to tweak the margins on ad-blocks, as requested by some users. [July 29, 2009]
* V2.70: New option to suppress widget titles. [July 25, 2009]
* V2.64: Releasing `pt_PT` translation. [July 22, 2009]
* V2.63: New translation in Russian (`ru_RU`). Updated translations: Portuguese (`pt_BR`), Simplified Chinese (`zh_CN`). [July 18, 2009]
* V2.62: Attempts to fix automatic update and install issues. Improved documentation highlighting ad space sharing. Not an essential update, but any feedback will be appreciated. [July 16, 2009]
* V2.61: Improvements to the translation tool.  (English users don't need to update.) [July 14, 2009]
* V2.60: Translation tool (called *Easy Translator*) for internationalization. English (en_US) users will see no difference, and have no reason to update. [July 12, 2009]
* V2.59: Option to suppress ads on attachment pages. Simplified Chinese translation. [July 8, 2009]
* V2.58: Admin page enhancements. [July 2, 2009]
* V2.57: Removing min-max enforcing on ad space sharing. [June 30, 2009]
* V2.56: Fixing a typo in `is_category()`. [June 26, 2009]
* V2.55: Fixing the issue with submit buttons in IE8. [June 23, 2009]
* V2.54: Providing `htmlspecialchars_decode()` for compatibility with older versions of PHP. [June 23, 2009]
* V2.53: The `<div>`s containing the adsense code have class names set so that they can be controlled from the theme CSS. The shared ad-slots are of the same size and show only text ads now. [June 23, 2009]
* V2.52: German translation. [June 20,2009]
* V2.51: Widgets modified to handle the new Widgets API in WP2.8+. (Fully backward compatible.) [June 13, 2009]
* V2.50: Option to suppress ads on category/tag/archive pages -- requested feature. Changing the plugin name (dropping the last "r"). Configurable ad-space sharing to support the plugin development. [June 12, 2009]
* V2.41: Option to change the mouse-over border color and width for the ad blocks. Also, option to enable mouse-over decoration for the sidebar widget and link units. [June 6, 2009]
* V2.40: Major improvements on the admin page. Sponsored links on the admin page. Adding a requested Feature: Option to suppress ad blocks in front page/home page. [May 29, 2009]
* V2.38: Fixing a but that prevented the Google search title from being displayed. [May 22, 2009]
* V2.37: Belarusian translation. [May 11, 2009]
* V2.36: Turkish translation. [May 4, 2009]
* V2.35: Added some HTML comments in the page with version number and ad block sequence number for easy trouble shooting. [May 1, 2009]
* V2.34: A new option to put a border around the ad blocks as a mouse over decoration. [April 28, 2009]
* V2.33: More fixes to finally make the admin page totally "Valid XHTML 1.0 Transitional." Also releasing translation in Bahasa Indonesia  [April 17, 2009]
* V2.32: Minor bug fixes related to W3 Validation. [April 13, 2009]
* V2.31: Updating some language files and correcting minor SVN commit errors. [April 12, 2009]
* V2.30: Major overhaul of the interface. New clean look with javascript tooltips hiding details. New options to clean up the database entries and uninstall the plugin. [April 12, 2009]
* V2.26: An option to show ads only in blog posts (and not on pages). [April 9, 2009]
* V2.25: More robust handling of internationalization. [April 4, 2009]
* V2.24: Releasing in Italian, revising Spanish. [April 3, 2009]
* V2.23: Releasing in Portuguese. [March 29, 2009]
* V2.22: Releasing in Spanish and French. [March 28, 2009]
* V2.21: Internationalization -- second pass with my own localization in francais (pathetic though the translation is). [March 26, 2009]
* V2.20: Internationalization (I18n) -- first pass. [March 26, 2009]
* V2.11: Bug fix: the plugin wasn't gracefully handling posts with no custom fields. [March 10, 2009]
* V2.10: Adding more control over displaying AdSense blocks in individual posts/pages. [March 8, 2009]
* V2.01: An option to prioritize the sidebar widget when enforcing the Google policy of not more than three ad blocks. [March 3, 2009]
* V2.00: [Feb 22, 2009]
 1. New widget for Link units.
 2. Complete revamping of the settings page, including an option to reload default settings.
 3. Coding improvements, including separating the HTML of the setting page from the PHP file.
 4. Ability to center ad blocks. [Due to this new feature, you may have to re-enter the alignment options of your existing ads if you are upgrading from an earlier version.]
* V1.82: Option to remove all back-links to my blog, by user demand. Option to force mid-text ad-block even in short posts. [Feb 15, 2009]
* V1.81: Simplifying the options on Google policy and limiting link-backs. [Feb 12, 2009]
* V1.80: An option to limit link-backs, and to show ad blocks in feeds. [Feb 7, 2009]
* V1.70: An option on Google policy -- to have two ad blocks plus the side bar widget, three ad blocks (with or without the side bar widget) or none at all. [Jan 25, 2009]
* V1.61: Restricting the "Easy AdSense by Unreal" plug only to posts and pages. [Jan 18, 2009]
* V1.60: Enforcing the Google AdSense policy of three ad blocks or less per page. [Jan 16, 2009]
* V1.50: Another sidebar widget for Google search, making this plugin a complete solution for all things AdSense-related. [Jan 7, 2009]
* V1.40: A sidebar widget. [Jan 2, 2009]
* V1.30: Theme-specific configurations saved, so that if you switch back and forth between themes, you don't have to change the settings. [Dec 28, 2008]
* V1.20: Tested with WordPress 2.7. Style modifications in the Admin-menu page to match the new WordPress. [Dec 13, 2008]
* V1.10: Use of WordPress style sheets for better look and feel integration. Coding improvements. [Dec. 7, 2008]
* V1.02: Added "Settings" link to the WP plugin page. [Nov 30, 2008]
* V1.01: Minor fix for restricting the filter to single posts. [Nov 29, 2008]
* V1.00: Initial release. [Nov 27, 2008]
