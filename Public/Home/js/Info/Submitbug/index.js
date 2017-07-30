$(function (){
	$("#btnSubmit").click(function (){
	    if($('#title').val()==""){
			$('#dtitle').addClass('has-error');
			$('#title').focus();
			return false;
		}else{
			$('#dtitle').removeClass('has-error');	
			}

	    if($('#info').val()==""){
			$('#dinfo').addClass('has-error');
			$('#info').focus();
			return false;
		}else{
			$('#dinfo').removeClass('has-error');	
		}

		$(this).attr("disabled","disabled");

		$.ajax({
			type: "POST",
		    url: $("#btnSubmit").attr('_href'),
		    data: $("#submitBugForm").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            window.location.reload();
		        }else{
		            alert(jsonResult.info);
		            $("#btnNewUser").removeAttr("disabled");
		        }
		    }
		});
	});
});