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
		// $(this).attr("disabled","disabled");
		$.ajax({
			type: "POST",
		    url: $("#btnsubmit").attr('_href'),
		    data: $("#editActiveForm").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            $("#btnsubmit").removeAttr("disabled");
		            // window.history.back();
		            self.location=document.referrer;
		        }else{
		            alert(jsonResult.info);
		            $("#btnsubmit").removeAttr("disabled");
		        }
		    }
		});
	});

	$("#btngoback").click(function (){
		self.location=document.referrer;
	});
});

function findUID()
{
	if($("#name").val() == ''){
		$("#dname").addClass('has-error');
		$("#name").focus();
		return false;
	}else{
		$("#dname").removeClass('has-error');
	}
	$.ajax({
		type: 'POST',
		url: $("#name").attr('_href'),
		data: {
			'name' : $("#name").val(),
		},
		dataType: 'json',
		success: function (jsonResult) {
			if(jsonResult.status == 1){
				$("#uid").val(jsonResult.uid);
			}else{
				alert(jsonResult.info);
			}
		}
	});
}