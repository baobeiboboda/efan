function showButton(id){
	var div = "#dbutton" + id;
	$(div).removeAttr('hidden');
}

function hiddenButton(id){
	var div = "#dbutton" + id;
	var textArea = "#discuss" + id;
	if($(textArea).val() == ""){
		$(div).attr('hidden','hidden');
	}
}

function discuss(id){
	var button = "#btndiscuss" + id;
	var textArea = "#discuss" + id;
	var form = "#discussForm" + id;
	$(button).attr('disabled','disabled');
	$.ajax({
		type: "POST",
	    url: $(button).attr('_href'),
	    data: $(form).serialize(),
	    dataType: 'json',
	    success: function (jsonResult) {
	        if(jsonResult.status == 1){
	            window.location.href = window.location.href;
	        }else{
	            alert(jsonResult.info);
	            $(button).removeAttr("disabled");
	        }
	    }
	});
}

$(function(){
	$("#btnreply").click(function (){
		if($('#reply').val()==""){
			alert('请输入回复内容');
			$('#reply').focus();
			return false;
		}
		// $(this).attr("disabled","disabled");
		$.ajax({
			type: "POST",
		    url: $("#btnreply").attr('_href'),
		    data: $("#submitReplyForm").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            window.history.back();
		        }else{
		            alert(jsonResult.info);
		            $("#btnsubmit").removeAttr("disabled");
		        }
		    }
		});
	});

	$("#btnreturn").click(function (){
		window.history.back();
	});
});

