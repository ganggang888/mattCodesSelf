
<?php
use yii\helpers\Url;
?>
<body style="min-width:900px;" screen_capture_injected="true">
<div id="loading"><i class="loadingicon"></i><span>正在加载...</span></div>
<div id="right_tools_wrapper">
    <!--<span id="right_tools_clearcache" title="清除缓存" onclick="javascript:openapp('/cmf/index.php?g=admin&m=setting&a=clearcache','right_tool_clearcache','清除缓存');"><i class="fa fa-trash-o right_tool_icon"></i></span>-->
    <span id="refresh_wrapper" title="刷新当前页" ><i class="fa fa-refresh right_tool_icon"></i></span>
</div>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a href="/cmf/index.php?g=admin&m=index&a=index" class="brand"> <small>
                    <img src="/cmf/statics/images/icon/logo-18.png">
                    ThinkCMF 后台
                </small>
            </a>
            <div class="pull-left nav_shortcuts" >

                <a class="btn btn-small btn-warning" href="/cmf/" title="前台首页" target="_blank">
                    <i class="fa fa-home"></i>
                </a>

                <a class="btn btn-small btn-success" href="javascript:openapp('/cmf/index.php?g=portal&m=AdminTerm&a=index','index_termlist','分类管理');" title="分类管理">
                    <i class="fa fa-th"></i>
                </a>
                <a class="btn btn-small btn-info" href="javascript:openapp('/cmf/index.php?g=portal&m=AdminPost&a=index','index_postlist','文章管理');" title="文章管理">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-small btn-danger" href="javascript:openapp('/cmf/index.php?g=admin&m=setting&a=clearcache','index_clearcache','清除缓存');" title="清除缓存">
                    <i class="fa fa-trash-o"></i>
                </a>				</div>
            <ul class="nav simplewind-nav pull-right">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/cmf/statics/images/icon/logo-18.png" alt="admin">
							<span class="user-info">
								<small>欢迎,</small>admin							</span>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                        <li><a href="javascript:openapp('/cmf/index.php?g=Admin&m=setting&a=site','index_site','站点管理');"><i class="fa fa-cog"></i> 站点管理</a></li>							<li><a href="javascript:openapp('/cmf/index.php?g=Admin&m=user&a=userinfo','index_userinfo','个人资料');"><i class="fa fa-user"></i> 个人资料</a></li>							<li><a href="/cmf/index.php?g=Admin&m=Public&a=logout"><i class="fa fa-sign-out"></i> 退出</a></li>
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
<div id="nav_wraper">
<ul class="nav nav-list">
<li>
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-cogs normal"></i>
        <span class="menu-text normal">设置</span>
        <b class="arrow fa fa-angle-right normal"></b>
        <i class="fa fa-reply back"></i>
        <span class="menu-text back">返回</span>

    </a>

    <ul  class="submenu">
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">个人信息</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>
            <ul  class="submenu">
                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=User&a=userinfo&menuid=111','111Admin','修改信息');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">修改信息</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Setting&a=password&menuid=113','113Admin','修改密码');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">修改密码</span>
                    </a>
                </li>

            </ul>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Setting&a=site&menuid=115','115Admin','网站信息');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">网站信息</span>
            </a>

        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">邮箱配置</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>
            <ul  class="submenu">
                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Mailer&a=index&menuid=127','127Admin','SMTP配置');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">SMTP配置</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Mailer&a=active&menuid=129','129Admin','邮件模板');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">邮件模板</span>
                    </a>
                </li>

            </ul>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Setting&a=clearcache&menuid=131','131Admin','清除缓存');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">清除缓存</span>
            </a>

        </li>

    </ul>

</li>

<li>
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-group normal"></i>
        <span class="menu-text normal">用户管理</span>
        <b class="arrow fa fa-angle-right normal"></b>
        <i class="fa fa-reply back"></i>
        <span class="menu-text back">返回</span>

    </a>

    <ul  class="submenu">
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">用户组</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>
            <ul  class="submenu">
                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=User&m=Indexadmin&a=index&menuid=134','134User','本站用户');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">本站用户</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=User&m=Oauthadmin&a=index&menuid=137','137User','第三方用户');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">第三方用户</span>
                    </a>
                </li>

            </ul>

        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">管理组</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>
            <ul  class="submenu">
                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Rbac&a=index&menuid=140','140Admin','角色管理');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">角色管理</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=User&a=index&menuid=149','149Admin','管理员');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">管理员</span>
                    </a>
                </li>

            </ul>

        </li>

    </ul>

</li>

