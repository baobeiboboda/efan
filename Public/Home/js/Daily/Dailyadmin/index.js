$(function(){
	$("#btnTeamDailyAdminMake").click(function (){
		// $(this).attr("disabled","disabled");
		$.ajax({
			type: "POST",
		    url: $("#btnTeamDailyAdminMake").attr('_href'),
		    data: '',
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            $("#btnTeamDailyAdminMake").removeAttr("disabled");
		        }else{
		            alert(jsonResult.info);
		            $("#btnTeamDailyAdminMake").removeAttr("disabled");
		        }
		    }
		});
	});
});