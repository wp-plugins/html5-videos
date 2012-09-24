=== Plugin Name ===
Contributors: powercat74
Donate link: 
Tags: videos, html5, media library
Requires at least: 2.0.1
Tested up to: 3.4.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily embed HTML5 videos from the Media Library into posts and pages.

== Description ==

### Embed HTML5 Videos from the Media Library

Make your media managers happy with this simple Wordpress plugin from [Cremalab](href="http://cremalab.com/ "Cremalab Makes Awesome Experiences").  No longer will you (or they) need to rely on Vimeo, Youtube or any pricey video hosting service to deliver videos to your audience.  Simply upload the correct HTML5 videos to your Media Library, then embed them into your pages easily using the Wordpress editor.  This plugin is different from other similar plugins because this writes the shortcodes for you!

This small plugin seeks to fulfill these three major needs:
  1.  Embed videos from the Media Library without relying on a third-party hosting service
  2.  Embed the videos using HTML5 video tags with a Flash fallback for older browsers
  3.  Make it easy - no need to write long short codes

This plugin is built on the [videojs](http://videojs.com/) javascript library which detects browser capability and provides flash fallback for older browsers and to provide the controls styling.  All current browsers and most mobile browsers already support HTML5 video tags, so they will receive native HTML videos without any third-party plugins.  Browsers that do not support HTML5 videos will be shown a Flash version.

### How Does it Work?

In three steps, you can be hosting your own videos:
  1.  Convert your videos to HTML5 formats (we like the [Miro Video Converter](http://www.mirovideoconverter.com/ "Miro Video Converter") for this job).
  2.  Upload all three formats to your Media Libary in Wordpress
  3.  Embed the videos using the HTML5 Videos plugin

Most other plugins make you write your the shortcode to embed the video.  HTML5 Videos makes this easier by allowing you to select the videos from the Media Library, set some options, and then insert the shortcode.



== Installation ==

  1.  Install it from the Plugins menu automatically or download the plugin from here and upload it to the Plugins folder.
	2.  Activate the plugin from the Plugins menu in Wordpress.
	3.  Upload your HTML5-compatible videos into the Media Library.
	4.  Embed them into your pages using the HTML5 Videos button in the editor.


== Frequently Asked Questions ==

##### I get an error when uploading my videos to the library
Wordpress has a file upload size limit of 2-8MB by default on most hosts.  This will probably need to be increased if you are uploading longer (or HD) videos.  Instructions on manually increasing the upload limit will vary by host.  You should contact your host for instructions, if [none of these options](http://codex.wordpress.org/FAQ_Working_with_WordPress#How_do_I_Import_a_WordPress_WXR_file_when_it_says_it_is_too_large_to_import.3F "Increase the File Upload Size") help you.

##### I only want to upload a few of the video formats
HTML5 Videos will only embed what you tell it to embed.  If you don't have a .webm (.mp4, .ogv) video, then it will not let you choose to embed one.  Current browser support for the video formats can be found [here](http://www.longtailvideo.com/html5 "Current Video Formats").

== Screenshots ==

1. The HTML5 Videos plugin creates a new button in the Wordpress Editor to allow for easy embedding of Media Library videos.
2. Only videos that have HTML5 extensions (.webm, .mp4, .ogv) will be displayed in the select boxes.

== Changelog ==

= 1.0 =
* Initial Commit to Wordpress

== Upgrade Notice ==