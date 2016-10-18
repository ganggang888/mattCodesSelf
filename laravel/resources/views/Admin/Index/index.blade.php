<!DOCTYPE html>
<!-- saved from url=(0044)http://m.matteducation.com/index.php?g=admin -->
<html lang="zh_CN" style="overflow: hidden;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Set render engine for 360 browser -->
<meta name="renderer" content="webkit">
<meta charset="utf-8">
<title>上海麦忒</title>
<meta name="description" content="This is page-header (.page-header &gt; h1)">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/css/theme.min.css" rel="stylesheet">
<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if IE 7]>
	<link rel="stylesheet" href="/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
<![endif]-->
<link rel="stylesheet" href="/css/simplebootadminindex.min.css?">
<!--[if lte IE 8]>
	<link rel="stylesheet" href="/statics/simpleboot/css/simplebootadminindex-ie.css?" />
<![endif]-->
<style>
.navbar .nav_shortcuts .btn {
	margin-top: 5px;
}
/*-----------------导航hack--------------------*/
.nav-list>li.open {
	position: relative;
}
.nav-list>li.open .back {
	display: none;
}
.nav-list>li.open .normal {
	display: inline-block !important;
}
.nav-list>li.open a {
	padding-left: 7px;
}
.nav-list>li .submenu>li>a {
	background: #fff;
}
.nav-list>li .submenu>li a>[class*="fa-"]:first-child {
	left: 20px;
}
.nav-list>li ul.submenu ul.submenu>li a>[class*="fa-"]:first-child {
	left: 30px;
}
/*----------------导航hack--------------------*/
</style>
<script>
//全局变量
var GV = {
	HOST:"/hou/",
    DIMAUB: "/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<style>
#think_page_trace_open {
	left: 0 !important;
	right: initial !important;
}
</style>
</head>

<body style="min-width:900px;" screen_capture_injected="true">
<div id="loading" style="display: none;"><i class="loadingicon"></i><span>正在加载...</span></div>
<div id="right_tools_wrapper"> 
  <!--<span id="right_tools_clearcache" title="清除缓存" onclick="javascript:openapp('/admin/setting/clearcache','right_tool_clearcache','清除缓存');"><i class="fa fa-trash-o right_tool_icon"></i></span>--> 
  <span id="refresh_wrapper" title="刷新当前页"><i class="fa fa-refresh right_tool_icon"></i></span> </div>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container-fluid"> <a href="http://m.matteducation.com/index.php?g=admin&m=index&a=index" class="brand"> <small> <img src="./css/logo-18.png"> 麦忒 后台 </small> </a>
      <div class="pull-left nav_shortcuts"> <a class="btn btn-small btn-warning" href="http://m.matteducation.com/" title="前台首页" target="_blank"> <i class="fa fa-home"></i> </a> <a class="btn btn-small btn-info" href="javascript:openapp('/portal/AdminPost/index','index_postlist','文章管理');" title="文章管理"> <i class="fa fa-pencil"></i> </a> </div>
      <ul class="nav simplewind-nav pull-right">
        <li class="light-blue"> <a data-toggle="dropdown" href="http://m.matteducation.com/index.php?g=admin#" class="dropdown-toggle"> <img class="nav-user-photo" src="./css/logo-18.png" alt="gang"> <span class="user-info"> <small>欢迎,</small>gang </span> <i class="fa fa-caret-down"></i> </a>
          <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
            <li><a href="javascript:openapp('/Admin/user/userinfo','index_userinfo','个人资料');"><i class="fa fa-user"></i> 个人资料</a></li>
            <li><a href="http://m.matteducation.com/Admin/Public/logout"><i class="fa fa-sign-out"></i> 退出</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="main-container container-fluid">
  <div class="sidebar" id="sidebar"> 
    <!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
			</div> -->
    <div id="nav_wraper" style="height: 666px; overflow: auto;">
      <ul class="nav nav-list">
        <?php
        echo getsubmenu($array);
		?>
      </ul>
    </div>
  </div>
  <div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs"> <a id="task-pre" class="task-changebt" style="display: none;">←</a>
      <div id="task-content" style="width: 118px;">
        <ul class="macro-component-tab" id="task-content-inner" style="width: 118px;">
          <li class="macro-component-tabitem noclose" app-id="0" app-url="/Admin/main/index" app-name="首页"> <span class="macro-tabs-item-text">首页</span> </li>
        </ul>
        <div style="clear:both;"></div>
      </div>
      <a id="task-next" class="task-changebt" style="display: none;">→</a> </div>
    <div class="page-content" id="content" style="height: 625px;">
      <iframe src="./css/index.htm" style="width:100%;height: 100%;" frameborder="0" id="appiframe-0" class="appiframe"></iframe>
    </div>
  </div>
