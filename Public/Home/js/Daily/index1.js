$(function(){
	$("#name").uploadify({
		'swf' : "{:PUBLIC_JS/uploadify/uploadify.swf}",
		'fileTypeExts' : '*.txt',
		'method' : 'post',
		'fileObjName' : 'download',
		'uploader' :"{$str = $Think.INDEX_PATH_NAME.$actions['TEAMDAILYLISTUPLOAD']['url'];:U($str,array('key'=>$actions['TEAMDAILYLISTUPLOAD']['key']))}"
		'removeTimeout' : 1,
	});
});