<!DOCTYPE html> 
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
<!-- kindedit -->

    <title>后台管理</title>
	<link rel="stylesheet" href="/common/backend/css/sccl.css">
	<link rel="stylesheet" type="text/css" href="/common/backend/skin/qingxin/skin.css" id="layout-skin"/>
	<script type="text/javascript" src="/common/login/js/jquery-1.8.2.min.js"></script>
  </head>
  
  <body>
	<div class="layout-admin">
		<header class="layout-header">
			<span class="header-logo">皈依山人</span> 
			<a class="header-menu-btn" href="javascript:;"><i class="icon-font">&#xe600;</i></a>
			<ul class="header-bar">
				<li class="header-bar-role"><a href="/" target="_blank">网站首页</a></li>
				<li class="header-bar-nav">
					<a href="javascript:;">admin<i class="icon-font" style="margin-left:5px;">&#xe60c;</i></a>
					<ul class="header-dropdown-menu">
						<li><a href="javascript:;">个人信息</a></li>
						<li><a href="<?php echo site_url('backend/logout');?>">logout</a></li>
					</ul>
				</li>
				<li class="header-bar-nav"> 
					<a href="javascript:;" title="换肤"><i class="icon-font">&#xe608;</i></a>
					<ul class="header-dropdown-menu right dropdown-skin">
						<li><a href="javascript:;" data-val="qingxin" title="清新">清新</a></li>
						<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
						<li><a href="javascript:;" data-val="molv" title="墨绿">墨绿</a></li>
						
					</ul>
				</li>
			</ul>
		</header>
		<aside class="layout-side">
			<ul class="side-menu">
			  
		 	</ul>
		</aside>
		
		<div class="layout-side-arrow"><div class="layout-side-arrow-icon"><i class="icon-font">&#xe60d;</i></div></div>
		
		<section class="layout-main">
			<div class="layout-main-tab">
				<button class="tab-btn btn-left"><i class="icon-font">&#xe60e;</i></button>
                <nav class="tab-nav">
                    <div class="tab-nav-content">
                        <a href="home" class="content-tab active" data-id="home.html">首页</a>
                        <a href="javascript:;" class="content-tab" data-id="home.html">最近更新</a>
                        <a href="javascript:;" class="content-tab" data-id="home.html">study</a>
                        <a href="javascript:;" class="content-tab" data-id="home.html">摘录</a>
                        <a href="javascript:;" class="content-tab" data-id="home.html">music</a>
                        <a href="javascript:;" class="content-tab" data-id="home.html">留言</a>

                    </div>
                
                </nav>
                <button class="tab-btn btn-right"><i class="icon-font">&#xe60f;</i></button>
			</div>
			<div class="layout-main-body">
				<iframe class="body-iframe" name="iframe0" width="100%" height="99%" src="backend/index/view/home" frameborder="0" data-id="home.php" seamless></iframe>
			</div>
		</section>
		<div class="layout-footer">@2016 0.1 www.mycodes.net</div>
	</div>
	<script type="text/javascript" src="/common/backend/lib/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="/common/backend/js/sccl.js"></script>
	<script type="text/javascript">
		/*
  初始化加载
*/
$(function(){
	/*获取皮肤*/
	getSkinByCookie();
 
	/*菜单json*/
	var menu = [{"id":"1","name":"常用操作"," parentId":"0","url":"","icon":"","order":"1","isHeader":"1","childMenus":[
					{"id":"3","name":"菜单管理","parentId":"1","url":"","icon":"&#xe604;","order":"1","isHeader":"0","childMenus":[
						{"id":"4","name":"菜单","parentId":"3","url":"backend/index/view/menu","icon":"","order":"1","isHeader":"0","childMenus":""},                                                                					
						{"id":"5","name":"分类设置","parentId":"3","url":"","icon":"","order":"1","isHeader":"0","childMenus":[
							{"id":"6","name":"总分类","parentId":"5","url":"backend/index/view/category","icon":"","order":"1","isHeader":"0","childMenus":""},
							{"id":"7","name":"菜单分类","parentId":"5","url":"backend/index/view/menu_category","icon":"","order":"1","isHeader":"0","childMenus":""}
							]},
						{"id":"8","name":"友情链接","parentId":"3","url":"","icon":"","order":"1","isHeader":"0","childMenus":""}
						
					]},
					{"id":"12","name":"文章管理","parentId":"1","url":"","icon":"&#xe602;","order":"1","isHeader":"0","childMenus":[
						{"id":"13","name":"浏览文章","parentId":"6","url":"home3.html","icon":"","order":"1","isHeader":"0","childMenus":""},
						{"id":"14","name":"增加文章","parentId":"6","url":"backend/index/view/c_article","icon":"","order":"1","isHeader":"0","childMenus":""}
					]},
					{"id":"15","name":"留言处理","parentId":"1","url":"","icon":"&#xe602;","order":"1","isHeader":"0","childMenus":[
						{"id":"16","name":"浏览文章","parentId":"13","url":"home3.html","icon":"","order":"1","isHeader":"0","childMenus":""},
						{"id":"17","name":"增加文章","parentId":"13","url":"index/view/c_article","icon":"","order":"1","isHeader":"0","childMenus":""}
					]}

				]},
				/*{"id":"2","name":"框架案例","parentId":"0","url":"","icon":"","order":"2","isHeader":"1","childMenus":[
					{"id":"9","name":"新功能","parentId":"2","url":"","icon":"","order":"1","isHeader":"0","childMenus":""},
					{"id":"10","name":"多级","parentId":"2","url":"","icon":"","order":"1","isHeader":"0","childMenus":[
						{"id":"11","name":"一级","parentId":"10","url":"","icon":"","order":"1","isHeader":"0","childMenus":""},
						{"id":"12","name":"一级","parentId":"10","url":"","icon":"","order":"1","isHeader":"0","childMenus":[
							{"id":"13","name":"二级","parentId":"12","url":"","icon":"","order":"1","isHeader":"0","childMenus":""},
							{"id":"14","name":"二级","parentId":"12","url":"","icon":"","order":"1","isHeader":"0","childMenus":[
								{"id":"15","name":"三级","parentId":"14","url":"","icon":"","order":"1","isHeader":"0","childMenus":""},
								{"id":"16","name":"三级","parentId":"14","url":"","icon":"","order":"1","isHeader":"0","childMenus":[
									{"id":"17","name":"四级","parentId":"16","url":"","icon":"","order":"1","isHeader":"0","childMenus":""},
									{"id":"18","name":"四级","parentId":"16","url":"","icon":"","order":"1","isHeader":"0","childMenus":""}
								]}
							]}
						]}
					]}
				]}*/

				];
	initMenu(menu,$(".side-menu"));
	$(".side-menu > li").addClass("menu-item");
	
	/*获取菜单icon随机色*/
	getMathColor();
}); 
	</script>
	<script type="text/javascript" src="/common/backend/js/sccl-util.js"></script>
  </body>
</html>
