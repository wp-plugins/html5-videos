function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function isNumber(n) {
	if(!isNaN(parseFloat(n.value)) && isFinite(n.value) ) {
		n.value = n.value;
	} else {
		alert('Please enter a valid number');
		if(n.id == 'video_height') {
			n.value = '240';
		} else if(n.id == 'video_width') {
			n.value = '320';
		}
		
		n.focus();
	}
}


function createShortcodes() {
	
	var str, mp4, ogg, webm, poster, width, height, preload, autoplay;
	
	var mp4 = document.getElementById('mp4').value;
	var ogg = document.getElementById('ogg').value;
	var webm = document.getElementById('webm').value;
	var poster = document.getElementById('poster').value;
	
	var width = document.getElementById('video_width').value;
	var height = document.getElementById('video_height').value;
	var autoplay = document.getElementById('video_autoplay').checked;
	var preload = document.getElementById('video_preload').checked;
	
	
	if (mp4 != 'none') {
		mp4 = 'mp4="' + mp4 + '"';
	} else {
		mp4 = '';
	}
	
	if(ogg != 'none') {
		ogg = ' ogg="' + ogg + '"';
	} else {
		ogg = '';
	}
	
	if(webm != 'none'){
		webm = ' webm="' + webm + '"';
	} else {
		webm = '';
	}
	
	if(poster != 'none') {
		poster = ' poster="' + poster + '"';
	} else {
		poster = '';
	}
	
	if(width != '') {
		width = ' width="' + width + '"';
	} else {
		width = '';
	}
	
	if(height != '') {
		height = ' height="' + height + '"';
	} else {
		height = '';
	}
	
	if(autoplay != '') {
		autoplay = ' autoplay="true"';
	}else {
		autoplay = ' autoplay="false"';
	}

	if(preload != '') {
		preload = ' preload="true"';
	} else {
		preload = ' preload="false"';
	}
	
	
	
	if(mp4 != 'none' || ogg != 'none' || webm != 'none' ) {
		str = '[video ' + mp4 + ogg + webm + poster + width + height + autoplay + preload + ']';
	} else {
		tinyMCEPopup.close();
	}	
	
	if(window.tinyMCE) {
        window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.id, 'mceInsertContent', false, str);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}