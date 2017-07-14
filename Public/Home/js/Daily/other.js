$(function(){
	$("#btnsubmit").click(function (){
		if($('#info').val()==""){
			$('#dinfo').addClass('has-error');
			$('#info').focus();
			return false;
		}else{
			$('#dinfo').removeClass('has-error');	
		}
		alert($("#btnsubmit").attr('_href'));
		$(this).attr("disabled","disabled");
		$.ajax({
			type: "POST",
		    url: $("#btnsubmit").attr('_href'),
		    data: $("#formOtherSubmit").serialize(),
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