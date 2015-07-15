// to initilaise session iframe on reload		
$(document).ready(function () {
	var url = window.location.pathname;
		var parts = url.split("/");
		var uuid = (parts[parts.length - 1]);
	if(uuid){
		$.getJSON(window.location.origin+'/grab/' + uuid, function (result) {
			sessionStorage.setItem("html", result['hcode']);
			sessionStorage.setItem("css", result['ccode']);
			sessionStorage.setItem("js", unescape(result['jcode']));
			editor.getDoc().setValue(sessionStorage.getItem("html"));
			editor1.getDoc().setValue(sessionStorage.getItem("css"));
			editor2.getDoc().setValue(sessionStorage.getItem("js"));
		});
	}
	codepreview();
	$('#linkshare').html(window.location.href);
	document.getElementById('downloadlink').onclick = function (code) {
		if (!sessionStorage.getItem("css"))
			var css = " ";
		else
			var css = sessionStorage.getItem("css");
		if (!sessionStorage.getItem("js"))
			var js = " ";
		else
			var js = sessionStorage.getItem("js");
		if (!sessionStorage.getItem("html"))
			var html = " ";
		else
			var html = sessionStorage.getItem("html");
		this.href = 'data:text/html;charset=utf-8,' + encodeURIComponent("<!DOCTYPE html>\n<html>\n<head>\n<style>\n" + css + "\n</style>\n<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>\n<script>\n" + js + "\n</script>\n</head>\n<body>\n" + html + "\n</body>\n</html>");
	};
	var editor = CodeMirror.fromTextArea(html, {
		lineNumbers: true,
		mode: "htmlmixed",
		theme: "3024-night",
		lineWrapping: true,
		matchTags: {
			bothTags: true
		},
		autoCloseTags: true,
	});
	if (!sessionStorage.getItem("html"))
		editor.getDoc().setValue("");
	else
		editor.getDoc().setValue(sessionStorage.getItem("html"));
	editor.on('change', function () {
		var html = editor.getValue();
		codepush(html);
	});
	var editor1 = CodeMirror.fromTextArea(css, {
		lineNumbers: true,
		mode: "css",
		theme: "3024-night",
		lineWrapping: true,
		matchTags: {
			bothTags: true
		},
		autoCloseTags: true,
		gutters: ["CodeMirror-lint-markers"],
		lint: true
	});
	if (!sessionStorage.getItem("css"))
		editor1.getDoc().setValue("");
	else
		editor1.getDoc().setValue(sessionStorage.getItem("css"));
	editor1.on('change', function () {
		var css = editor1.getValue();
		codepush1(css);
	});
	var editor2 = CodeMirror.fromTextArea(js, {
		lineNumbers: true,
		mode: "javascript",
		theme: "3024-night",
		lineWrapping: true,
		matchTags: {
			bothTags: true
		},
		autoCloseTags: true,
		gutters: ["CodeMirror-lint-markers"],
		lint: true
	});
	if (!sessionStorage.getItem("js"))
		editor2.getDoc().setValue("");
	else
		editor2.getDoc().setValue(sessionStorage.getItem("js"));
	editor2.on('change', function () {
		var js = editor2.getValue();
		codepush2(js);
	});
	$('body').layout({
		applyDefaultStyles: false,
		resizable: true,
		north__resizable: false,
		north__closable: false,
		closable: true,
		livePaneResizing: true,
		east__size: .33,
		center__size: .33,
		west__size: .33,
		south__size: 300,
		north__size: 50
	});
});

function codepush(code) {
	sessionStorage.setItem("html", code);
	codepreview();
}

function codepush1(code) {
	sessionStorage.setItem("css", code);
	codepreview();
}

function codepush2(code) {
	sessionStorage.setItem("js", code);
	codepreview();
}


function codepreview() {
	if (!sessionStorage.getItem("css"))
		var css = " ";
<<<<<<< HEAD
	else {
=======
	else
>>>>>>> origin/master
		var css = sessionStorage.getItem("css");
		$('#fc').val(css);
	}
	if (!sessionStorage.getItem("js"))
		var js = " ";
	else {
		var js = sessionStorage.getItem("js");
		$('#fj').val(js);
	}
	if (!sessionStorage.getItem("html"))
		var html = " ";
	else {
		var html = sessionStorage.getItem("html");
		$('#fh').val(html);
	}
	var ifrm = document.getElementById('preview');
	ifrm = (ifrm.contentWindow) ? ifrm.contentWindow : (ifrm.contentDocument.document) ? ifrm.contentDocument.document : ifrm.contentDocument;
	ifrm.document.open();
	ifrm.document.write("<!DOCTYPE html><html><head><style>" + css + "</style><script src='https://code.jquery.com/jquery-2.1.4.min.js'></script><script>" + js + "</script></head><body>" + html + "</body></html>");
	ifrm.document.close();
}
