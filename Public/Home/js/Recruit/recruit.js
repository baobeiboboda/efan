$(function () {
	$("#btnstudent").click(function () {
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
		$.ajax({
			type: "POST",
		    url: $("#btnstudent").attr('_href'),
		    data: $("#viewRecruit").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		        	$("#id").val(jsonResult.date.id);
		        	$("#name").val(jsonResult.date.name);
		            $("#phone").val(jsonResult.date.phone);
		            $("#college").val(jsonResult.date.college);
		            $("#major").val(jsonResult.date.major);
		            $("#class").val(jsonResult.date.class);
		            $("#birth").val(jsonResult.date.birthday);
		            $("#qq").val(jsonResult.date.qq);
		            $("#email").val(jsonResult.date.email);
		            $("#introduce").val(jsonResult.date.introduce);
		        }else{
		            alert(jsonResult.info);
		        }
		    }
		});
	});
});

$(function () {
	$("#btnchangephone").click(function () {
	    var vxh = /^[0-9]{9,11}$/;
	    var vdh = /^1[3|4|5|8][0-9]\d{4,8}$/;
	    var vyx = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
	    var vqq = /^\d{5,11}$/;
	    if($('#phone').val()=="" || !vdh.test($("#phone").val())){
			$('#dphone').addClass('has-error');
			$('#phone').focus();
			return false;
		}else{
			$('#dphone').removeClass('has-error');	
			}
		$.ajax({
			type: "POST",
		    url: $("#btnchangephone").attr('_href'),
		    data: $("#viewRecruit").serialize(),
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		        	alert(jsonResult.info);
		        }else{
		            alert(jsonResult.info);
		        }
		    }
		});
	});
});