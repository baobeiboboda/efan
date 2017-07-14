$(function (){
	// 新建用户ajax提交表单
	$("#btnNewUser").click(function (){
		var vuid = /^[0-9]{2,3}$/;
	    if($('#uid').val()=="" || !vuid.test($("#uid").val())){
			$('#duid').addClass('has-error');
			$('#uid').focus();
			return false;
		}else{
			$('#duid').removeClass('has-error');	
			}

	    if($('#name').val()==""){
			$('#dname').addClass('has-error');
			$('#name').focus();
			return false;
		}else{
			$('#dname').removeClass('has-error');	
		}

		$(this).attr("disabled","disabled");

		$.ajax({
			type: "POST",
		    url: $("#btnNewUser").attr('_href'),
		    data: {
		    	'uid' : $("#uid").val(),
		    	'name' : $("#name").val(),
		    },
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            window.location.reload();
		        }else{
		            alert(jsonResult.info);
		            $("#btnNewUser").removeAttr("disabled");
		        }
		    }
		});
	});

	// 修改权限ajax提交表单
	$("#btnChangePermision").click(function (){
		if($('#permision').val()== 0){
			$('#dpermision').addClass('has-error');
			$('#permision').focus();
			return false;
		}else{
			$('#dpermision').removeClass('has-error');	
		}
		$("#btnChangePermision").attr('disabled','disabled')
		$.ajax({
			type: "POST",
		    url: $("#btnChangePermision").attr('_href'),
		    data: {
		    	'id' : $("#permisionUserId").val(),
		    	'permision' : $("#permision").val(),
		    },
		    dataType: 'json',
		    success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            window.location.reload();
		        }else{
		            alert(jsonResult.info);
		            $("#btnChangePermision").removeAttr("disabled");
		        }
		    }
		});
	});

	// 修改、新建临时权限ajax提交表单
	$("#btnEditAndChangeInterimPermision").click(function (){
		if($('#interimPermisionSelect').val()==0){
			$('#dinterimPermisionSelect').addClass('has-error');
			$('#interimPermisionSelect').focus();
			return false;
		}else{
			$('#dinterimPermisionSelect').removeClass('has-error');	
		}
		if($('#stopDate').val()==""){
			$('#dstopDate').addClass('has-error');
			$('#stopDate').focus();
			return false;
		}else{
			$('#dstopDate').removeClass('has-error');	
		}
		$("btnEditAndChangeInterimPermision").attr('disabled','disabled');
		$.ajax({
			type: "POST",
			url: $("#btnEditAndChangeInterimPermision").attr('_href'),
			data: {
				'hiddenId' : $("#hiddenId").val(),
				'id' : $("#interimPermisionId").val(),
				'interimPermision' : $("#interimPermisionSelect").val(),
				'stopDate' :$("#stopDate").val(),
			},
			dataType: "json",
			success: function (jsonResult) {
		        if(jsonResult.status == 1){
		            alert(jsonResult.info);
		            window.location.reload();
		        }else{
		            alert(jsonResult.info);
		            $("btnEditAndChangeInterimPermision").removeAttr('disabled');
		        }
		    }
		});
	});
});

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

// 单条解除限制登录
function disLimit(id)
{
	var btn = "#disLimit" + id;
	$(btn).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
		},
		dataType: 'json',
		success: function (jsonResult) {
	        if(jsonResult.status == 1){
	            alert(jsonResult.info);
	            window.location.reload();
	        }else{
	            alert(jsonResult.info);
	            $("#btnNewUser").removeAttr("disabled");
	        }
	    }
	});
}

// 单条限制登录
function limit(id)
{
	var btn = "#limit" + id;
	$(btn).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
		},
		dataType: 'json',
		success: function (jsonResult) {
	        if(jsonResult.status == 1){
	            alert(jsonResult.info);
	            window.location.reload();
	        }else{
	            alert(jsonResult.info);
	            $("#btnNewUser").removeAttr("disabled");
	        }
	    }
	});
}

// 单条重置密码
function resetPass(id)
{
	var btn = "#resetPass" + id;
	$(btn).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
		},
		dataType: 'json',
		success: function (jsonResult) {
	        if(jsonResult.status == 1){
	            alert(jsonResult.info);
	            window.location.reload();
	        }else{
	            alert(jsonResult.info);
	            $("#btnNewUser").removeAttr("disabled");
	        }
	    }
	});
}
// 逐条删除用户
function deleteUser(id)
{
	var btn = "#deleteUser" + id;
	$(btn).attr('disabled','disabled');
	$.ajax({
		type: "POST",
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
		},
		dataType: 'json',
		success: function (jsonResult) {
	        if(jsonResult.status == 1){
	            alert(jsonResult.info);
	            window.location.reload();
	        }else{
	            alert(jsonResult.info);
	            $("#btnNewUser").removeAttr("disabled");
	        }
	    }
	});
}

