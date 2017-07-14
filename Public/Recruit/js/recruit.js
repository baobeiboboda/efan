$(function () {
    $("#btncode").click(function () {
	    //执行获取验证码的操作
	    var tel = $('#phone').val();
	    var vxh = /^[0-9]{9,11}$/;
	    var vdh = /^1[3|4|5|8][0-9]\d{4,8}$/;
	    if($('#student_ID').val()=="" || !vxh.test($("#student_ID").val())){
			$('#dstudent_ID').addClass('has-error');
			$('#student_ID').focus();
			return false;
		}else{
			$('#dstudent_ID').removeClass('has-error');	
			}

	    if($('#name').val()==""){
			$('#dname').addClass('has-error');
			$('#name').focus();
			return false;
		}else{
			$('#dname').removeClass('has-error');	
		}

		if($('#phone').val()=="" || !vdh.test($("#phone").val())){
			$('#dphone').addClass('has-error');
			$('#phone').focus();
			return false;
		}else{
			$('#dphone').removeClass('has-error');	
		}
		$.ajax({
			type: "POST",
		    url: $("#btncode").attr('_href'),
		    data: $("#addRecruitForm").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            GetNumber();
		            alert(jsonResult.info);
		        }else{
		            alert(jsonResult.info);
		        }
		    }
		});   
    });
});

var count = 30;
function GetNumber() {
    $("#btncode").attr("disabled", "disabled");
    if($("#phone").attr("readonly") != true){
    $("#phone").attr("readonly", "readonly");
    }
    $("#btncode").val(count + "秒之后点击获取")
    count--;
    if (count > 0) {
        setTimeout(GetNumber, 1000);
    }
    else {
        $("#btncode").val("获取验证码");
        $("#btncode").removeAttr("disabled");
    }
}

$(function () {
	$("#btnsubmit").click(function () {
	    var vxh = /^[0-9]{9,11}$/;
	    var vdh = /^1[3|4|5|8][0-9]\d{4,8}$/;
	    var vyx = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
	    var vqq = /^\d{5,11}$/;
	    if($('#student_ID').val()=="" || !vxh.test($("#student_ID").val())){
			$('#dstudent_ID').addClass('has-error');
			$('#student_ID').focus();
			return false;
		}else{
			$('#dstudent_ID').removeClass('has-error');	
			}

	    if($('#name').val()==""){
			$('#dname').addClass('has-error');
			$('#name').focus();
			return false;
		}else{
			$('#dname').removeClass('has-error');	
		}

		if($('#phone').val()=="" || !vdh.test($("#phone").val())){
			$('#dphone').addClass('has-error');
			$('#phone').focus();
			return false;
		}else{
			$('#dphone').removeClass('has-error');	
		}

		if($('#code').val()==""){
			$('#dcode').addClass('has-error');
			$('#code').focus();
			return false;
		}else{
			$('#dcode').removeClass('has-error');	
			}

	    if($('#college').val()==""){
			$('#dcollege').addClass('has-error');
			$('#college').focus();
			return false;
		}else{
			$('#dcollege').removeClass('has-error');	
		}

		if($('#major').val()==""){
			$('#dmajor').addClass('has-error');
			$('#major').focus();
			return false;
		}else{
			$('#dmajor').removeClass('has-error');	
		}

		if($('#class').val()==""){
			$('#dclass').addClass('has-error');
			$('#class').focus();
			return false;
		}else{
			$('#dclass').removeClass('has-error');	
		}

	    if($('#birth').val()==""){
			$('#dbirth').addClass('has-error');
			$('#birth').focus();
			return false;
		}else{
			$('#dbirth').removeClass('has-error');	
		}

		if($('#qq').val()=="" || !vqq.test($("#qq").val())){
			$('#dqq').addClass('has-error');
			$('#qq').focus();
			return false;
		}else{
			$('#dqq').removeClass('has-error');	
		}

		if($('#email').val()=="" || !vyx.test($("#email").val())){
			$('#demail').addClass('has-error');
			$('#email').focus();
			return false;
		}else{
			$('#demail').removeClass('has-error');	
		}

		$.ajax({
			type: "POST",
		    url: $("#btnsubmit").attr('_href'),
		    data: $("#addRecruitForm").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            GetNumber();
		            alert(jsonResult.info);
		            window.location.href = window.location.href;
		        }else{
		            alert(jsonResult.info);
		        }
		    }
		});
	});
});
