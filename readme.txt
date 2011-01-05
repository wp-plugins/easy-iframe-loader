=== Plugin Name ===
Contributors: andykillen
Donate link: http://phat-reaction.com/wordpress-plugins/easy-iframe-loader/donations/
Tags: iframe, javascript, late load, shortcode, widget, template, tag, speed, page, post
Requires at least: 2.5
Tested up to: 3.1
Stable tag: 1.0

Adds a shortcode/widget/template tag to manage iFrame loading, uses javascript for late loading to increase page speed.

== Description ==

Simple plugin that (at this time) uses a shortcode, widget or template tag to late load iFrames using javascript.  This gets over 2 separate problems.

* loading of iframe does not happen until after the complete page has loaded by using the window.onload command, thus making page loading quicker when an iFrame is used directly in the HTML as an iFrames want to load first stopping the rest of the page loading.
* Gets over the automatic deletion of iFrame info from the editor when the user changes between Visual and HTML mode.

= Comes in the following formats =
1. shortcode for content creators
1. widget for administrators
1. template tag for developers

Here's a link to [Easy iFrame Loader](http://phat-reaction.com/wordpress-plugins/easy-iframe-loader/ "Full Instructions") Support Page

Do make sure that you donate when using this plugin, as nobody can live on fresh air alone.  Buy me a beer for saving you loads of hassel or maybe a coffee.

Here's a link to [Easy iFrame Loader Donations](http://phat-reaction.com/wordpress-plugins/easy-iframe-loader/donations/ "Donations") Page

== Installation ==

There are 2 ways to install the Easy iFrame Loader

*Using the Wordpress Admin screen*

1. Click Plugins, Add New
1. Search for Easy iFrame Loader by Andy Killen
1. Install and Activate it
1. Place '[iframe_loader src=""]' in your pages or posts, use the widget or tempate tag

*Using FTP*

1. Upload 'easy-iframe-loader' to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place '[iframe_loader src=""]' in your pages or posts, use the widget or tempate tag

== Frequently Asked Questions ==
*Working with the Shortcode*

= What are the default settings?  =

`[iframe_loader width='100%' height='150'  frameborder = '0'  longdesc=' ' marginheight='0'  marginwidth='0' name=' ' click_words=' ' click_url=' '  scrolling='auto'   src=' ']`

= Can I have an example of it loading a vimeo video? =

`[iframe_loader src='http://player.vimeo.com/video/15507608' height='225' width='400' click_words='go to vimeo to view it' click_url='http://vimeo.com/15507608' ]`

= what about an example showing a google map? =

`[iframe_loader width='425' height='350'  click_words='View Larger Map' click_url='http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Dam,+Amsterdam,+Nederland&amp;sll=37.0625,-95.677068&amp;sspn=50.777825,117.509766&amp;ie=UTF8&amp;hq=&amp;hnear=Dam,+Amsterdam,+The+Netherlands&amp;z=14&amp;ll=52.372738,4.892738' src='http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Dam,+Amsterdam,+Nederland&amp;sll=37.0625,-95.677068&amp;sspn=50.777825,117.509766&amp;ie=UTF8&amp;hq=&amp;hnear=Dam,+Amsterdam,+The+Netherlands&amp;z=14&amp;ll=52.372738,4.892738&amp;output=embed']`

*Working with the Widget*
= How do I use the widget? =

Just drag and drop the widget accross into the wanted dynamtic sidebar.  (Apperance --> Widgets).  The only necessary item is the URL of the iframe, all other items are pre-set, so it will still work.  It is better though to spend the time to fill in all the items.

*Working with the Template tag*
= How does the template tag work? =
inside a php file add
*minimum settings*
` <?php $args = array ('src'=>'URL-of-iFrame', 'height'=>'wanted-height-in-px')
add_iframe_late_load($args) ?> `

All options
`$args = array('height' => "150",'width' => "100%",'frameborder' => '0','scrolling'=>'auto', 'src'=>'',
            'longdesc'=>'','marginheight'=>'0','marginwidth'=>'0', 'name'=>'','click_words'=>'','click_url'=>'');`

== Changelog ==

= 1.0 =
First version

== Upgrade Notice ==

= 1.0 =
First version, no upgrades