// 批量修改权限弹出框
function changeAllPermision()
{
	if ($("input[name='id']:checked").length > 0) {
		$('#permisionUserId').val(getAdminIds());
		jQuery('#changePermision').modal('show', {backdrop: 'static'});
	} else {
		alert('请选择要操作的人员');
	}
}

// 逐条修改权限
function changePermision(id)
{
	$('#permisionUserId').val(id);
	jQuery('#changePermision').modal('show', {backdrop: 'static'});
}

// 临时权限列表获取并弹窗显示
function changeInterimPermision(id)
{
	$("#interimPermision").empty();
	$("#hiddenId").val(id);
	var btn = "#changeInterimPermision" + id;
	$.ajax({
		type: "POST",
	    url: $(btn).attr('_href'),
		data: {
	    	'id' : id,
	    },
	    dataType: 'json',
	    success: function (jsonResult) {
	        if(jsonResult.status == 1){
	        	$(jsonResult.data).each(function (){
	        		var tr = $("<tr></tr>");
					tr.appendTo($("#interimPermision"));
					var th = $("<th scope=\"row\">" + this.id +"</th>");
					th.appendTo(tr);
					var td=$("<td>"+ this.interimpermision +"</td>");
					td.appendTo(tr);
					var td=$("<td>"+ this.time +"</td>");
					td.appendTo(tr);
					var td=$(
						"<td><button class='btn btn-blue btn-xs' onclick='editInterimPermision(" + this.id + ")' id='btnInterimPermisionEdit" + this.id + "' _href='" + jsonResult.url.USERINTERIMPERMISIONEDIT + "'>编辑</button><button class='btn btn-danger btn-xs' onclick='deleteInterimPermision(" + this.id + ")' id='btnInterimPermisionDelete" + this.id + "' _href='" + jsonResult.url.USERINTERIMPERMISIONDELETE + "'>删除</button></td>");
					td.appendTo(tr);
	        	});
	        	$("#interimPermisionTitle").html('临时权限----' + jsonResult.name);
	        }else{
	            alert(jsonResult.info);
	            $("#btnNewUser").removeAttr("disabled");
	        }
	    }
	});
	jQuery('#changeInterimPermision').modal('show', {backdrop: 'static'});
}

// 删除临时权限
function deleteInterimPermision(id)
{
	var btn = "#btnInterimPermisionDelete" + id;
	$(btn).attr('disabled','disabled');
	$.ajax({
		type: 'post',
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
		},
		dataType: 'json',
		success: function (jsonResult) {
			if(jsonResult.status == 1){
				alert(jsonResult.info);
				window.location.reload();
	        }else{
	            alert(jsonResult.info);
	            $("#btnNewUser").removeAttr("disabled");
	        }
	    }
	});
}

// 逐条修改临时权限
function editInterimPermision(id)
{	
	var btn = "#btnInterimPermisionEdit" + id;
	$.ajax({
		type: "POST",
		url: $(btn).attr('_href'),
		data: {
			'id' : id,
		},
		dataType: 'json',
		success: function (jsonResult) {
	        if(jsonResult.status == 1){
	        	var result = jsonResult.data;
	        	$("#interimPermisionId").val(id);
	        	// $("#interimPermisionSelect option[value = '" + result.interimpermision + "']").attr('selected','selected');
	        	$("#interimPermisionSelect").val(result.interimpermision);	
	        	$("#stopDate").val(result.date);
	        	$("#btnEditAndChangeInterimPermision").html('编辑');
	        	$("#btnEditAndChangeInterimPermision").attr('_href',jsonResult.url.USERINTERIMPERMISIONEDITSUBMIT);
	        }else{
	        }
	    }
	});
	$("#editAndChangeTitle").html('编辑临时权限');
	jQuery('#editAndChangeInterimPermision').modal('show', {backdrop: 'static'});
}

// 新建临时权限弹窗
function newInterimPermision()
{
	$("#btnEditAndChangeInterimPermision").html('提交');
	$.ajax({
		type: 'GET',
		url: $("#btnNewInterimPermision").attr('_href'),
		dataType: 'json',
		success: function (jsonResult) {
			if(jsonResult.status == 1){
				$("#btnEditAndChangeInterimPermision").attr('_href', jsonResult.url.USERINTERIMPERMISIONNEWSUBMIT);
			}
		}
	});
	$("#editAndChangeTitle").html('新建临时权限');
	$("#interimPermisionSelect").val(0);
	$("#stopDate").val('');
	$("#interimPermisionId").val('');
	jQuery('#editAndChangeInterimPermision').modal('show', {backdrop: 'static'});
}

$(function (){

	// 批量重置密码
	$("#btnResetAllPass").click(function (){
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

	// 批量限制登录
	$("#btnLimitAllLogin").click(function (){
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

	// 批量解除限制登录
	$("#btnDisLimitAllLogin").click(function (){
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

	// 批量删除用户
	$("#btnDeleteAllUser").click(function (){
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