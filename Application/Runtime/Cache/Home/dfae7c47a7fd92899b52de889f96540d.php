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
							<img src="/efan/Public/assets/images/logo@2x.png" width="80" alt="" />
						</a>
						<a href="dashboard-1.html" class="logo-collapsed">
							<img src="/efan/Public/assets/images/logo-collapsed@2x.png" width="40" alt="" />
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
					<h3 class="panel-title">创意管理</h3>
					
					<!-- 顶部的批量操作按钮在这里 -->
					<div class="panel-options">
						<?php if(isset($actions['CREATIVECLUBADMINDELETE'])): ?><button id="allDelete" class="btn btn-danger btn-xs" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINDELETE']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINDELETE']['key']))?>	">删除</button><?php endif; ?>
						<?php if(isset($actions['CREATIVECLUBADMINOPEN'])): ?><button id="allOpen" class="btn btn-black btn-xs" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINOPEN']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINOPEN']['key']))?>">开启讨论</button><?php endif; ?>
						<?php if(isset($actions['CREATIVECLUBADMINCLOSE'])): ?><button id="allClose" class="btn btn-blue btn-xs" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINCLOSE']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINCLOSE']['key']))?>">关闭讨论</button><?php endif; ?>
						<?php if(isset($actions['CREATIVECLUBADMINCLOSE'])): ?><button id="sendmessage<?php echo $vo['id'];?>" class="btn btn-success btn-xs" onclick="javascript:sendMessage(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINCLOSE']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINCLOSE']['key']))?>">导入禅道</button><?php endif; ?>
						<?php if(isset($actions['CREATIVECLUBADMINPDF'])): ?><button id="studentout<?php echo $vo['id'];?>" class="btn btn-danger btn-xs"  onclick="javascript:studentOut(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINPDF']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINPDF']['key'],'id'=>$vo['id']))?>">保存讨论结果</button><?php endif; ?>
						<?php if(isset($actions['CREATIVECLUBADMINDOWNLOAD'])): ?><button id="studentin<?php echo $vo['id'];?>" class="btn btn-danger btn-xs"  onclick="javascript:studentIn(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINDOWNLOAD']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINDOWNLOAD']['key'],'id'=>$vo['id']))?>">下载讨论结果</button><?php endif; ?>
					</div>
					<!-- 批量操作按钮在这里结束 -->
				</div>
				<div class="panel-body">
					<!-- table 标签顶部的那个菜单或者选择范围从这里开始 -->
					<script>
					jQuery(document).ready(function($)
					{
						$("#creativeLists").dataTable().yadcf([
							{column_number : 1},
							{column_number : 2, filter_type: 'text'},
							{column_number : 3},
							{column_number : 4, filter_type: 'text'},
						]);
					});
					</script>
					<!-- table 标签顶部的那个菜单或者选择范围到这里结束 -->
					<table class="table table-striped table-bordered" id="creativeLists">
						<thead>
							<tr class="replace-inputs">
								<th class="row-selected row-selected"><input id="checkall" type="checkbox" ></th>
								<th>编号</th>
								<th>姓名</th>
								<th>创意类别</th>
								<th>创意名称</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($creativeLists)): foreach($creativeLists as $key=>$vo): ?><tr>
								<td><input class="ids" type="checkbox" name="id" value="<?php echo ($vo["id"]); ?>"></td>
								<td><?php echo ($vo["uid"]); ?></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["group"]); ?></td>
								<td><?php echo ($vo["creativetitle"]); ?></td>
								<td>
									<?php if(isset($actions['CREATIVECLUBADMINEDIT'])): ?><button class="btn btn-success btn-xs"  onclick="window.location.href='<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINEDIT']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINEDIT']['key'],'id'=>urlsafe_b64encode(authcode($vo['id'],'ENCODE'))))?>'">编辑</button><?php endif; ?>
									<?php if(isset($actions['CREATIVECLUBADMINDELETE'])): ?><button id="creativeDelete<?php echo $vo['id'];?>" class="btn btn-danger btn-xs" onclick="javascript:creativeDelete(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINDELETE']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINDELETE']['key']))?>">删除</button><?php endif; ?>
									<?php if(isset($actions['CREATIVECLUBADMINOPEN']) and ($vo["state"] != 1)): ?><button id="creativeOpen<?php echo $vo['id'];?>" class="btn btn-black btn-xs" onclick="javascript:creativeOpen(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINOPEN']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINOPEN']['key']))?>">开启讨论</button><?php endif; ?>
									<?php if(isset($actions['CREATIVECLUBADMINCLOSE']) and ($vo["state"] != 0)): ?><button id="creativeClose<?php echo $vo['id'];?>" class="btn btn-blue btn-xs" onclick="javascript:creativeClose(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINCLOSE']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINCLOSE']['key']))?>">关闭讨论</button><?php endif; ?>
									<?php if(isset($actions['CREATIVECLUBADMINCLOSE']) and ($vo["zentaostate"] == 0)): ?><button id="sendmessage<?php echo $vo['id'];?>" class="btn btn-success btn-xs" onclick="javascript:sendMessage(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINCLOSE']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINCLOSE']['key']))?>">导入禅道</button><?php endif; ?>
									<?php if(empty($vo["pdfurl"])): if(isset($actions['CREATIVECLUBADMINPDF'])): ?><button id="studentout<?php echo $vo['id'];?>" class="btn btn-danger btn-xs"  onclick="javascript:studentOut(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINPDF']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINPDF']['key'],'id'=>$vo['id']))?>">保存讨论结果</button><?php endif; ?>
									<?php else: ?>
										<?php if(isset($actions['CREATIVECLUBADMINDOWNLOAD'])): ?><button id="studentin<?php echo $vo['id'];?>" class="btn btn-danger btn-xs"  onclick="javascript:studentIn(<?php echo $vo['id'];?>)" _href="<?php $str = $Think.INDEX_PATH_NAME.$actions['CREATIVECLUBADMINDOWNLOAD']['url'];echo U($str,array('key'=>$actions['CREATIVECLUBADMINDOWNLOAD']['key'],'id'=>$vo['id']))?>">下载讨论结果</button><?php endif; endif; ?>
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
	<!-- 这以下模板中的JS/CSS/FONT/IMAGES 都直接引用PUBLIC_ 其他的ajax 之类的见开发说明 -->
	<script type="text/javascript" src="/efan/Public/Home/js/Creative/Admin/index.js"></script>
	<!-- 这以下的是HOME中的第二个不同 详情看模板的最下方的引用 sublimetext中可以ctrl+D批量修改 -->
	<link rel="stylesheet" href="/efan/Public/assets/js/datatables/dataTables.bootstrap.css">
	<script src="/efan/Public/assets/js/bootstrap.min.js"></script>
	<script src="/efan/Public/assets/js/TweenMax.min.js"></script>
	<script src="/efan/Public/assets/js/resizeable.js"></script>
	<script src="/efan/Public/assets/js/joinable.js"></script>
	<script src="/efan/Public/assets/js/xenon-api.js"></script>
	<script src="/efan/Public/assets/js/xenon-toggles.js"></script>
	<script src="/efan/Public/assets/js/datatables/js/jquery.dataTables.min.js"></script>
	<script src="/efan/Public/assets/js/datatables/dataTables.bootstrap.js"></script>
	<script src="/efan/Public/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
	<script src="/efan/Public/assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>
	<script src="/efan/Public/assets/js/xenon-custom.js"></script>
</body>
</html>