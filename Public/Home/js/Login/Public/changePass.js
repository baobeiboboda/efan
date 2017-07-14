var pass = /^(?![0-9a-z]+$)(?![0-9A-Z]+$)(?![0-9\W]+$)(?![a-z\W]+$)(?![a-zA-Z]+$)(?![A-Z\W]+$)[a-zA-Z0-9\W_]{8,}$/;
$(function(){
	$("#btnsubmit").click(function (){
		
		if($('#password').val()=="" || !pass.test($("#password").val())){
			alert('密码必须包含大写字母、小写字母、数字、特殊字符中的三个切不少于8位！');
			$('#dpassword').addClass('has-error');
			$('#password').focus();
			return false;
		}else{
			$('#dpassword').removeClass('has-error');	
		}
		if($('#password').val() != $('#repassword').val()){
			alert('两次密码不一致！');
			return false;
		}
		$(this).attr("disabled","disabled");
		$.ajax({
			type: "POST",
		    url: $("#btnsubmit").attr('_href'),
		    data: $("#changePassFirstForm").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		        	alert(jsonResult.info);
		            window.location.href = document.referrer;
		        }else{
		            alert(jsonResult.info);
		            if(jsonResult.url != null){
		            	window.location.href = jsonResult.url;
		            }
		            $("#btnSubmit").removeAttr("disabled");

		        }
		    }
		});
	});
});

function testPass()
{	
	if (!pass.test($("#password").val())){
		alert('密码必须包含大写字母、小写字母、数字、特殊字符中的三个切不少于8位！');
		$('#dpassword').addClass('has-error');
	}else{
		$('#dpassword').removeClass('has-error');	
	}
}

function passAndRepass(){
	if($('#password').val() != $('#repassword').val()){
		alert('两次密码不一致！');
		$('#drepassword').addClass('has-error');
	}else{
		$('#dpassword').removeClass('has-error');	
	}
}
