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
					
					<!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
					<div class="settings-icon">
						<a href="#" data-toggle="settings-pane" data-animate="true">
							<i class="linecons-cog"></i>
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
					<h1 class="title">Native Elements</h1>
					<p class="description">Plain text boxes, select dropdowns and other basic form elements</p>
				</div>
				
					<div class="breadcrumb-env">
					
								<ol class="breadcrumb bc-1">
									<li>
							<a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
						</li>
								<li>
						
										<a href="forms-native.html">Forms</a>
								</li>
							<li class="active">
						
										<strong>Native Elements</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
			
			
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">周报补充</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" id="formOtherSubmit" name="formOtherSubmit">

								<div class="form-group" id="dstate" hidden>
									<label class="col-sm-2 control-label" for="state">状态</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="state" name="state" readonly="readonly" value="<?php echo ($message["state"]); ?>">
									</div>
								</div>

								<div class="form-group" id="dsubmitTime" hidden>
									<label class="col-sm-2 control-label" for="submitTime">提交时间</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="submitTime" name="submitTime" readonly="readonly" value="<?php echo ($message["submitTime"]); ?>">
									</div>
								</div>

								<div class="form-group" id="dtoken" hidden>
									<label class="col-sm-2 control-label" for="token">token</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="token" name="token" readonly="readonly" value="<?php echo ($message["token"]); ?>">
									</div>
								</div>

								<?php if(isset($message['id'])): ?><div class="form-group" id="did" hidden>
										<label class="col-sm-2 control-label" for="id">id</label>
										
										<div class="col-sm-10">
											<input type="text" class="form-control" id="id" name="id" readonly="readonly" value="<?php echo ($message["id"]); ?>">
										</div>
									</div><?php endif; ?>

								<div class="form-group" id="dtime">
									<label class="col-sm-2 control-label" for="time">时间</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="time" name="time" readonly="readonly" value="<?php echo ($message["time"]); ?>">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="duid">
									<label class="col-sm-2 control-label" for="uid">编号</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="uid" name="uid" readonly="readonly" value="<?php echo ($message["uid"]); ?>">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dname">
									<label class="col-sm-2 control-label" for="name">姓名</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="name" name="name" readonly="readonly" value="<?php echo ($message["name"]); ?>">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dkeynote">
									<label class="col-sm-2 control-label" for="keynote">工作重点</label>
									
									<div class="col-sm-10">
										<textarea class="form-control autogrow" cols="5" id="keynote" name="keynote" placeholder="本周你的工作重点是什么？"><?php echo ($message["keynote"]); ?></textarea>
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dsummary">
									<label class="col-sm-2 control-label" for="summary">工作总结</label>
									
									<div class="col-sm-10">
										<textarea class="form-control autogrow" cols="5" id="summary" name="summary" placeholder="这周你做了什么？"><?php echo ($message["summary"]); ?></textarea>
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dplan">
									<label class="col-sm-2 control-label" for="plan">工作计划</label>
									
									<div class="col-sm-10">
										<textarea class="form-control autogrow" cols="5" id="plan" name="plan" placeholder="下一周你的工作计划是什么？"><?php echo ($message["plan"]); ?></textarea>
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="didea">
									<label class="col-sm-2 control-label" for="idea">本周创意</label>
									
									<div class="col-sm-10">
										<textarea class="form-control autogrow" cols="5" id="idea" name="idea" placeholder="动动脑筋想一下，相信自己你是最棒的"><?php echo ($message["idea"]); ?></textarea>
									</div>
								</div>

								<?php if(isset($actions['TEAMDAILYOTHERSUBMIT'])): ?><a id="btnreturn" name="btnreturn" type="button" class="btn btn-blue btn-single pull-right" >返回</a>
									<a id="btnsubmit" name="btnsubmit" type="button" class="btn btn-blue btn-single pull-right" _href='<?php $str = $Think.INDEX_PATH_NAME.$actions['TEAMDAILYOTHERSUBMIT']['url'];echo U($str,array('key'=>$actions['TEAMDAILYOTHERSUBMIT']['key']))?>'>提交</a><?php endif; ?>

							</form>
							
						</div>
					</div>
				
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
	
	
	
	<script type="text/javascript" src="/efan/Public/Home/js/Daily/other.js"></script>


	<!-- Bottom Scripts -->
	<script src="/efan/Public/assets/js/bootstrap.min.js"></script>
	<script src="/efan/Public/assets/js/TweenMax.min.js"></script>
	<script src="/efan/Public/assets/js/resizeable.js"></script>
	<script src="/efan/Public/assets/js/joinable.js"></script>
	<script src="/efan/Public/assets/js/xenon-api.js"></script>
	<script src="/efan/Public/assets/js/xenon-toggles.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/efan/Public/assets/js/xenon-custom.js"></script>

</body>
</html>