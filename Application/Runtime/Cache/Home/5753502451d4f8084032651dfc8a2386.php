<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title><?php echo ($TMPL_TITLE); ?></title>

	<link rel="stylesheet" href="/efan/Public/assets/font/font.css">
	<link rel="stylesheet" href="/efan/Public/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="/efan/Public/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/efan/Public/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/efan/Public/assets/css/xenon-core.css">
	<link rel="stylesheet" href="/efan/Public/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="/efan/Public/assets/css/xenon-components.css">
	<link rel="stylesheet" href="/efan/Public/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="/efan/Public/assets/css/custom.css">
	<script src="/efan/Public/assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body">

	<div class="settings-pane">
			
		<a href="#" data-toggle="settings-pane" data-animate="true">
			&times;
		</a>
		
		
		
	</div>
	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		<div class="sidebar-menu toggle-others fixed">
			
			<div class="sidebar-menu-inner">	
				
				<header class="logo-env">
					
					<!-- logo -->
					<div class="logo">
						<a href="dashboard-1.html" class="logo-expanded">
							<img src="/efan/Public/assets/images/logo@2x.png" width="80" alt="" />
						</a>
						
						<a href="dashboard-1.html" class="logo-collapsed">
							<img src="/efan/Public/assets/images/logo-collapsed@2x.png" width="40" alt="" />
						</a>
					</div>
					
					<!-- This will toggle the mobile menu and will be visible only on mobile devices -->
					<div class="mobile-menu-toggle visible-xs">
						<a href="#" data-toggle="user-info-menu">
							<i class="fa-bell-o"></i>
							<span class="badge badge-success">7</span>
						</a>
						
						<a href="#" data-toggle="mobile-menu">
							<i class="fa-bars"></i>
						</a>
					</div>
				</header>

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
						
			</div>
			
		</div>
		
		<div class="main-content">		
			<!-- User Info, Notifications and Menu Bar -->
			<nav class="navbar user-info-navbar" role="navigation">
				<ul class="user-info-menu right-links list-inline list-unstyled">
					<li class="dropdown user-profile">
						<a href="#" data-toggle="dropdown">
							<img src="/efan/Public/assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
							<span>
								<?php echo ($__INFO__["name"]); ?>
								<i class="fa-angle-down"></i>
							</span>
						</a>
						<ul class="dropdown-menu user-profile-menu list-unstyled">
							<?php if(is_array($__MENU__['INFORMATION']['childs'])): foreach($__MENU__['INFORMATION']['childs'] as $key=>$information): ?><li>
								<a href="<?php echo U(INDEX_PATH_NAME . $information['url'] . '/key/' . $information['key']); ?>">
									<i class="<?php echo ($information['pic']); ?>"></i>
									<?php echo ($information["title"]); ?>
								</a>
							</li><?php endforeach; endif; ?>
						</ul>
					</li>					
				</ul>	
			</nav>
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
					<h3 class="panel-title">招新报名信息</h3>
					
					<div class="panel-options">
						<?php if(isset($actions['AUDITIONTIME'])): ?><button class="btn btn-danger btn-xs" id="changeAllTime" _href='<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONTIME']['url'];echo U($str,array('key'=>$actions['AUDITIONTIME']['key']))?>'>批量更改时间</button><?php endif; ?>
						<?php if(isset($actions['AUDITIONLAST'])): ?><button class="btn btn-black btn-xs" id="allLastRotation" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONLAST']['url'];echo U($str,array('key'=>$actions['AUDITIONLAST']['key']))?>">批量退回上一轮</button><?php endif; ?>
						<?php if(isset($actions['AUDITIONNEXT'])): ?><button class="btn btn-blue btn-xs" id="allNextRotation" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONNEXT']['url'];echo U($str,array('key'=>$actions['AUDITIONNEXT']['key']))?>">批量进入下一轮</button><?php endif; ?>
						<?php if(isset($actions['AUDITIONSENDMESSAGE'])): ?><button class="btn btn-success btn-xs" id="sendAllMessage" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONSENDMESSAGE']['url'];echo U($str,array('key'=>$actions['AUDITIONSENDMESSAGE']['key']))?>">批量发送短信</button><?php endif; ?>
						<?php if(isset($actions['AUDITIONOUT'])): ?><button class="btn btn-danger btn-xs" id="allOut" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONOUT']['url'];echo U($str,array('key'=>$actions['AUDITIONOUT']['key'],'id'=>$vo['id']))?>">批量淘汰</button><?php endif; ?>
						<?php if(isset($actions['AUDITIONIN'])): ?><button class="btn btn-danger btn-xs" id="allIn" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONIN']['url'];echo U($str,array('key'=>$actions['AUDITIONIN']['key'],'id'=>$vo['id']))?>">批量入围</button><?php endif; ?>
					</div>
				</div>
				<div class="panel-body">
					
					<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						$("#user").dataTable().yadcf([
							{column_number : 1, filter_type: 'text'},
							{column_number : 2, filter_type: 'text'},
							{column_number : 3, filter_type: 'range_number'},
							
						]);
					});
					</script>
					
					<table class="table table-striped table-bordered" id="user">
						<thead>
							<tr class="replace-inputs">
								<th class="row-selected row-selected"><input id="checkall" type="checkbox" ></th>
								<th>学号</th>
								<th>姓名</th>
								<th>时间</th>
								<th>环节</th>
								<th>短信</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($audition)): foreach($audition as $key=>$vo): ?><tr>
								<td><input class="ids" type="checkbox" name="id" value="<?php echo ($vo["id"]); ?>"></td>
								<td><?php echo ($vo["studentid"]); ?></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["auditiontime"]); ?></td>
								<td><?php echo ($vo["rotation"]); ?></td>
								<td><?php echo ($vo["message"]); ?></td>
								<td>
									<?php if($vo["state"] != 1): if(isset($actions['AUDITIONEDIT'])): ?><button class="btn btn-success btn-xs"  onclick="window.location.href='<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONEDIT']['url'];echo U($str,array('key'=>$actions['AUDITIONEDIT']['key'],'id'=>urlsafe_b64encode(authcode($vo['id'],'ENCODE'))))?>'">编辑</button><?php endif; ?>
										<?php if(isset($actions['AUDITIONTIME'])): ?><button class="btn btn-danger btn-xs" onclick="window.location.href='<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONTIME']['url'];echo U($str,array('key'=>$actions['AUDITIONTIME']['key'],'id'=>urlsafe_b64encode(authcode($vo['id'],'ENCODE'))))?>'">更改时间</button><?php endif; ?>
										<?php if(isset($actions['AUDITIONLAST']) and ($vo["rotation"] != '第1轮')): ?><button id="lastrotation<?php echo $vo['id'];?>" class="btn btn-black btn-xs" onclick="javascript:studentLast(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONLAST']['url'];echo U($str,array('key'=>$actions['AUDITIONLAST']['key']))?>">退回上一轮</button><?php endif; ?>
										<?php if(isset($actions['AUDITIONNEXT']) and ($vo["rotation"] != '地主约谈')): ?><button id="nextrotation<?php echo $vo['id'];?>" class="btn btn-blue btn-xs" onclick="javascript:studentNext(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONNEXT']['url'];echo U($str,array('key'=>$actions['AUDITIONNEXT']['key']))?>">进入下一轮</button><?php endif; ?>
										<?php if(isset($actions['AUDITIONSENDMESSAGE'])): ?><button id="sendmessage<?php echo $vo['id'];?>" class="btn btn-success btn-xs" onclick="javascript:sendMessage(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONSENDMESSAGE']['url'];echo U($str,array('key'=>$actions['AUDITIONSENDMESSAGE']['key']))?>">发送短信</button><?php endif; ?>
										<?php if(isset($actions['AUDITIONOUT'])): ?><button id="studentout<?php echo $vo['id'];?>" class="btn btn-danger btn-xs"  onclick="javascript:studentOut(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONOUT']['url'];echo U($str,array('key'=>$actions['AUDITIONOUT']['key'],'id'=>$vo['id']))?>">淘汰</button><?php endif; ?>
										<?php else: ?>
										<?php if(isset($actions['AUDITIONIN'])): ?><button id="studentin<?php echo $vo['id'];?>" class="btn btn-danger btn-xs"  onclick="javascript:studentIn(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['AUDITIONIN']['url'];echo U($str,array('key'=>$actions['AUDITIONIN']['key'],'id'=>$vo['id']))?>">入围</button><?php endif; endif; ?>
								</td>
							</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
					
				</div>
			</div>
			
			
			
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
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
		</div>
		
			
		
		
		
	</div>
	
	
	



	<script type="text/javascript" src="/efan/Public/Home/js/Recruit/audition.js"></script>
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="/efan/Public/assets/js/datatables/dataTables.bootstrap.css">

	<!-- Bottom Scripts -->
	<script src="/efan/Public/assets/js/bootstrap.min.js"></script>
	<script src="/efan/Public/assets/js/TweenMax.min.js"></script>
	<script src="/efan/Public/assets/js/resizeable.js"></script>
	<script src="/efan/Public/assets/js/joinable.js"></script>
	<script src="/efan/Public/assets/js/xenon-api.js"></script>
	<script src="/efan/Public/assets/js/xenon-toggles.js"></script>
	<script src="/efan/Public/assets/js/datatables/js/jquery.dataTables.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="/efan/Public/assets/js/datatables/dataTables.bootstrap.js"></script>
	<script src="/efan/Public/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
	<script src="/efan/Public/assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/efan/Public/assets/js/xenon-custom.js"></script>

</body>
</html>