<li>
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-list normal"></i>
        <span class="menu-text normal">菜单管理</span>
        <b class="arrow fa fa-angle-right normal"></b>
        <i class="fa fa-reply back"></i>
        <span class="menu-text back">返回</span>

    </a>

    <ul  class="submenu">
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">前台菜单</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>
            <ul  class="submenu">
                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Nav&a=index&menuid=87','87Admin','菜单管理');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">菜单管理</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Navcat&a=index&menuid=94','94Admin','菜单分类');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">菜单分类</span>
                    </a>
                </li>

            </ul>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Menu&a=index&menuid=100','100Admin','后台菜单');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">后台菜单</span>
            </a>

        </li>

    </ul>

</li>

<li>
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-th normal"></i>
        <span class="menu-text normal">内容管理</span>
        <b class="arrow fa fa-angle-right normal"></b>
        <i class="fa fa-reply back"></i>
        <span class="menu-text back">返回</span>

    </a>

    <ul  class="submenu">
        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Api&m=Guestbookadmin&a=index&menuid=2','2Api','所有留言');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">所有留言</span>
            </a>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Comment&m=Commentadmin&a=index&menuid=4','4Comment','评论管理');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">评论管理</span>
            </a>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Portal&m=AdminPost&a=index&menuid=7','7Portal','文章管理');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">文章管理</span>
            </a>

        </li>

        <li>
            <a href="javascript:openapp('<?=Url::to(['classification/index']);?>','18Portal','分类管理');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">分类管理</span>
            </a>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Portal&m=AdminPage&a=index&menuid=25','25Portal','页面管理');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">页面管理</span>
            </a>

        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">回收站</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>
            <ul  class="submenu">
                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Portal&m=AdminPost&a=recyclebin&menuid=33','33Portal','文章回收');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">文章回收</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Portal&m=AdminPage&a=recyclebin&menuid=36','36Portal','页面回收');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">页面回收</span>
                    </a>
                </li>

            </ul>

        </li>

    </ul>

</li>

<li>
    <a href="#" class="dropdown-toggle">
        <i class="fa fa-cloud normal"></i>
        <span class="menu-text normal">扩展工具</span>
        <b class="arrow fa fa-angle-right normal"></b>
        <i class="fa fa-reply back"></i>
        <span class="menu-text back">返回</span>

    </a>

    <ul  class="submenu">
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">备份管理</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>
            <ul  class="submenu">
                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Backup&a=restore&menuid=41','41Admin','数据还原');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">数据还原</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Backup&a=index&menuid=42','42Admin','数据备份');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">数据备份</span>
                    </a>
                </li>

            </ul>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Plugin&a=index&menuid=47','47Admin','插件管理');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">插件管理</span>
            </a>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Storage&a=index&menuid=156','156Admin','文件存储');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">文件存储</span>
            </a>

        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">幻灯片</span>
                <b class="arrow fa fa-angle-right"></b>
            </a>
            <ul  class="submenu">
                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Slide&a=index&menuid=54','54Admin','幻灯片管理');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">幻灯片管理</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Slidecat&a=index&menuid=62','62Admin','幻灯片分类');">
                        &nbsp;<i class="fa fa-angle-double-right"></i>
                        <span class="menu-text">幻灯片分类</span>
                    </a>
                </li>

            </ul>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Ad&a=index&menuid=68','68Admin','网站广告');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">网站广告</span>
            </a>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Admin&m=Link&a=index&menuid=75','75Admin','友情链接');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">友情链接</span>
            </a>

        </li>

        <li>
            <a href="javascript:openapp('/cmf/index.php?g=Api&m=Oauthadmin&a=setting&menuid=83','83Api','第三方登陆');">
                <i class="fa fa-caret-right"></i>
                <span class="menu-text">第三方登陆</span>
            </a>

        </li>

    </ul>

</li>

</ul>
</div>

</div>

<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <a id="task-pre" class="task-changebt">←</a>
        <div id="task-content">
            <ul class="macro-component-tab" id="task-content-inner">
                <li class="macro-component-tabitem noclose" app-id="0" app-url="/cmf/index.php?g=Admin&m=main&a=index" app-name="首页">
                    <span class="macro-tabs-item-text">首页</span>
                </li>
            </ul>
            <div style="clear:both;"></div>
        </div>
        <a id="task-next" class="task-changebt">→</a>
    </div>

    <div class="page-content" id="content">
        <iframe src="/cmf/index.php?g=Admin&m=Main&a=index" style="width:100%;height: 100%;" frameborder="0" id="appiframe-0" class="appiframe"></iframe>
    </div>
</div>
</div>

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
<script src="/cmf/tpl_admin/simpleboot/assets/js/index.js"></script>





</body>