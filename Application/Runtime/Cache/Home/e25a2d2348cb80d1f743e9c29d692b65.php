<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>逸凡创新团队</title>

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

	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		
		
		<div class="main-content">
					
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><?php echo ($pageTitle); ?></h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" id="changePassFirstForm" name="changePassFirstForm" method="post" action="http://localhost/thinkphp/index.php/Recruit/Recruit/newRecruit">

								<div class="form-group" id="dtoken" hidden="hidden">
									<label class="col-sm-2 control-label" for="token">token</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="token" name="token" value="<?php echo ($message["token"]); ?>">
									</div>
								</div>
								<div class="form-group" id="did" hidden="hidden">
									<label class="col-sm-2 control-label" for="id">id</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="id" name="id" value="<?php echo ($message["uid"]); ?>">
									</div>
								</div>
								<div class="form-group" id="dpassword">
									<label class="col-sm-2 control-label" for="password">密码</label>
									
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" name="password"  placeholder="请输入密码" onblur="javascript:testPass()">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="drepassword">
									<label class="col-sm-2 control-label" for="repassword">确认密码</label>
									
									<div class="col-sm-10">
										<input type="password" class="form-control" id="repassword" name="repassword" placeholder="重复输入密码" onblur="javascript:passAndRepass()">
									</div>
								</div>

								<a type="button" id="btnsubmit" name="btnsubmit" class="btn btn-blue btn-single pull-right" _href="<?php $str = $Think.INDEX_PATH_NAME.'Login/Public/changePass';echo U($str)?>">修改密码</a>
							</form>
							
						</div>
					</div>
				
				</div>
			</div>
			
			<!-- Main Footer -->
			<!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
			<!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
			<!-- Or class "fixed" to  always fix the footer to the end of page -->
			<footer class="main-footer sticky footer-type-1">
				
				<div class="footer-inner">
				
					<!-- Add your copyright text here -->
					<div class="footer-text">
						&copy; 2010-2017 
						<strong>逸凡软件</strong> 
						  辽宁工业大学 <a href="http://www.efan.in/" title="逸凡创新团队" target="_blank">逸凡创新团队</a>
					</div>
					
					
					<!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
					<div class="go-up">
					
						<a href="#" rel="go-top">
							<i class="fa-angle-up"></i>
						</a>
						
					</div>
					
				</div>
				
			</footer>
		</div>
		
			

	</div>
	<script type="text/javascript" src="/efan/Public/Home/js/Login/Public/changePass.js"></script>
	




	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="/efan/Public/assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="/efan/Public/assets/js/select2/select2.css">
	<link rel="stylesheet" href="/efan/Public/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="/efan/Public/assets/js/multiselect/css/multi-select.css">

	<!-- Bottom Scripts -->
	<script src="/efan/Public/assets/js/bootstrap.min.js"></script>
	<script src="/efan/Public/assets/js/TweenMax.min.js"></script>
	<script src="/efan/Public/assets/js/resizeable.js"></script>
	<script src="/efan/Public/assets/js/joinable.js"></script>
	<script src="/efan/Public/assets/js/xenon-api.js"></script>
	<script src="/efan/Public/assets/js/xenon-toggles.js"></script>
	<script src="/efan/Public/assets/js/moment.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="/efan/Public/assets/js/daterangepicker/daterangepicker.js"></script>
	<script src="/efan/Public/assets/js/datepicker/bootstrap-datepicker.js"></script>
	<script src="/efan/Public/assets/js/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="/efan/Public/assets/js/colorpicker/bootstrap-colorpicker.min.js"></script>
	<script src="/efan/Public/assets/js/select2/select2.min.js"></script>
	<script src="/efan/Public/assets/js/jquery-ui/jquery-ui.min.js"></script>
	<script src="/efan/Public/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
	<script src="/efan/Public/assets/js/tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="/efan/Public/assets/js/typeahead.bundle.js"></script>
	<script src="/efan/Public/assets/js/handlebars.min.js"></script>
	<script src="/efan/Public/assets/js/multiselect/js/jquery.multi-select.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/efan/Public/assets/js/xenon-custom.js"></script>

</body>
</html>