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

	<link href="/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/statics/js/jquery.js"></script>
    <script src="/statics/js/wind.js"></script>
    <script src="/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
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
        <li class="active"><a href="javascript:;">专家列表</a></li>
        <li><a href="<?php echo U('Expert/add');?>" target="_self">添加专家</a></li>
        <li><a href="<?php echo U('Expert/expert_type');?>" target="_self">专家分类</a></li>
    </ul>
    <form class="well form-search" method="post" action="<?php echo U('Expert/index');?>">
        <div class="search_type cc mb10">
            <div class="mb10">
					<span class="mr20">
						<!--<select class="select_2" name="term">-->
                            <!--<option value='0'>全部</option><?php echo ($taxonomys); ?>-->
                        <!--</select> &nbsp;&nbsp;-->
						<!--时间：-->
						<!--<input type="text" name="start_time" class="J_date" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" style="width: 80px;" autocomplete="off">--->
						<!--<input type="text" class="J_date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width: 80px;" autocomplete="off"> &nbsp; &nbsp;-->
						姓名：
						<input type="text" name="name" style="width: 200px;" value="<?php echo ($search["name"]); ?>" placeholder="请输入姓名...">
						<input type="submit" class="btn btn-primary" value="搜索" />
					</span>
            </div>
        </div>
    </form>
    <form class="J_ajaxForm" action="" method="post">
        <div class="table-actions">
            <!--<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('AdminPost/listorders');?>">排序</button>-->
            <!--<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('AdminPost/check',array('check'=>1));?>" data-subcheck="true">审核</button>-->
            <!--<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('AdminPost/check',array('uncheck'=>1));?>" data-subcheck="true">取消审核</button>-->
            <!--<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('AdminPost/top',array('top'=>1));?>" data-subcheck="true">置顶</button>-->
            <!--<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('AdminPost/top',array('untop'=>1));?>" data-subcheck="true">取消置顶</button>-->
            <!--<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('AdminPost/recommend',array('recommend'=>1));?>" data-subcheck="true">推荐</button>-->
            <!--<button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('AdminPost/recommend',array('unrecommend'=>1));?>" data-subcheck="true">取消推荐</button>-->
            <button class="btn btn-primary btn-small J_ajax_submit_btn" type="submit" data-action="<?php echo U('Expert/delete');?>" data-subcheck="true" data-msg="你确定删除吗？">删除</button>
        </div>
        <table class="table table-hover table-bordered table-list">
            <thead>
            <tr>
                <th width="15"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
                <th width="50">排序</th>
                <th width="50">姓名</th>
                <th width="50">专家类别</th>
                <th width="50">职务</th>
                <th width="50">介绍</th>
                <th width="50">照片</th>
                <th width="50">格言</th>
                <th width="50">修改时间</th>
                <th width="50">状态</th>
                <th width="60">操作</th>
            </tr>
            </thead>
            <?php if(is_array($experts)): foreach($experts as $key=>$vo): ?><tr>
                    <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["id"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td>
                    <td><input name="" class="input input-order" type="text" size="5" value="ID:<?php echo ($vo["id"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td>
                    <td> <span><?php echo ($vo["name"]); ?></span></td>
                    <?php $expert_type = $types[$vo['expert_type']]; ?>
                    <td><?php echo ($expert_type); ?></td>
                    <td><?php echo ($vo["position"]); ?></td>
                    <td><?php echo ($introduce = empty($vo['introduce'])?"未填写":'已填写'); ?></td>
                    <?php if(!empty($vo['photo'])){ ?>
                    <td><a href="<?php echo ($vo["photo"]); ?>" target='_blank'>点击查看</a></td>
                    <?php }else{ ?>
                    <td>未上传</td>
                    <?php } ?>

                    <td><?php echo ($motto = empty($vo['motto'])?"未填写":'已填写'); ?></a></td>
                    <td><?php echo ($vo["update_time"]); ?></td>
                    <td><?php echo ($top = ($vo['is_top']== 0)?"未置顶":'已置顶'); ?></td>
                    <td>
                        <a href="<?php echo U('Expert/edit',array('id'=>$vo['id']));?>">修改</a>
                        <a href="<?php echo U('Expert/delete',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>

            <tfoot>

            </tfoot>
        </table>
        <div class="pagination"><?php echo ($Page); ?></div>

    </form>
</div>
<script src="/statics/js/common.js"></script>

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