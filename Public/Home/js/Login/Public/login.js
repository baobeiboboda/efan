$(function(){
	$("#btnSubmit").click(function (){
		if($('#username').val()==""){
			$('#dusername').addClass('has-error');
			$('#username').focus();
			return false;
		}else{
			$('#dusername').removeClass('has-error');	
		}

		if($('#passwd').val()==""){
			$('#dpasswd').addClass('has-error');
			$('#passwd').focus();
			return false;
		}else{
			$('#dpasswd').removeClass('has-error');	
		}

		if($('#code').val()==""){
			$('#dcode').addClass('has-error');
			$('#code').focus();
			return false;
		}else{
			$('#dcode').removeClass('has-error');	
		}
		$(this).attr("disabled","disablsed");
		$.ajax({
			type: "POST",
		    url: $("#btnSubmit").attr('_href'),
		    data: $("#login").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            window.location.href = jsonResult.url;
		        }else{
		            alert(jsonResult.info);
		            if(jsonResult.url != null){
		            	window.location.href = jsonResult.url;
		            }else{
		            	window.location.href = window.location.href;
		            }
		            $("#btnSubmit").removeAttr("disabled");

		        }
		    }
		});
	});
});