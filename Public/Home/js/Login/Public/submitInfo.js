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
		    data: $("#submitInfoForm").serialize(),
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

function findMajor()
{
	var collegeId = $("#college").val();
	$("#classFront").html('');
	$.ajax({
		type: 'POST',
		data:{
			'cid' : collegeId,
		},
		url: $("#college").attr('_href'),
		dataType: 'json',
		success: function(jsonResult) {
			if(jsonResult.status == 1){
				$("#major").empty();
				$("#major").append("<option value=0>请选择专业</option>"); 
				$(jsonResult.data).each(function (){
					$("#major").append("<option value=" + this.id +">"+ this.title +"</option>");
				});
			}else{
				alert(2);
			}
		}
	});
}

function findClass()
{
	var majorId = $("#major").val();
	$.ajax({
		type: 'post',
		data: {
			'id' : majorId,
		},
		url: $("#major").attr('_href'),
		dataType: 'json',
		success: function(jsonResult) {
			if(jsonResult.status == 1){
				if(jsonResult.data == ''){
					alert('班级无结果，请参照学生卡手动输入并联系系统管理员添加，如果错误联系系统管理员修改班级信息');
				}
				$("#classFront").html(jsonResult.data);
			}else{
				alert('请参照学生卡手动输入班级');
			}
		}
	});
}

$(function () {
	$("#btnsubmit").click(function () {
	    var vxh = /^[0-9]{9,11}$/;
	    var vdh = /^1[3|4|5|8][0-9]\d{4,8}$/;
	    var vyx = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
	    var vqq = /^\d{5,11}$/;
	    var vidcard = /^(\d{15}$|^\d{18}$|^\d{17}(\d|X))$/;
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

	    if($('#IDcard').val()=="" || !vidcard.test($("#IDcard").val())){
			$('#dIDcard').addClass('has-error');
			$('#IDcard').focus();
			return false;
		}else{
			$('#dIDcard').removeClass('has-error');	
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

		if($('#wechat').val()==""){
			$('#dwechat').addClass('has-error');
			$('#wechat').focus();
			return false;
		}else{
			$('#dwechat').removeClass('has-error');	
		}
		$.ajax({
			type: "POST",
		    url: $("#btnsubmit").attr('_href'),
		    data: $("#submitInfoForm").serialize() + '&classFront=' + $("#classFront").html(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            window.location.href = document.referrer;
		        }else{
		            alert(jsonResult.info);
		        }
		    }
		});
	});
});
