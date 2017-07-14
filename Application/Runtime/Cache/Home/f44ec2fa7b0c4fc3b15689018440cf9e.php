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
<body class="page-body login-page">

	
	<div class="login-container">
	
		<div class="row">
		
			<div class="col-sm-6">
			
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
				
				
				
				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="post" role="form" id="login" class="login-form fade-in-effect">
					
					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
							<img src="/efan/Public/assets/images/logo@2x.png" alt="" width="80" />
							<span>登陆</span>
						</a>
						
						<p>亲爱的用户，请登陆以便使用我们的系统</p>
					</div>
	
					
					<div class="form-group" id="dusername">
						<label class="control-label" for="username">用户名</label>
						<input type="text" class="form-control input-dark" name="username" id="username" autocomplete="off" />
					</div>
					
					<div class="form-group" id="dpasswd">
						<label class="control-label" for="passwd">密码</label>
						<input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" />
					</div>

					<div class="form-group" id="dcode">
						<label class="control-label" for="code">验证码</label>
						<input type="text" class="form-control input-dark" name="code" id="code" autocomplete="off" />
					</div>

					<div class="form-group" id="dcode">
                        <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('verify');?>" width="100%">
                    </div>

					<div class="form-group">
						<a  id="btnSubmit" name="btnSubmit" class="btn btn-dark  btn-block text-left" _href="<?php $str = $Think.INDEX_PATH_NAME.'Login/Public/login';echo U($str)?>">
							<i class="fa-lock"></i>
							登陆
						</a>
					</div>

					
					
				</form>
				
				
			</div>
			
		</div>
		
	</div>

	<script type="text/javascript">
		$(function(){
	        $('.reloadverify').click(function(){
	            $('.verifyimg').attr('src', "<?php echo U('verify');?>" + "?" + Math.random());
	        });
	    })
	</script>

	<!-- Bottom Scripts -->
	<script src="/efan/Public/assets/js/bootstrap.min.js"></script>
	<script src="/efan/Public/assets/js/TweenMax.min.js"></script>
	<script src="/efan/Public/assets/js/resizeable.js"></script>
	<script src="/efan/Public/assets/js/joinable.js"></script>
	<script src="/efan/Public/assets/js/xenon-api.js"></script>
	<script src="/efan/Public/assets/js/xenon-toggles.js"></script>
	<script src="/efan/Public/assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="/efan/Public/assets/js/toastr/toastr.min.js"></script>
	<script src="/efan/Public/assets/js/jquery.md5.js"></script>
	<script type="text/javascript" src="/efan/Public/Home/js/Login/Public/login.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="/efan/Public/assets/js/xenon-custom.js"></script>

</body>
</html>