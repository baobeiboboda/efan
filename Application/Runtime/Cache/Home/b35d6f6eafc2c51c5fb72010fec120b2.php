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
	
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
	
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
			<section class="mailbox-env">
				
				<div class="row">
					
					<!-- Email Single -->
					<div class="col-sm-12">
						
						<div class="mail-single">
							
							<!-- Email Title and Button Options -->
							<div class="mail-single-header">
								<h2>
									<?php echo ($creative["creativetitle"]); ?>
									<!-- <span class="badge badge-success badge-roundless pull-right upper">Envato</span>
									<span class="badge badge-red badge-roundless pull-right upper">Friends</span>
									<span class="badge badge-warning badge-roundless pull-right upper">Google</span> -->
								</h2>
								
								<div class="mail-single-header-options">
									<?php if(isset($actions['CREATIVECLUBLISTREPLYRETURN'])): ?><a href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBLISTREPLYRETURN']['url'];echo U($str,array('key'=>'CREATIVECLUBLIST'))?>" class="btn btn-gray btn-icon">
										<span>返回</span>
										<i class="fa-reply-all"></i>
									</a><?php endif; ?>
									<?php if(isset($actions['CREATIVECLUBLISTREPLYEDIT'])): ?><a href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBLISTREPLYEDIT']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBLISTREPLYEDIT']['key'],'id'=>urlsafe_b64encode(authcode($creative['id'],'ENCODE'))))?>" class="btn btn-gray btn-icon">
										<span>编辑</span>
										<i class="fa-pencil-square-o"></i>
									</a><?php endif; ?>
								</div>
							</div>
							
							<!-- Email Info From/Reply -->
							<div class="mail-single-info">
								
								<div class="mail-single-info-user dropdown">
									<a >
										<img src="/Public/assets/images/user-3.png" class="img-circle" width="38" /> 
										<span><?php echo ($creative["name"]); ?></span>
										   类别 <span><?php echo ($creative["group"]); ?></span>
										<em class="time"><?php echo ($creative["submittime"]); ?></em>
									</a>
								</div>
								
								<div class="mail-single-info-options">
									<a href="#" class="star starred">
										<i class="fa-star-empty"></i>
									</a>
									<a href="#">
										<i class="linecons-attach"></i>
									</a>
								</div>
								
							</div>
							
							<!-- Email Body -->
							<div class="mail-single-body">
								<?php echo ($creative["creative"]); ?>			
							</div>
														
						</div>
					</div>
					
				</div>
				
			</section>

			<section class="profile-env">
				
				<div class="row">
					
					<div class="col-sm-12">
						
						<!-- User Post form and Timeline -->
						
						
						<!-- User timeline stories -->
						<section class="user-timeline-stories">
							
							<!-- Timeline Story Type: Status -->
							<?php if(is_array($reply)): foreach($reply as $key=>$vo): ?><article class="timeline-story">
								
								<i class="fa-paper-plane-empty block-icon"></i>
								
								<!-- User info -->
								<header>
									
									<a class="user-img">
										<img src="/Public/assets/images/user-4.png" alt="user-img" class="img-responsive img-circle" />
									</a>
									
									<div class="user-details">
										<a><?php echo ($vo["name"]); ?></a>.
										<time><?php echo ($vo["time"]); ?></time>
									</div>
									
								</header>
								
								<div class="story-content">
									<!-- Story Content Wrapped inside Paragraph -->
									<p><?php echo ($vo["reply"]); ?></p>
									
									<!-- Story Comments -->
									<ul class="list-unstyled story-comments">
										<?php if(is_array($vo["son"])): foreach($vo["son"] as $key=>$voson): ?><li>
											
											<div class="story-comment">
												<a href="#" class="comment-user-img">
													<img src="/Public/assets/images/user-2.png" alt="user-img" class="img-circle img-responsive" />
												</a>
												
												<div class="story-comment-content">
													<a  class="story-comment-user-name">
														<?php echo ($voson["name"]); ?>
														<time><?php echo ($voson["time"]); ?></time>
													</a>
													
													<p><?php echo ($voson["reply"]); ?></p>
												</div>
											</div>
											
										</li><?php endforeach; endif; ?>
									</ul>
									
									<form method="post" action="" class="story-comment-form" id="discussForm<?php echo $vo['id']; ?>" name="discussForm<?php echo $vo['id']; ?>">
										<div hidden>
											<input type="text hidden" class="form-control" id="token<?php echo $vo['id'];?>" name="token<?php echo $vo['id'];?>" value="<?php echo ($token); ?>">
											<input type="text hideen" class="form-control" id="time<?php echo $vo['id'];?>" name="time<?php echo $vo['id'];?>" value="<?php echo ($time); ?>">
										</div>
										<textarea class="form-control input-unstyled autogrow" placeholder="评论..." onfocus="javascript:showButton(<?php echo $vo['id'];?>)" onblur="javascript:hiddenButton(<?php echo $vo['id'];?>)" id="discuss<?php echo $vo['id']; ?>" name="discuss<?php echo $vo['id']; ?>"></textarea>
									</form>
									<?php if(isset($actions['CREATIVECLUBLISTREPLYDISCUSS'])): ?><div id="dbutton<?php echo $vo['id']; ?>" name="dbutton<?php echo $vo['id']; ?>" hidden="hidden">
											<button type="button" id="btndiscuss<?php echo $vo['id']; ?>" name="btndiscuss<?php echo $vo['id']; ?>" class="btn btn-success btn-single" onclick="javascript:discuss(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBLISTREPLYDISCUSS']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBLISTREPLYDISCUSS']['key'],'id'=>urlsafe_b64encode(authcode($vo['id'],'ENCODE'))))?>">评论</button>
										</div><?php endif; ?>
								</div>
								
							</article><?php endforeach; endif; ?>
							<?php if(strlen($page) != 4): ?><article class="timeline-story">
								
								
								
								
								<div class="story-content">
									<ul class="pagination">
										<?php echo ($page); ?>
									</ul>
								</div>
								
							</article><?php endif; ?>
							<article class="timeline-story">
																
								<div class="story-content">
									<form method="post" class="form-horizontal" id="submitReplyForm" name="submitReplyForm">
										<div class="form-group" id="dcreative">
											<div class="col-sm-12" id="dreply" name="dreply">
												<div hidden>
													<input type="text hidden" class="form-control" id="token" name="token" value="<?php echo ($token); ?>">
													<input type="text hideen" class="form-control" id="time" name="time" value="<?php echo ($time); ?>">	
												</div>
												<textarea class="form-control ckeditor" id="reply" name="reply" rows="5" placeholder="对于这个创意你有什么想法？"></textarea>
											</div>
										</div>
										<?php if(isset($actions['CREATIVECLUBLISTREPLYREPLY'])): ?><a type="button" id="btnreply" name="btnreply" class="btn btn-success btn-single" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBLISTREPLYREPLY']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBLISTREPLYREPLY']['key'],'id'=>urlsafe_b64encode(authcode($creative['id'],'ENCODE'))))?>">回复</a><?php endif; ?>
										
									</form>
								</div>
								
							</article>
							
						</section>
						
					</div>
					
				</div>
		
			</section>
			
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
	<!-- 这以下模板中的JS/CSS/FONT/IMAGES 都直接引用PUBLIC_ 其他的ajax 之类的见开发说明 -->
	<script type="text/javascript" src="/Public/Home/js/Creative/Creative/reply.js"></script>
	<!-- 这以下的是HOME中的第二个不同 详情看模板的最下方的引用 sublimetext中可以ctrl+D批量修改 -->
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
	
</body>
</html>