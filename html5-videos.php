<?php
/*
Plugin Name: HTML5 Videos
Plugin URI: http://cremalab.com/html5-video-shortcodes/
Description: Adds a button to the WYSIWYG editor to embed HTML5 videos from the Media Library
Version: 1.0.1
Author: Dustin Hayes
Author URI: http://cremalab.com
License: GPLv2 or later
*/




/*
==========================================================
===    Prevent Viewing This Page Directly              ===
==========================================================
*/
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }






/*
==========================================================
===    Add HTML5 Video button to WYSIWYG editor        ===
==========================================================
*/
function add_html5Video_button() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "add_html5Video_tinymce_plugin");
     add_filter('mce_buttons', 'register_html5Video_button');
   }
}
 
function register_html5Video_button($buttons) {
   array_push($buttons, "|", "html5Video");
   return $buttons;
}
 

function add_html5Video_tinymce_plugin($plugin_array) {
   $plugin_array['html5Video'] = plugins_url('html5-videos') . '/js/editor_plugin.js';
   return $plugin_array;
}
 
function html5_video_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

add_filter( 'tiny_mce_version', 'html5_video_refresh_mce');
add_action('init', 'add_html5Video_button');










/*
==========================================================
===    Add Video-JS script and styles to WP Head       ===
==========================================================
*/
function fileExists($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    $result = curl_exec($curl);
    $ret = false;
    if ($result !== false) {
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($statusCode == 200) {
            $ret = true;   
        }
    }
    curl_close($curl);
    return $ret;
}

function add_videojs(){
  $css = (fileExists('http://vjs.zencdn.net/c/video-js.css')) ? 'http://vjs.zencdn.net/c/video-js.css' : plugins_url('css/video-js.css', __FILE__);
  $js = (fileExists('http://vjs.zencdn.net/c/video.js')) ? 'http://vjs.zencdn.net/c/video.js' : plugins_url('js/video-js.js', __FILE__);  
	echo '<link href="' . $css . '" rel="stylesheet"><script src="' . $js . '"></script>';	
}
add_action('wp_head','add_videojs');







/*
==========================================================
===    Create Video Shortcode                          ===
==========================================================
*/
function html5_video_shortcode($atts){
	
	extract(shortcode_atts(array(
		'mp4' => '',
		'webm' => '',
		'ogg' => '',
		'poster' => '',
		'width' => 320,
		'height' => 240,
		'preload' => 'true',
		'autoplay' => 'autoplay',
		'setup' => 'auto'
	), $atts));

	$id = 'video_'.rand();	
		
	$mp4_source = ($mp4) ? '<source src="'.$mp4.'" type=\'video/mp4\' />' : '';		
	$webm_source = ($webm) ? '<source src="'.$webm.'" type=\'video/webm; codecs="vp8, vorbis"\' />' : '';	
	$ogg_source = ($ogg) ? '<source src="'.$ogg.'" type=\'video/ogg; codecs="theora, vorbis"\' />' : '';		
	$poster_attribute = ($poster) ? ' poster="'.$poster.'"' : '';	
	$preload_value = ($preload && $preload=='true') ? 'auto' : 'none';
	$preload_attribute = 'preload="'.$preload_value.'"';
	$autoplay_attribute =  ($autoplay == "true") ? ' autoplay' : '';
	$data_setup = ($setup == 'auto') ? ' data-setup="{}"' : '';

	$videojs = '<video id="' . $id . '" class="video-js vjs-default-skin" width="' . $width .'" height="'. $height .'"  controls ' . $poster_attribute . $preload_attribute . $autoplay_attribute . $data_setup . '>';	
		$videojs .= $mp4_source;
		$videojs .= $webm_source;
		$videojs .= $ogg_source;
	$videojs .= '</video>';
	
	if('auto' != $data_setup) {
  	$videojs .= '<script>var ' . $id . ' = _V_("' . $id . '");</script>';
	}

	return $videojs;

}
add_shortcode('video', 'html5_video_shortcode');

?>