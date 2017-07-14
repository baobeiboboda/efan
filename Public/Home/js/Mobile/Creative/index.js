$(function(){
	$("#btnsubmit").click(function (){
		if($('#title').val()==""){
			$('#dtitle').addClass('has-error');
			$('#title').focus();
			return false;
		}else{
			$('#dtitle').removeClass('has-error');	
		}
		if($('#group').val()=="0"){
			$('#dgroup').addClass('has-error');
			$('#group').focus();
			return false;
		}else{
			$('#dgroup').removeClass('has-error');	
		}
		$(this).attr("disabled","disabled");
		$.ajax({
			type: "POST",
		    url: $("#btnsubmit").attr('_href'),
		    data: $("#submitActiveForm").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            $("#btnsubmit").removeAttr("disabled");
		            window.history.back();
		        }else{
		            alert(jsonResult.info);
		            $("#btnsubmit").removeAttr("disabled");
		        }
		    }
		});
	});
});