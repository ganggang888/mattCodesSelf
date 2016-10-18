<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/school/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/school/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/school/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/school/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/school/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/school/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/school/statics/js/jquery.js"></script>
    <script src="/school/statics/js/wind.js"></script>
    <script src="/school/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<link href="/statics/simpleboot/css/pager.css" rel="stylesheet" type="text/css">
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo U('Sdtmain/index');?>">学员列表</a></li>
        <li class="active"><a href="javascript:;">在校表现</a></li>
    </ul>
    <form class="J_ajaxForm" action="" method="post">
        <div class="search_type cc mb10">
            <div class="well form-search">
					<span class="mr20">
						<p style="font-size: 20px;margin: 0 0 0px"><?php echo ($student["name"]); ?></p>
					</span>
            </div>
        </div>
        <table class="table table-hover table-bordered table-list treeTable" id="menus-table">
            <thead>
            <tr>
                <th width="15">ID</th>
                <th width="50">课程</th>
                <th width="50">状态</th>
                <th width="50">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php echo ($categorys); ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <div class="pagination"><?php echo ($Page); ?></div>

    </form>
</div>
<script src="/school/statics/js/common.js"></script>

<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            Wind.css('treeTable');
            Wind.use('treeTable', function() {
                $("#menus-table").treeTable({
                    indent : 20
                });
            });
        });
    function refersh_window() {
        var refersh_time = getCookie('refersh_time');
        if (refersh_time == 1) {
            window.location = "<?php echo U('Certificate/index',$formget);?>";
        }
    }
    setInterval(function() {
        refersh_window();
    }, 2000);


        setCookie("refersh_time", 0);
        Wind.use('ajaxForm', 'artDialog', 'iframeTools', function() {
            //批量移动
        });
    });
</script>
</body>
</html>