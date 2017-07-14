$(function(){
	$("#btnTeamDailyListMake").click(function (){
		// $(this).attr("disabled","disabled");
		$.ajax({
			type: "POST",
		    url: $("#btnTeamDailyListMake").attr('_href'),
		    data: '',
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            $("#btnTeamDailyListMake").removeAttr("disabled");
		        }else{
		            alert(jsonResult.info);
		            $("#btnTeamDailyListMake").removeAttr("disabled");
		        }
		    }
		});
	});
});