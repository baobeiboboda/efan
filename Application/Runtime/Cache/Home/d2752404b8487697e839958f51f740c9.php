<?php if (!defined('THINK_PATH')) exit();?><!-- 每一个新的页面从这里开始都是一样的 -->
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />	
	<title><?php echo ($TMPL_TITLE); ?></title>
	<link rel="stylesheet" href="/Public/assets/font/font.css">
	<link rel="stylesheet" href="/Public/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="/Public/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Public/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/Public/assets/css/xenon-core.css">
	<link rel="stylesheet" href="/Public/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="/Public/assets/css/xenon-components.css">
	<link rel="stylesheet" href="/Public/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="/Public/assets/css/custom.css">
	<script src="/Public/assets/js/jquery-1.11.1.min.js"></script>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="page-body">	
	<div class="page-container">
		<div class="sidebar-menu toggle-others fixed">
			<div class="sidebar-menu-inner">
				<header class="logo-env">
					<!-- 这里是网站的logo -->
					<div class="logo">
						<a href="dashboard-1.html" class="logo-expanded">
							<img src="/Public/assets/images/logo@2x.png" width="80" alt="" />
						</a>
						<a href="dashboard-1.html" class="logo-collapsed">
							<img src="/Public/assets/images/logo-collapsed@2x.png" width="40" alt="" />
						</a>
					</div>	
				</header>
				<!-- 如果不要菜单 这里开始是左侧的菜单 -->				
				<ul id="main-menu" class="main-menu">
					<?php if(is_array($__MENU__)): foreach($__MENU__ as $key=>$vo): ?><li>
							<a href="<?php echo U(INDEX_PATH_NAME . $vo['url'] . '/key/' . $vo['key']); ?>">
								<i class="<?php echo ($vo["pic"]); ?>"></i>
								<span class="title"><?php echo ($vo["title"]); ?></span>
							</a>
							<?php if(!empty($vo["childs"])): ?><ul>
							<?php if(is_array($vo["childs"])): foreach($vo["childs"] as $key=>$vochild): ?><li>
								<a href="<?php echo U(INDEX_PATH_NAME . $vochild['url'] . '/key/' . $vochild['key']); ?>">
									<span class="title"><?php echo ($vochild["title"]); ?></span>
								</a>
							</li><?php endforeach; endif; ?>
							</ul><?php endif; ?>
						</li><?php endforeach; endif; ?>
				</ul>
				<!-- 左侧菜单部分这里结束 -->
			</div>
		</div>
		<div class="main-content">		
			<!-- 这里开始是右侧最上面的导航条的开始 -->
			<nav class="navbar user-info-navbar" role="navigation">
				<ul class="user-info-menu right-links list-inline list-unstyled">
					<li class="dropdown user-profile">
						<a href="#" data-toggle="dropdown">
							<img src="/Public/assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								<?php echo ($__INFO__["name"]); ?>
								<i class="fa-angle-down"></i>
							</span>
						</a>
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<li>
								<a href="">
									<i class="fa-edit"></i>
									修改密码
								</a>
							</li>
							<li>
								<a href="">
									<i class="fa-info"></i>
									报告bug
								</a>
							</li>
							<li class="">
								<a href="">
									<i class="fa-lock"></i>
									退出登录
								</a>
							</li>
						</ul>
					</li>					
				</ul>	
			</nav>
			<!-- 这里是内容页顶部信息条结束 -->
			<!-- 在Home里面，只有两个地方不同 这里往下是第一处不同的-->
			<div class="page-title">
				<div class="title-env">
					<h1 class="title">DataTable</h1>
					<p class="description">Dynamic table variants with pagination and other controls</p>
				</div>
				<div class="breadcrumb-env">
					<ol class="breadcrumb bc-1">
						<li>
							<a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
						</li>
						<li>
							<a href="tables-basic.html">Tables</a>
						</li>
						<li class="active">
							<strong>Data Tables</strong>
						</li>
					</ol>
				</div>
			</div>
			<!-- Custom column filtering -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">团队成员信息一览</h3>
					
					<!-- 顶部的批量操作按钮在这里 -->
					<div class="panel-options">
						<?php if(isset($actions['USERTEMPLEDOWNLOAD'])): ?><button class="btn btn-danger btn-xs" onclick="window.location.href='<?php echo ($url); ?>'">数据模板下载</button><?php endif; ?>
						<?php if(isset($actions['USERNEW'])): ?><button class="btn btn-info btn-xs"  href="javascript:;" onclick="jQuery('#editAndChangeInterimPermision').modal('show', {backdrop: 'static'});" class="btn btn-primary btn-single btn-sm">新建用户</button><?php endif; ?>
						<?php if(isset($actions['USERDELETE'])): ?><button id="btnDeleteAllUser" class="btn btn-danger btn-xs" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERDELETE']['url'];echo U($str,array('key'=>$actions['USERDELETE']['key']))?>">批量删除</button><?php endif; ?>
						<?php if(isset($actions['USERLEADINGIN'])): ?><button class="btn btn-blue btn-xs" id="sendAllMessage" onclick="window.location.href='<?php $str = $Think.INDEX_PATH_NAME.$actions['USERLEADINGIN']['url'];echo U($str,array('key'=>$actions['USERLEADINGIN']['key']))?>'">导入用户</button><?php endif; ?>
						<?php if(isset($actions['USERRESETPASSWORLD'])): ?><button id="btnResetAllPass" class="btn btn-success btn-xs" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERRESETPASSWORLD']['url'];echo U($str,array('key'=>$actions['USERRESETPASSWORLD']['key']))?>">批量重置密码</button><?php endif; ?>
						<?php if(isset($actions['USERLIMITLOGIN'])): ?><button id="btnLimitAllLogin" class="btn btn-danger btn-xs" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERLIMITLOGIN']['url'];echo U($str,array('key'=>$actions['USERLIMITLOGIN']['key']))?>">批量限制登录</button><?php endif; ?>
						<?php if(isset($actions['USERDISLIMITLOGIN'])): ?><button id="btnDisLimitAllLogin" class="btn btn-secondary btn-xs" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERDISLIMITLOGIN']['url'];echo U($str,array('key'=>$actions['USERDISLIMITLOGIN']['key']))?>">批量解除限制</button><?php endif; ?>
						<?php if(isset($actions['USERCHANGEPERMISION'])): ?><button class="btn btn-info btn-xs" onclick="javascript:changeAllPermision();" class="btn btn-primary btn-single btn-sm" id="btnChangeAllPermision">批量更改权限</button><?php endif; ?>
					</div>
					<!-- 批量操作按钮在这里结束 -->
				</div>
				<div class="panel-body">
					<!-- table 标签顶部的那个菜单或者选择范围从这里开始 -->
					<script type="text/javascript">
						jQuery(document).ready(function($)
						{
							$("#user").dataTable().yadcf([
								{column_number : 2, filter_type: 'text'},
								{column_number : 3},
							]);
						});
					</script>
					
					<!-- table 标签顶部的那个菜单或者选择范围到这里结束 -->
					<table class="table table-striped table-bordered" id="user">
						<thead>
							<tr class="replace-inputs">
								<th class="row-selected row-selected"><input id="checkall" type="checkbox" ></th>
								<th>编号</th>
								<th>姓名</th>
								<th>类别</th>
								<th>名称</th>
								<th>批次</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($creativeList)): foreach($creativeList as $key=>$vo): ?><tr>
								<td><input class="ids" type="checkbox" name="id" value="<?php echo ($vo["id"]); ?>"></td>
								<td><?php echo ($vo["uid"]); ?></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($mobileGroup[$vo['group']]['group']); ?></td>
								<td><?php echo ($vo["title"]); ?></td>
								<td>
									<?php echo ($vo["info"]); ?>
								</td>
								<td>
									<?php if($vo["state"] == 1): if(isset($actions['USEREDIT'])): ?><button class="btn btn-blue btn-xs"  onclick="window.location.href='<?php $str = $Think.INDEX_PATH_NAME.$actions['USEREDIT']['url'];echo U($str,array('key'=>$actions['USEREDIT']['key'],'id'=>urlsafe_b64encode(authcode($vo['id'],'ENCODE'))))?>'">编辑</button><?php endif; ?>
										<?php if(isset($actions['USERDELETE'])): ?><button id="deleteUser<?php echo $vo['id'];?>" class="btn btn-danger btn-xs" onclick="javascript:deleteUser(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERDELETE']['url'];echo U($str,array('key'=>$actions['USERDELETE']['key']))?>">删除</button><?php endif; ?>
										<?php if(isset($actions['USERRESETPASSWORLD'])): ?><button id="resetPass<?php echo $vo['id'];?>" class="btn btn-success btn-xs" onclick="javascript:resetPass(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERRESETPASSWORLD']['url'];echo U($str,array('key'=>$actions['USERRESETPASSWORLD']['key']))?>">重置密码</button><?php endif; ?>
										<?php if(isset($actions['USERLIMITLOGIN'])): ?><button id="limit<?php echo $vo['id'];?>" class="btn btn-danger btn-xs" onclick="javascript:limit(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERLIMITLOGIN']['url'];echo U($str,array('key'=>$actions['USERLIMITLOGIN']['key']))?>">限制登录</button><?php endif; ?>
										<?php if(isset($actions['USERCHANGEPERMISION'])): ?><button id="changePermision<?php echo $vo['id'];?>"  class="btn btn-info btn-xs" onclick="javascript:changePermision(<?php echo $vo['id'];?>);" class="btn btn-primary btn-single btn-sm" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERCHANGEPERMISION']['url'];echo U($str,array('key'=>$actions['USERCHANGEPERMISION']['key']))?>">更改权限</button><?php endif; ?>
										<?php if(isset($actions['USERINTERIMPERMISION'])): ?><button class="btn btn-warning btn-xs" onclick="javascript:changeInterimPermision(<?php echo $vo['id'];?>);" class="btn btn-primary btn-single btn-sm" id="changeInterimPermision<?php echo $vo['id'];?>" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERINTERIMPERMISION']['url'];echo U($str,array('key'=>$actions['USERINTERIMPERMISION']['key']))?>">临时权限</button><?php endif; endif; ?>
									<?php if($vo["state"] == 0): if(isset($actions['USERDISLIMITLOGIN'])): ?><button id="disLimit<?php echo $vo['id'];?>" class="btn btn-secondary btn-xs" onclick="javascript:disLimit(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERDISLIMITLOGIN']['url'];echo U($str,array('key'=>$actions['USERDISLIMITLOGIN']['key']))?>">解除限制</button><?php endif; endif; ?>
								</td>
							</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Home中第一处不同结束 -->
			<!-- 页面最下方从这里开始 -->
			<!-- footer从两种样式里面选择在common/config.php中修改-->
			<footer class="main-footer sticky <?php echo ($TMPL_FOOTER["FOOTER_STYLE"]); ?>">
				<div class="footer-inner">
					<div class="footer-text">
						&copy; <?php echo ($TMPL_FOOTER["YEAR"]); ?> 
						<strong><?php echo ($TMPL_FOOTER["GROUP_SHORT"]); ?></strong> 
						  <?php echo ($TMPL_FOOTER["COMPANY"]); ?> <a href="<?php echo ($TMPL_FOOTER["GROUP_LINK"]); ?>" title="<?php echo ($TMPL_FOOTER["GROUP_FULL"]); ?>" target="_blank"><?php echo ($TMPL_FOOTER["GROUP_FULL"]); ?></a>
					</div>
					<div class="go-up">
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
					</div>
				</div>
			</footer>
			<!-- 页面最下方从这里结束 -->
		</div>
	</div>
	<!-- 新建用户弹出层 -->
	<div class="modal fade" id="newUser">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">新建用户</h4>
				</div>
				
				<div class="modal-body">
					<form>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group" id="duid" name="duid">
								<label for="uid" class="control-label">团队编号</label>
								
								<input type="text" class="form-control" id="uid" name="uid" placeholder="团队编号">
							</div>	
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							
							<div class="form-group" id="dname" name="dname">
								<label for="name" class="control-label">姓名</label>
								
								<input type="text" class="form-control" id="name" name="name" placeholder="姓名">
							</div>	
							
						</div>
					</div>
					</form>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
					<?php if(isset($actions['USERNEWSUBMIT'])): ?><button class="btn btn-info" id="btnNewUser" name="btnNewUser" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERNEWSUBMIT']['url'];echo U($str,array('key'=>$actions['USERNEWSUBMIT']['key']))?>">新建</button><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- 指派权限弹出层 -->
	<div class="modal fade" id="changePermision">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">指派权限</h4>
				</div>
				
				<div class="modal-body">
					<form>
					<div class="row">
						<div class="col-md-12" hidden="hidden">
							
							<div class="form-group" id="dpermisionUserId" name="dpermisionUserId">
								<label for="name" class="control-label">id</label>
								
								<input type="text" class="form-control" id="permisionUserId" name="permisionUserId" >
							</div>	
						</div>

						<div class="col-md-12">
							<div class="form-group" id="dpermision" name="dpermision">
								<label for="uid" class="control-label">权限</label>
								<select class="form-control" id="permision" name="permision">
									<option value="0">请选择</option>
									<?php if(is_array($permisionList)): foreach($permisionList as $key=>$permision): ?><option value="<?php echo ($permision["id"]); ?>"><?php echo ($permision["permision"]); ?></option><?php endforeach; endif; ?>
								</select>
							</div>
						</div>
					</div>
					</form>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
					<?php if(isset($actions['USERCHANGEPERMISION'])): ?><button class="btn btn-info" id="btnChangePermision" name="btnChangePermision" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERCHANGEPERMISION']['url'];echo U($str,array('key'=>$actions['USERCHANGEPERMISION']['key']))?>">提交</button><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- 临时权限弹出层 -->
	<div class="modal fade" id="changeInterimPermision">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="interimPermisionTitle">临时权限</h4>
				</div>
				
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12" hidden="hidden">
							
							<div class="form-group" id="dId" name="dId">
								<label for="hiddenId" class="control-label">id</label>
								
								<input type="text" class="form-control" id="hiddenId" name="hiddenId" >
							</div>	
						</div>
					</div>

					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>权限</th>
								<th>截至时间</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody id="interimPermision">
						</tbody>
					</table>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
					<?php if(isset($actions['USERINTERIMPERMISIONNEW'])): ?><button class="btn btn-info" id="btnNewInterimPermision" name="btnNewInterimPermision" onclick="javascript:newInterimPermision()" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['USERINTERIMPERMISIONNEW']['url'];echo U($str,array('key'=>$actions['USERINTERIMPERMISIONNEW']['key']))?>">新建临时权限</button><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- 新建编辑临时权限弹出层 -->
	<div class="modal fade" id="editAndChangeInterimPermision">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="editAndChangeTitle">title</h4>
				</div>
				
				<div class="modal-body">
					<form>
					<div class="row">
						<div class="col-md-12" hidden="hidden">
							
							<div class="form-group" id="dinterimPermisionId" name="dinterimPermisionId">
								<label for="name" class="control-label">id</label>
								
								<input type="text" class="form-control" id="interimPermisionId" name="interimPermisionId" >
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group" id="dinterimPermisionSelect" name="dinterimPermisionSelect">
								<label for="uid" class="control-label">权限</label>
								<select class="form-control" id="interimPermisionSelect" name="interimPermisionSelect">
									<option value="0">请选择</option>
									<?php if(is_array($interimPermisionList)): foreach($interimPermisionList as $key=>$interimPermision): ?><option value="<?php echo ($interimPermision["id"]); ?>"><?php echo ($interimPermision["permision"]); ?></option><?php endforeach; endif; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group" id="dstopDate" name="dstopDate">
								<label for="uid" class="control-label">截止时间</label>
								<input type="text" class="form-control datepicker" data-format="yyyy-MM-dd" id="stopDate" name="stopDate" />
							</div>
						</div>
					</div>
					</form>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
					<?php if(isset($actions['USERNEWSUBMIT'])): ?><button class="btn btn-info" id="btnEditAndChangeInterimPermision" name="btnEditAndChangeInterimPermision" _href=""></button><?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- 这以下模板中的JS/CSS/FONT/IMAGES 都直接引用PUBLIC_ 其他的ajax 之类的见开发说明 -->
	<!-- 这以下的是HOME中的第二个不同 详情看模板的最下方的引用 sublimetext中可以ctrl+D批量修改 -->
	<script type="text/javascript" src="/Public/Home/js/User/User/index.js"></script>
	<link rel="stylesheet" href="/Public/assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="/Public/assets/js/select2/select2.css">
	<link rel="stylesheet" href="/Public/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="/Public/assets/js/multiselect/css/multi-select.css">
	<link rel="stylesheet" href="/Public/assets/js/datatables/dataTables.bootstrap.css">
	<script src="/Public/assets/js/bootstrap.min.js"></script>
	<script src="/Public/assets/js/TweenMax.min.js"></script>
	<script src="/Public/assets/js/resizeable.js"></script>
	<script src="/Public/assets/js/joinable.js"></script>
	<script src="/Public/assets/js/xenon-api.js"></script>
	<script src="/Public/assets/js/xenon-toggles.js"></script>
	<script src="/Public/assets/js/datatables/js/jquery.dataTables.min.js"></script>
	<script src="/Public/assets/js/datatables/dataTables.bootstrap.js"></script>
	<script src="/Public/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
	<script src="/Public/assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>
	<script src="/Public/assets/js/xenon-custom.js"></script>
	<script src="/Public/assets/js/multiselect/js/jquery.multi-select.js"></script>
	<script src="/Public/assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="/Public/assets/js/datepicker/bootstrap-datepicker.js"></script>
	<script src="/Public/assets/js/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="/Public/assets/js/colorpicker/bootstrap-colorpicker.min.js"></script>
	<script src="/Public/assets/js/select2/select2.min.js"></script>
	<script src="/Public/assets/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="/Public/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<script src="/Public/assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="/Public/assets/js/typeahead.bundle.js"></script>
	<script src="/Public/assets/js/handlebars.min.js"></script>

</body>
</html>