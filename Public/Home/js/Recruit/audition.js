function sendMessage(id){
	var message = "#sendmessage"+id;
	$(message).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(message).attr('_href'),
		data: {'id':id},
		dataType: 'json',
		success: function (jsonResult) {
		    if(jsonResult.status == 1){
		        alert(jsonResult.info);
		        window.location.href = window.location.href;
		    }else{
		        alert(jsonResult.info);
		        $(message).removeAttr('disabled');
		    }
		}
	});
}

function studentOut(id){
	var out = "#studentout"+id;
	$(out).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(out).attr('_href'),
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

function studentIn(id){
	var checkin = "#studentin"+id;
	$(checkin).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(checkin).attr('_href'),
		data: {'id':id},
		dataType: 'json',
		success: function (jsonResult) {
		    if(jsonResult.status == 1){
		        alert(jsonResult.info);
		        window.location.href = window.location.href;
		    }else{
		        alert(jsonResult.info);
		        $(checkin).removeAttr('disabled');
		    }
		}
	});
}

function studentLast(id){
	var lastrotation= "#lastrotation"+id;
	$(lastrotation).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(lastrotation).attr('_href'),
		data: {'id':id},
		dataType: 'json',
		success: function (jsonResult) {
		    if(jsonResult.status == 1){
		        alert(jsonResult.info);
		        window.location.href = window.location.href;
		    }else{
		        alert(jsonResult.info);
		        $(lastrotation).removeAttr('disabled');
		    }
		}
	});
}

function studentNext(id){
	var nextrotation= "#nextrotation"+id;
	$(nextrotation).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(nextrotation).attr('_href'),
		data: {'id':id},
		dataType: 'json',
		success: function (jsonResult) {
		    if(jsonResult.status == 1){
		        alert(jsonResult.info);
		        window.location.href = window.location.href;
		    }else{
		        alert(jsonResult.info);
		        $(nextrotation).removeAttr('disabled');
		    }
		}
	});
}

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

$(function (){
	$("#sendAllMessage").click(function (){
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
            alert("请选择要操作的人员");
        }
	});

	$("#allNextRotation").click(function (){
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
            alert("请选择要操作的人员");
        }
	});

	$("#allLastRotation").click(function (){
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
            alert("请选择要操作的人员");
        }
	});

	$("#allOut").click(function (){
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
            alert("请选择要操作的人员");
        }
	});

	$("#allIn").click(function (){
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
            alert("请选择要操作的人员");
        }
	});

	$("#changeAllTime").click(function (){
		if ($("input[name='id']:checked").length > 0) {
			$(this).attr('disabled','disabled');
			var nexturl = $(this).attr("_href");
			nexturl=nexturl.replace('.efan','');
            $.ajax({
                type: 'post',
                url: window.location.href,
                data: {'id': getAdminIds()},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 1) {
                        nexturl = nexturl+'/id/'+data.id+'.efan';
                        window.location.href = nexturl;
                    } else {
                        alert(data.info);
                        $(this).removeAttr('disabled');
                    }
                }
            })
        } else {
            alert("请选择要操作的人员");
        }
	});
});

