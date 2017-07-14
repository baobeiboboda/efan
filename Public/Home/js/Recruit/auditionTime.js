$(function (){
	$("#btnsubmit").click(function (){
	    if($('#date').val()==""){
			$('#dauditiontime').addClass('has-error');
			$('#date').focus();
			return false;
		}else{
			$('#dauditiontime').removeClass('has-error');	
		}

		if($('#time').val()==""){
			$('#dauditiontime').addClass('has-error');
			$('#time').focus();
			return false;
		}else{
			$('#dauditiontime').removeClass('has-error');	
		}

		$(this).attr("disabled","disabled");

		$.ajax({
			type: "POST",
		    url: $("#btnsubmit").attr('_href'),
		    data: $("#auditionTimeForm").serialize(),
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
});