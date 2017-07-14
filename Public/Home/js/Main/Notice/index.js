// 获取复选框选中的值
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

function important(id)
{
	var btn = "#btnNoticeImportant" + id;
	$(btn).attr('disabled','disabled');
	$.ajax({
		type: 'post',
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
			},
		dataType: 'json',
		success: function (jsonResult){
			if (jsonResult.status == 1){
				alert(jsonResult.info);
				window.location.href = window.location.href;
			}else{
				alert(jsonResult.info);
				$(btn).removeAttr('disabled');
			}
		}
	})
}

function disimportant(id)
{
	var btn = "#btnNoticeDisImportant" + id;
	$(btn).attr('disabled','disabled');
	$.ajax({
		type: 'post',
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
			},
		dataType: 'json',
		success: function (jsonResult){
			if (jsonResult.status == 1){
				alert(jsonResult.info);
				window.location.href = window.location.href;
			}else{
				alert(jsonResult.info);
				$(btn).removeAttr('disabled');
			}
		}
	})
}

function noticeDelete(id)
{
	var btn = "#btnNoticeDelete" + id;
	$(btn).attr('disabled','disabled');
	$.ajax({
		type: 'post',
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
			},
		dataType: 'json',
		success: function (jsonResult){
			if (jsonResult.status == 1){
				alert(jsonResult.info);
				window.location.href = window.location.href;
			}else{
				alert(jsonResult.info);
				$(btn).removeAttr('disabled');
			}
		}
	})
}

$(function (){

	$("#btnAllNoticeImportant").click(function (){
		if ($("input[name='id']:checked").length > 0) {
			$(this).attr('disabled','disabled');
            $.ajax({
                type: 'post',
                url: $(this).attr("_href"),
                data: {
                		'id': getAdminIds(),
            			},
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

	$("#btnAllNoticeDisImportant").click(function (){
		if ($("input[name='id']:checked").length > 0) {
			$(this).attr('disabled','disabled');
            $.ajax({
                type: 'post',
                url: $(this).attr("_href"),
                data: {
                		'id': getAdminIds(),
            			},
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

	$("#btnAllNoticeDelete").click(function (){
		if ($("input[name='id']:checked").length > 0) {
			$(this).attr('disabled','disabled');
            $.ajax({
                type: 'post',
                url: $(this).attr("_href"),
                data: {
                		'id': getAdminIds(),
            			},
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
});