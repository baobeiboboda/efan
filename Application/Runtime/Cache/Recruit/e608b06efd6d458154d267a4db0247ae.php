<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title><?php echo ($title); ?></title>

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

	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		
		
		<div class="main-content">
					
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><?php echo ($title); ?></h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" id="addRecruitForm" name="addRecruitForm" method="post" action="http://localhost/thinkphp/index.php/Recruit/Recruit/newRecruit">

								<div class="form-group" id="dtoken" hidden="hidden">
									<label class="col-sm-2 control-label" for="token">时间</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="token" name="token" value="<?php echo ($token); ?>">
									</div>
								</div>

								<div class="form-group" id="dtime" hidden="hidden">
									<label class="col-sm-2 control-label" for="time">时间</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="time" name="time" value="<?php echo ($time); ?>">
									</div>
								</div>

								<div class="form-group" id="dstudent_ID">
									<label class="col-sm-2 control-label" for="student_ID">学号</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="student_ID" name="student_ID" _target="http://localhost/thinkphp/Recruit/NRRecruit/checkStudentId" placeholder="请输入学号">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dname">
									<label class="col-sm-2 control-label" for="name">姓名</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="name" name="name" placeholder="请输入姓名">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dphone">
									<label class="col-sm-2 control-label" for="phone">电话</label>
									
									<div class="col-sm-10">
										<div class="input-group">
											<input type="text" class="form-control no-right-border" id="phone" name="phone" placeholder="请输入电话">
											<span class="input-group-btn">
												<input id="btncode" name="btncode" class="btn btn-blue" type="button" _href="<?php $str = $Think.RECRUIT_PATH_NAME.'Recruit/sendCode';echo U($str)?>" value="获取验证码">
											</span>
										</div>
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dcode">
									<label class="col-sm-2 control-label" for="code">验证码</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="code" name="code" placeholder="输入验证码">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dcollege">
									<label class="col-sm-2 control-label" for="college">学院</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="college" name="college" placeholder="请输入学院">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dmajor">
									<label class="col-sm-2 control-label" for="field-1">专业</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="major" name="major" placeholder="请输入专业">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dclass">
									<label class="col-sm-2 control-label" for="class">班级</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="class" name="class" placeholder="请输入班级">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dbirth">
									<label class="col-sm-2 control-label" for="birth">出生日期</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker" id="birth" name="birth" data-format="yyyy-MM-dd">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dqq">
									<label class="col-sm-2 control-label" for="qq">QQ</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="qq" name="qq" placeholder="请输入QQ号">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="demail">
									<label class="col-sm-2 control-label" for="email" data-validate="email">邮箱</label>
									
									<div class="col-sm-10">
										<input type="email" class="form-control" id="email" name="email" placeholder="请输入邮箱">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dintroduce">
									<label class="col-sm-2 control-label" for="introduce">自我介绍</label>
									
									<div class="col-sm-10">
										<textarea class="form-control autogrow" cols="5" id="introduce" name="introduce" placeholder="通过简短的介绍让我们更好的了解你"></textarea>
									</div>
								</div>

								

								<a type="button" id="btnsubmit" name="btnsubmit" class="btn btn-blue btn-single pull-right" _href="<?php $str = $Think.RECRUIT_PATH_NAME.'Recruit/newRecruit';echo U($str)?>">提交报名</a>
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
	<script type="text/javascript" src="/Public/Recruit/js/recruit.js"></script>
	




	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="/Public/assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="/Public/assets/js/select2/select2.css">
	<link rel="stylesheet" href="/Public/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="/Public/assets/js/multiselect/css/multi-select.css">

	<!-- Bottom Scripts -->
	<script src="/Public/assets/js/bootstrap.min.js"></script>
	<script src="/Public/assets/js/TweenMax.min.js"></script>
	<script src="/Public/assets/js/resizeable.js"></script>
	<script src="/Public/assets/js/joinable.js"></script>
	<script src="/Public/assets/js/xenon-api.js"></script>
	<script src="/Public/assets/js/xenon-toggles.js"></script>
	<script src="/Public/assets/js/moment.min.js"></script>


	<!-- Imported scripts on this page -->
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
	<script src="/Public/assets/js/multiselect/js/jquery.multi-select.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/Public/assets/js/xenon-custom.js"></script>

</body>
</html>