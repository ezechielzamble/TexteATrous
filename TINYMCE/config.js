tinyMCE.init({
// General options
mode : "exact",
elements : "text",
theme : "advanced",
width : "800",
height : "400",
language : "fr",
plugins : "safari,pagebreak,layer,table,advlink,insertdatetime,preview,print,"+
          "contextmenu,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,inlinepopups",
// Theme options
theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchorcleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor,|,print,|,fullscreen",
theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,|,sub,sup,charmap",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
content_css : "TINYMCE/css/word.css"
});
