$(function(){
	$("#btnsubmit").click(function (){
		if($('#title').val()==""){
			$('#dtitle').addClass('has-error');
			$('#title').focus();
			return false;
		}else{
			$('#dtitle').removeClass('has-error');	
		}
		$(this).attr("disabled","disabled");
		$.ajax({
			type: "POST",
		    url: $("#btnsubmit").attr('_href'),
		    data: $("#submitNoticeForm").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            $("#btnsubmit").removeAttr("disabled");
		            self.location=document.referrer;
		        }else{
		            alert(jsonResult.info);
		            $("#btnsubmit").removeAttr("disabled");
		        }
		    }
		});
	});
});