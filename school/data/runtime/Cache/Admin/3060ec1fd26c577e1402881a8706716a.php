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
        <li ><a href="<?php echo U('Sdtmain/index');?>">学员列表</a></li>
        <li class="active"><a href="<?php echo U('Sdtmain/add');?>" target="_self">工作经历</a></li>
    </ul>
    <form class="J_ajaxForm" action="" method="post">
        <div class="search_type cc mb10">
            <div class="well form-search">
					<span class="mr20">
						<p style="font-size: 20px;margin: 0 0 0px"><?php echo ($name); ?></p>
					</span>
            </div>
        </div>
        <table class="table table-hover table-bordered table-list">
            <thead>
            <tr>
                <th width="15"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
                <th width="15">排序</th>
                <th width="50">开始时间</th>
                <th width="50">结束时间</th>
                <th width="50">工作地点</th>
                <th width="30">宝宝月龄</th>
                <th width="50">宝宝性别</th>
                <th width="50">备注</th>
                <th width="60">操作</th>
            </tr>
            </thead>
            <?php if(is_array($works)): foreach($works as $key=>$vo): ?><tr>
                    <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["id"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td>
                    <td><input name="" class="input input-order" type="text" size="5" value="ID:<?php echo ($vo["id"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td>
                    <td> <span><?php echo ($vo["from_time"]); ?></span></td>
                    <td> <span><?php echo ($vo["to_time"]); ?></span></td>
                    <td> <?php echo ($vo["work_address"]); ?></td>
                    <td> <?php echo ($vo["baby_month"]); ?>个月</td>
                    <td><?php echo ($gender = ($vo['baby_gender'] == 0)?'女':'男'); ?></td>
                    <td>
                        <?php if(!empty($vo['remark'])): ?>已填写
                            <?php else: ?>
                            未填写<?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo U('Sdtmain/work_edit',array('id'=>$vo['id']));?>">修改</a>
                        <a href="<?php echo U('Sdtmain/work_delete',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>

            <tfoot>

            </tfoot>
        </table>
        <div class="table-actions">
            <button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('Sdtmain/work_delete');?>" data-subcheck="true" data-msg="你确定删除吗？">批量删除</button>
        </div>
        <div class="pagination"><?php echo ($Page); ?></div>

    </form>
</div>
<script src="/school/statics/js/common.js"></script>

<script type="text/javascript">
    function refersh_window() {
        var refersh_time = getCookie('refersh_time');
        if (refersh_time == 1) {
            window.location = "<?php echo U('Certificate/index',$formget);?>";
        }
    }
    setInterval(function() {
        refersh_window();
    }, 2000);
    $(function() {
        setCookie("refersh_time", 0);
        Wind.use('ajaxForm', 'artDialog', 'iframeTools', function() {
            //批量移动
        });
    });
</script>
</body>
</html>