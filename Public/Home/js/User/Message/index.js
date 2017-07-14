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

	$("#btnSubmit").click(function (){
		if ($("input[name='id']:checked").length > 0) {
			if($("#message").val() == ''){
				$('#dmessage').addClass('has-error');
				$('#message').focus();
				return false;
			}else{
				$('#dmessage').removeClass('has-error');
			}
			$(this).attr('disabled','disabled');
            $.ajax({
                type: 'post',
                url: $(this).attr("_href"),
                data: {
                		'id': getAdminIds(),
            			'message' : $("#message").val(),
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