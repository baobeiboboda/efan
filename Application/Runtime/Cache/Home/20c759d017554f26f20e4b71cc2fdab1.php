<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
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

	
	<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
			
		<!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
		<!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
		<!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
		
		
		<div class="main-content">
					
			<!-- User Info, Notifications and Menu Bar -->
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
					<h1 class="title">Advanced Plugins</h1>
					<p class="description">Custom form elements using Bootstrap and jQuery plugins</p>
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
						
										<strong>Advanced Plugins</strong>
								</li>
								</ol>
								
				</div>
					
			</div>
			
			
			
			
			
			<div class="row">
				<div class="col-sm-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Time Picker</h3>
							
						</div>
						<div class="panel-body">
							
							<form role="form" class="form-horizontal" method="post" action="audition.do.php" id="viewRecruit">

								<div class="form-group" id="dstudent_ID">
									<label class="col-sm-2 control-label" for="student_ID">学号</label>
									
									<div class="col-sm-10">
										<div class="input-group">
											<input type="text" class="form-control no-right-border" id="student_ID" name="student_ID" placeholder="请输入学号">
											<span class="input-group-btn">
												<?php if(isset($actions['RECRUITVIEW'])): ?><span class="l mr-10">
                    									<a id="btnstudent" name="btnstudent" class="btn btn-blue" type="button" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['RECRUITVIEW']['url'];echo U($str,array('key'=>$actions['RECRUITVIEW']['key']))?>">查询</a>
                 									</span><?php endif; ?>
											</span>
										</div>
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dname">
									<label class="col-sm-2 control-label" for="name">姓名</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="name" name="name" readonly="readonly">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="did" hidden>
									<label class="col-sm-2 control-label" for="id">id</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="id" name="id" readonly="readonly">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dphone">
									<label class="col-sm-2 control-label" for="phone">电话</label>
									
									<div class="col-sm-10">
										<div class="input-group">
											<input type="text" class="form-control no-right-border" id="phone" name="phone">
											<span class="input-group-btn">
												<button id="btnchangephone" name="btnchangephone" class="btn btn-blue" type="button" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['RECRUITCHANGE']['url'];echo U($str,array('key'=>$actions['RECRUITCHANGE']['key']))?>">修改电话</button>
											</span>
										</div>
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dcollege">
									<label class="col-sm-2 control-label" for="college">学院</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="college" name="college" readonly="readonly">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dmajor">
									<label class="col-sm-2 control-label" for="field-1">专业</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="major" name="major" readonly="readonly">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dclass">
									<label class="col-sm-2 control-label" for="class">班级</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="class" name="class" readonly="readonly">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dbirth">
									<label class="col-sm-2 control-label" for="birth">出生日期</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control datepicker" id="birth" name="birth" readonly="readonly" data-format="yyyy/MM/dd">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dqq">
									<label class="col-sm-2 control-label" for="qq">QQ</label>
									
									<div class="col-sm-10">
										<input type="text" class="form-control" id="qq" name="qq" readonly="readonly">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="demail">
									<label class="col-sm-2 control-label" for="email">邮箱</label>
									
									<div class="col-sm-10">
										<input type="email" class="form-control" id="email" name="email" readonly="readonly">
									</div>
								</div>

								<div class="form-group-separator"></div>

								<div class="form-group" id="dintroduce">
									<label class="col-sm-2 control-label" for="introduce">自我介绍</label>
									
									<div class="col-sm-10">
										<textarea class="form-control autogrow" cols="5" id="introduce" name="introduce" readonly="readonly"></textarea>
									</div>
								</div>

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
						&copy; 2014 
						<strong>Xenon</strong> 
						More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
					</div>
					13699238552
					
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
	
	

	<script type="text/javascript" src="/Public/Home/js/Recruit/recruit.js"></script>


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