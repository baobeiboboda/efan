$(function (){
	$("#allOpen").click(function (){
		if ($("input[name='id']:checked").length > 0) {
			$(this).attr('disabled','disabled');
            $.ajax({
                type: 'post',
                url: $(this).attr("_href"),
                data: {'id': getAdminIds()},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        alert(data.info);
                        window.location.href = window.location.href;
                    } else {
                        alert(data.info);
                        $(this).removeAttr('disabled');
                    }
                }
            })
        } else {
            alert("请选择要操作的创意");
        }
	});

	$("#allClose").click(function (){
		if ($("input[name='id']:checked").length > 0) {
			$(this).attr('disabled','disabled');
            $.ajax({
                type: 'post',
                url: $(this).attr("_href"),
                data: {'id': getAdminIds()},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        alert(data.info);
                        window.location.href = window.location.href;
                    } else {
                        alert(data.info);
                        $(this).removeAttr('disabled');
                    }
                }
            })
        } else {
            alert("请选择要操作的创意");
        }
	});

	$("#allDelete").click(function (){
		if ($("input[name='id']:checked").length > 0) {
			// $(this).attr('disabled','disabled');
            $.ajax({
                type: 'post',
                url: $(this).attr("_href"),
                data: {'id': getAdminIds()},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        alert(data.info);
                        window.location.href = window.location.href;
                    } else {
                        alert(data.info);
                        $(this).removeAttr('disabled');
                    }
                }
            })
        } else {
            alert("请选择要操作的创意");
        }
	});

});

$(function() {
	$("#checkall").click(function() {
		var ids = $("input[name='id']");
		for(var i = 0;i < ids.length;i++){             
			if($("#checkall").is(':checked') == true){
				ids[i].checked = true;
			}else{
				ids[i].checked = false;
			}
		}
	});
	var $id = $("input[name='id']");
	$id.click(function(){
		$("#checkall").attr("checked",$id.length == $("input[name='id']:checked").length ? true : false);
	});
});

function getAdminIds() {
    var adminIds = '';
    $("input[name='id']:checked").each(function () {
        if (adminIds == '') {
            adminIds = $(this).val();
        } else {
            adminIds = adminIds + ',' + $(this).val();
        }
    });
    return adminIds;
}

function creativeOpen(id){
	var open = "#creativeOpen"+id;
	$(open).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(open).attr('_href'),
		data: {'id':id},
		dataType: 'json',
		success: function (jsonResult) {
		    if(jsonResult.status == 1){
		        alert(jsonResult.info);
		        window.location.href = window.location.href;
		    }else{
		        alert(jsonResult.info);
		        $(out).removeAttr('disabled');
		    }
		}
	});
}

function creativeClose(id){
	var close = "#creativeClose"+id;
	$(close).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(close).attr('_href'),
		data: {'id':id},
		dataType: 'json',
		success: function (jsonResult) {
		    if(jsonResult.status == 1){
		        alert(jsonResult.info);
		        window.location.href = window.location.href;
		    }else{
		        alert(jsonResult.info);
		        $(out).removeAttr('disabled');
		    }
		}
	});
}

function creativeDelete(id){
	var singledelete = "#creativeDelete"+id;
	alert(singledelete);
	alert($(singledelete).attr('_href'));
	// $(singledelete).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(singledelete).attr('_href'),
		data: {'id':id},
		dataType: 'json',
		success: function (jsonResult) {
		    if(jsonResult.status == 1){
		        alert(jsonResult.info);
		        window.location.href = window.location.href;
		    }else{
		        alert(jsonResult.info);
		        $(out).removeAttr('disabled');
		    }
		}
	});
}