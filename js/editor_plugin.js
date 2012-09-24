
(function() {
    tinymce.create('tinymce.plugins.html5Video', {
        
        
        init : function(ed, url) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');

			ed.addCommand('mcehtml5Video', function() {
				ed.windowManager.open({
					file : url + '/html5_window.php',
					width : 500 + ed.getLang('html5Video.delta_width', 0),
					height : 500 + ed.getLang('html5Video.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});

			// Register example button
			ed.addButton('html5Video', {
				title : 'Embed Video from Media Library',
				cmd : 'mcehtml5Video',
				image : url + '/img/html5.png'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('html5Video', n.nodeName == 'IMG');
			});
		},
		
		
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "HTML5 Video Shortcodes Creator",
                author : 'Dustin Hayes',
                authorurl : 'http://cremalab.com/',
                infourl : 'http://cremalab.com/',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('html5Video', tinymce.plugins.html5Video);
})();