</div>
<script src="/css/jquery.js"></script> 
<script src="/css/bootstrap.min.js"></script> 
<script>
	var ismenumin = $("#sidebar").hasClass("menu-min");
	$(".nav-list").on( "click",function(event) {
		var closest_a = $(event.target).closest("a");
		if (!closest_a || closest_a.length == 0) {
			return
		}
		if (!closest_a.hasClass("dropdown-toggle")) {
			if (ismenumin && "click" == "tap" && closest_a.get(0).parentNode.parentNode == this) {
				var closest_a_menu_text = closest_a.find(".menu-text").get(0);
				if (event.target != closest_a_menu_text && !$.contains(closest_a_menu_text, event.target)) {
					return false
				}
			}
			return
		}
		var closest_a_next = closest_a.next().get(0);
		if (!$(closest_a_next).is(":visible")) {
			var closest_ul = $(closest_a_next.parentNode).closest("ul");
			if (ismenumin && closest_ul.hasClass("nav-list")) {
				return
			}
			closest_ul.find("> .open > .submenu").each(function() {
						if (this != closest_a_next && !$(this.parentNode).hasClass("active")) {
							$(this).slideUp(150).parent().removeClass("open")
						}
			});
		}
		if (ismenumin && $(closest_a_next.parentNode.parentNode).hasClass("nav-list")) {
			return false;
		}
		$(closest_a_next).slideToggle(150).parent().toggleClass("open");
		return false;
	});
	</script> 
<script src="/css/index.js"></script>
<?php
function getsubmenu($submenus)
{
	$info = '';
	foreach($submenus as $menu) {
		$url = "/".$menu['app']."/".$menu['model']."/".$menu['action'];
		$info .= "<li>";
		if (empty($menu["icon"])) {
			$menu["icon"] = "desktop";
		}
		
		if(empty($menu['children'])) {
			$info .= "<a href=\"javascript:openapp('".$url."','".$menu["id"]."','".$menu["name"]."');\"><i class='".$menu['icon']."'></i><span class=\"menu-text\">".$menu['name']."</span></a>";
		} else {
			$info .= "<a href='#' class='dropdown-toggle'><i class='fa fa-".$menu['icon']." normal'></i><span class='menu-text normal'>".$menu['name']."</span><b class='arrow fa fa-angle-right normal'></b><i class=\"fa fa-reply back\"></i><span class='menu-text back'>返回</span></a><ul  class='submenu'>".getsubmenu1((array)$menu['children'])."</ul></li>";
		}
	}
	return $info;
}

function getsubmenu1($submenus)
{
	$info = '';
	foreach($submenus as $menu){
		$url = "/".$menu['app']."/".$menu['model']."/".$menu['action'];
		if ($menu['icon'] == '') {
			$menu['icon'] = 'desktop';
		}
		$info .= "<li>";
		if(empty($menu['children'])){
			$info .= "<a href=\"javascript:openapp('".$url."','".$menu["id"]."','".$menu["name"]."');\"><i class='fa fa-caret-right'></i><span class='menu-text'>".$menu['name']."</span></a>";
		} else {
			$info .= "<a href='#' class='dropdown-toggle'><i class='fa fa-caret-right'></i><span class='menu-text'>".$menu['name']."</span><b class='arrow fa fa-angle-right'></b></a><ul  class='submenu'>".getsubmenu2((array)$menu['children'])."</ul></li>";
		}
	}
	return $info;
}

function getsubmenu2($submenus)
{
	$info = '';
	foreach($submenus as $menu){
		$url = "/".$menu['app']."/".$menu['model']."/".$menu['action'];
		if ($menu['icon'] == '') {
			$menu['icon'] = 'desktop';
		}
		$info .= "<li><a href=\"javascript:openapp('".$url."','".$menu["id"]."','".$menu["name"]."');\">&nbsp;<i class='fa fa-caret-right'></i><span class='menu-text'>".$menu['name']."</span></a>
		</li>";
	}
	return $info;
}
?>
</body>
</html>