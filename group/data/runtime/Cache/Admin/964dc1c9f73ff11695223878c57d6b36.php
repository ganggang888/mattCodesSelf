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
			<li class="active"><a href="javascript:;">孕期列表</a></li>
		</ul>

		<form class="well form-search">
			<div class="search_type cc mb10">
				<div class="mb10">
					<span class="mr20">
						
						周数：
						<select name="week" id="week">
						<option value="0">所有</option>
							<?php for($i=1;$i<=40;$i++) { ?>
							<option value="<?php echo ($i); ?>" <?php if($week == $i): ?>selected="selected"<?php endif; ?>>第<?php echo ($i); ?>周</option>
							<?php } ?>
						</select>
						<a href="javascript:;" onClick="todo()" class="btn btn-primary">搜索</a>
					</span>
					<script>
					function todo() {
						var week = $("#week").val();
						window.location.href='index.php?g=Admin&m=Pregnancy&a=index&week='+week;
					}
					</script>
				</div>
			</div>
		</form>
		<form class="form-horizontal J_ajaxForm" action="" method="post">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>周数</th>
                        <th>宝宝身高</th>
                        <th>宝宝体重</th>
                        <th>本周信息</th>
                        <th>准妈妈变化</th>
                        <th>每日任务</th>
						<th>时间</th>
						<th >操作</th>
					</tr>
				</thead>
				<?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["week"]); ?></td>
                    <td><?php echo ($vo["height"]); ?></td>
                    <td><?php echo ($vo["weight"]); ?></td>
                    <th><?php echo ($vo["baby_message"]); ?></th>
                    <td><?php echo ($vo["mother_info"]); ?></td>
                    <td><?php echo ($vo["taskall"]); ?></td>
					<td>
					<?php echo ($vo["add_time"]); ?>
					</td>
					<td>
						<a href="<?php echo U('Pregnancy/edit',array('id'=>$vo['id']));?>">修改</a>
	
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