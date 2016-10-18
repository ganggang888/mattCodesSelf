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
</head>
<body class="J_scroll_fixed">
	<div class="wrap J_check_wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;">教师列表</a></li>
			<li><a href="<?php echo U('Elective/add');?>">添加教师信息</a></li>
		</ul>
		<form method="post" class="J_ajaxForm" action="<?php echo U('Link/listorders');?>">
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
                    <th>ID</th>
						<th>姓名</th>
						<th>性别</th>
						<th>年龄</th>
						<th>工作经验</th>
                        <th>头像</th>
                        <th>证书</th>
                        <th>格言</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
                    <td><?php echo ($vo["id"]); ?></td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["sex"]); ?></td>
						<td><?php echo ($vo["age"]); ?></td>
						<td><?php echo ($vo["experience"]); ?></td>
                        <td>
                        <?php if($vo['img']): ?><img src="<?php echo ($vo["img"]); ?>" width="150" />
                        <?php else: ?>
                        无<?php endif; ?>
                        </td>
                        <td><?php echo ($vo["certificate"]); ?></td>
                        <td><?php echo ($vo["motto"]); ?></td>
						<td>
							<a href="<?php echo U('Elective/edit_teacher',array('id'=>$vo['id']));?>">修改</a>|
							<a href="<?php echo U('Elective/delete_teacher',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a>
						</td>
					</tr><?php endforeach; endif; ?>
				</tbody>
				<tfoot>
				</tfoot>
			</table>
            <div class="pagination"><?php echo ($page); ?></div>
	  </form>
	</div>
	<script src="/school/statics/js/common.js?"></script>
</body>
</html>