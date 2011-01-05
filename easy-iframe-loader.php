<?php
/* 
Plugin Name: Easy iFrame Loader
Plugin URI: http://phat-reaction.com/wordpress-plugins/easy-iframe-loader
Version: 1.0
Author: Andy Killen
Author URI: http://phat-reaction.com
Description: Simple plugin to handle iframe late loading from a shortcode, template tag or widget
Copyright 2010 Andy Killen  (email : andy  [a t ] phat hyphen reaction DOT com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
              
if (!class_exists("iframeLoader")) {
	class iframeLoader {
            var $adminOptionsName = "iframeLoaderAdminOptions";
                //
                // class constructor
                //
		function iframeLoader() {
		}
		function init() {
			// $this->getAdminOptions();
                }

//function loadLangauge ()
//{
//    $plugin_dir = basename(dirname(__FILE__));
//    load_plugin_textdomain( 'easy-iframe-loader', null, $plugin_dir );
//}

function do_iframe_script($args){
        $defaults = array('height' => "150",'width' => "100%",'frameborder' => '0','scrolling'=>'auto', 'src'=>'',
        'longdesc'=>'','marginheight'=>'0','marginwidth'=>'0', 'name'=>'','click_words'=>'','click_url'=>'');
        $args = wp_parse_args( $args, $defaults );
        extract( $args, EXTR_SKIP );
        $html = "<script  type=\"text/javascript\"> \n";
        $html .="//<![CDATA[  \n";
        $html .="window.onload = document.write(\"";
        $html .="<iframe src='".$src."' width='".$width."' height='".$height."' marginwidth='".$marginwidth."' marginheight='".$marginheight."' scrolling='".$scrolling."' frameborder='".$frameborder."' ";
         if (!empty ($name)){ $html .= " name='".$name."' ";}
         if (!empty ($longdesc)){ $html .= " longdesc='".$longdesc."' ";}
         $html .= "></iframe> \") \n ";
         if (!empty($click_words) && !empty($click_url)){$html .="window.onload = document.write(\"<br /><a href='".$click_url."'>".$click_words."</a><br/>\")";}
         $html .= " //]]> \n</script>";
         return $html;
}


function late_iframe_loader($atts){
       extract(shortcode_atts(array(
            'height' => "150",'width' => "100%",'frameborder' => '0','scrolling'=>'auto', 'src'=>'',
            'longdesc'=>'','marginheight'=>'0','marginwidth'=>'0', 'name'=>'','click_words'=>'','click_url'=>''
       ), $atts));
        $args = array('url' => $url,'height' => $height,'width' => $width,'frameborder' => $frameborder,
            'longdesc'=>$longdesc,'marginheight'=>$marginheight,'marginwidth'=>$marginwidth, 'name'=>$name,'click_words'=>$click_words,'click_url'=>$click_url,
            'scrolling'=>$scrolling, 'src'=>$src);
        $html = iframeLoader::do_iframe_script($args);
        return $html;
}

function load_widgets() {
    register_widget( 'iFrame_Widget' );
}

}
}

require_once('iframe-widget.php');   //  includes the code for the iframe widget

//  setup new instance of plugin
if (class_exists("iframeLoader")) {$cons_iframeLoader = new iframeLoader();}
//Actions and Filters	
if (isset($cons_iframeLoader)) {
//Actions
// setup widgets
add_action('widgets_init',array(&$cons_iframeLoader, 'load_widgets'),1); // loads widgets

// Will add language files when done.  not needed at this time
// add_action ('init',array(&$cons_iframeLoader, 'loadLangauge'),1);  // add languages
// save custom user fields
add_shortcode('iframe_loader', array(&$cons_iframeLoader,'late_iframe_loader'),1); // setup shortcode [iframe_loader]
}
//
// tempate tag
//
function add_iframe_late_load($args){
   echo iframeLoader::do_iframe_script($args);
}
?>
