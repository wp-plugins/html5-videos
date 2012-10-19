<?php 

$path = dirname(dirname(dirname(dirname(__FILE__))));
require_once($path . '/wp-blog-header.php');
global $wpdb; 

/*
==========================================================
===    Get Videos by file type                         ===
==========================================================
*/

$sql = "SELECT * FROM " . $wpdb->posts . " WHERE post_mime_type IN ('video/mp4', 'video/ogg', 'video/webm')";
$videos = $wpdb->get_results($sql, ARRAY_A);

$mp4 = '';
$ogg = '';
$webm = '';

foreach($videos as $video) {
	switch($video['post_mime_type']) {
		case 'video/mp4' :
			$mp4 .= '<option value="' . $video['guid'] . '">' . $video['post_title'] . ' (MP4)</option>';
		break;
		
		
		case 'video/ogg' :
			$ogg .= '<option value="' . $video['guid'] . '">' . $video['post_title'] . ' (OGV)</option>';
		break;
		
		
		
		case 'video/webm' :
			$webm .= '<option value="' . $video['guid'] . '">' . $video['post_title'] . ' (WEBM)</option>';
		break;
	}
}




/*
==========================================================
===    Get Images by file type for posters             ===
==========================================================
*/

$sql = "SELECT * FROM " . $wpdb->posts . " WHERE post_mime_type IN ('image/png', 'image/jpg', 'image/gif', 'image/jpeg')";
$images = $wpdb->get_results($sql, ARRAY_A);
$options = '';
foreach($images as $img) {
	$options .= '<option value="' . $img['guid'] . '">' . $img['post_title'] . '</option>';
}


@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>HTML5 Video Shortcodes</title>
	<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('html5-videos'); ?>/css/html5_video.css" />
	<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo plugins_url('html5-videos'); ?>/js/tinymce_functions.js"></script>
    <base target="_self" />
</head>

<body onload="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none" id="link">
	<form>
		<p>
		<label for="mp4">Choose an MP4 video from the library</label><br />
		<select tabindex="1" id="mp4" name="mp4">
			<option value="none">NONE</option>
			<?php echo $mp4; ?>
		</select>
		</p>
		
		<p>
		<label for="ogg">Choose an OGV video from the library</label><br />
		<select tabindex="2" id="ogg" name="ogg">
			<option value="none">NONE</option>
			<?php echo $ogg; ?>
		</select>
		</p>
		
		
		<p>
		<label for="webm">Choose a WEBM video from the library</label><br />
		<select id="webm" tabindex="3" name="webm">
			<option value="none">NONE</option>
			<?php echo $webm; ?>
		</select>
		</p>
		
		
		<p>
		<label for="poster">Choose an image to serve as a poster from the library</label><br />
		<select tabindex="4" id="poster" name="poster">
			<option value="none">NONE</option>
			<?php echo $options; ?>
		</select>
		</p>
		
		<p>
		<input type="text" tabindex="5" placeholder="Video Width" id="video_width" name="video_width" onblur="isNumber(this)"/>px
		</p>
		
		<p>
		<input type="text" tabindex="6" placeholder="Video Height" id="video_height" name="video_height" onblur="isNumber(this)" />px
		</p>
		
		<p>
		<input type="checkbox" tabindex="7" name="video_autoplay" id="video_autoplay" /> Autoplay Video?
		</p>
		
		<p>
		<input type="checkbox" tabindex="8" name="video_preload" id="video_preload" /> Preload Video?
		</p>
		
		<p>
		<input type="checkbox" tabindex="8" name="video_setup" id="video_setup" checked="checked"/> Setup Video Automatically? (Uncheck if the video is hidden on page load)
		</p>
		
		<p>
			<input class="button" type="submit" tabindex="9" value="Create Shortcodes" onclick="createShortcodes();">
		</p>
	</form>	
</body>
</html>