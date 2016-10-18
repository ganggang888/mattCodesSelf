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

	<link href="/group/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/group/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/group/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/group/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/group/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/group/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/group/public/js/jquery.js"></script>
    <script src="/group/public/js/wind.js"></script>
    <script src="/group/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
	<div class="wrap J_check_wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;">疫苗列表</a></li>
			<li><a href="<?php echo U('Vaccine/add');?>">添加疫苗</a></li>
		</ul>

		<form class="well form-search">
			<div class="search_type cc mb10">
				<div class="mb10">
					<span class="mr20">
						名称： 
						<input type="text" name="name" id="name" style="width: 200px;" value="<?php echo ($name); ?>" placeholder="请输入名称..."> --
						月份：
						<select name="month" id="month">
						
							<?php for($i=0;$i<=36;$i++) { ?>
							<option value="<?php echo ($i); ?>" <?php if($month == $i): ?>selected="selected"<?php endif; ?>><?php echo ($i); ?>月份</option>
							<?php } ?>
						</select>
						<a href="javascript:;" onClick="todo()" class="btn btn-primary">搜索</a>
					</span>
					<script>
					function todo() {
						var name = $("#name").val();
						var month = $("#month").val();
						window.location.href='index.php?g=Admin&m=Vaccine&a=index&name='+name+'&month='+month;
					}
					</script>
				</div>
			</div>
		</form>
		<form class="form-horizontal J_ajaxForm" action="" method="post">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="100">ID</th>
						<th>疫苗名称</th>
                        <th>疫苗类别</th>
                        <th>适应月龄</th>
                        <th>是否必要</th>
                        <th>疫苗作用</th>
                        <th>禁忌症</th>
						<th width="120">时间</th>
						<th width="120">操作</th>
					</tr>
				</thead>
				<?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["type"]); ?>类</td>
                    <td><?php echo ($vo["required_months"]); ?>月龄</td>
                    <th>
                    <?php if($vo['is_necessary'] == 1): ?>必要
                    <?php else: ?>
                    可替代<?php endif; ?></th>
                    <td><?php echo ($vo["detail_field_3"]); ?></td>
                    <td><?php echo ($vo["detail_field_4"]); ?></td>
					<td>
					<?php echo ($vo["update_time"]); ?>
					</td>
					<td>
						<a href="<?php echo U('Vaccine/edit',array('id'=>$vo['id']));?>">修改</a>|
						<a href="<?php echo U('Vaccine/delete',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a>
	
					</td>
				</tr><?php endforeach; endif; ?>
			</table>
		</form>
        <div class="pagination"><?php echo ($page); ?></div>
	</div>
	<script src="/group/statics/js/common.js"></script>
	<script>
		$(function() {

			$("#navcid_select").change(function() {
				$("#mainform").submit();
			});

		});
	</script>
</body>
</html>