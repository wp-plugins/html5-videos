=== Plugin Name ===
Contributors: powercat74
Donate link: 
Tags: videos, html5, media library
Requires at least: 2.0.1
Tested up to: 3.4.2
Stable tag: 1.0.2
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

*   This plugin relies on curl to get the javascript and css files from VideoJS.  You'll need to have curl installed on your server.  Instructions can be found [here](http://us2.php.net/manual/en/book.curl.php "Install Curl").
1.  Install it from the Plugins menu automatically or download the plugin from [here](http://wordpress.org/extend/plugins/html5-videos/ "Download HTML5 Videos") and upload it to the Plugins folder.
2.  Activate the plugin from the Plugins menu in Wordpress.
3.  Upload your HTML5-compatible videos into the Media Library.
4.  Embed them into your pages using the HTML5 Videos button in the editor.


== Frequently Asked Questions ==

**I get an error when uploading my videos to the library**

Wordpress has a file upload size limit of 2-8MB by default on most hosts.  This will probably need to be increased if you are uploading longer (or HD) videos.  Instructions on manually increasing the upload limit will vary by host.  You should contact your host for instructions, if [none of these options](http://codex.wordpress.org/FAQ_Working_with_WordPress#How_do_I_Import_a_WordPress_WXR_file_when_it_says_it_is_too_large_to_import.3F "Increase the File Upload Size") help you.

**I only want to upload a few of the video formats**

HTML5 Videos will only embed what you tell it to embed.  If you don't have a .webm (.mp4, .ogv) video, then it will not let you choose to embed one.  Current browser support for the video formats can be found [here](http://www.longtailvideo.com/html5 "Current Video Formats").

**I want to create my own shortcode**

The shortcode is generated automatically, but if you need to change anything, here is the shortcode format:

[video mp4 webm ogg poster width height preload autoplay setup]

The "video" element is required (that's what makes this work), but everything else is optional.  The mp4, webm, ogg and poster elements will be fully-qualified paths to the appropriate resource on your server (ie: http://somedomain.com/wp-content/uploads/bigbunny.mp4).  The preload should be set to "none", "metadata", or "auto".  Alternatively, you can specify "true" for "auto" or "false" for "none" and the autoplay attribute should be either "autoplay" or should be omitted entirely.  This is the way VideoJs requires these attributes to be set.

The "setup" attribute should be unchecked (or set to "manual") if you will be programmatically interacting with the videos after the DOM has loaded.  For instance, if you are using the video in a modal that is created after the page loads, then set this value to "manual".  See the [VideoJs API documentation](http://videojs.com/docs/api/ "VideoJs API Documentation") for instructions on how to interact with the video.  Each video on the page has a unique ID.  Inspect the page to get the ID for each video to be used in your API calls.

**How do I control the video via javascript?**

By default, the plugin sets up the necessary javascript to make the player work.  If you want to customize this (ie: you want to hide the video div on page load, and play the video in a popup modal sometime after page load), you must set the "setup" option to "Manual" (uncheck the "Automatically Setup Video" box), and then refer to the [VideoJs API page](http://videojs.com/docs/api/ "VideoJs API Documentation") for instructions on firing the video.  Each video you embed into the page will have a random unique ID.  You'll need to inspect the video element to get this ID.  Then you can reference the video id's to play the video.

== Screenshots ==

1. The HTML5 Videos plugin creates a new button in the Wordpress Editor to allow for easy embedding of Media Library videos.
2. Only videos that have HTML5 extensions (.webm, .mp4, .ogv) will be displayed in the select boxes.

== Changelog ==

= 1.0.2 =
* Added auto or manual setup to control videos via the VideoJs API
* Added shortcodes into documentation
* Added detection for remote css and js files - if they don't exist, load the local versions of the files
= 1.0.1 =
* Fixed some path name problems in some installations
= 1.0 =
* Initial Commit to Wordpress

== Upgrade Notice ==