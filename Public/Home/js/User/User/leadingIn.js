$(function (){
	$("#btnSubmit").click(function (){
		$(this).attr("dissabled","disabled");
		var formData = new FormData($("#newUserExcelForm")[0]);
		$.ajax({
			type: "POST",
		    url: $("#btnSubmit").attr('_href'),
		    data: formData,
		    async: false,  
	        cache: false,  
	        contentType: false,  
	        processData: false,
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            window.location.href = document.referrer;
		        }else{
		            alert(jsonResult.info);
		            $("#btnNewUser").removeAttr("disabled");
		        }
		    }
		});
	});
});