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

	<link href="/education/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/education/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/education/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/education/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/education/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/education/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/education/statics/js/jquery.js"></script>
    <script src="/education/statics/js/wind.js"></script>
    <script src="/education/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
	<div class="wrap J_check_wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;">所有学员</a></li>
			<li><a href="<?php echo U('Student/add');?>" target="_self">添加学员</a></li>
		</ul>
		
		<form class="J_ajaxForm" action="" method="post">
			
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
					  <th width="50">id</th>
					  <th>学号</th>
						<th>籍贯</th>
					  <th>年龄</th>
						<th>学历</th>
						<th>证书</th>
						<th>工作经历</th>
						<th>头像</th>
                        <th>添加时间</th>
					  <th width="60">操作</th>
					</tr>
				</thead>
				<?php if(is_array($rows)): foreach($rows as $key=>$vo): ?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["num"]); ?></td>
					<td><?php echo ($vo["place"]); ?></td>
					<td><?php echo ($vo["age"]); ?></td>
					<td><?php echo ($vo["education"]); ?></td>
					<td><?php echo ($vo["book"]); ?></td>
					<td><?php echo ($vo["experience"]); ?></td>
					<td><?php if($vo['img'] == ''): else: ?><img src="<?php echo ($vo["img"]); ?>" width="100"><?php endif; ?></td>
                    <th><?php echo ($vo["add_time"]); ?></th>
					<td>
						<a href="<?php echo U('Student/edit',array('id'=>$vo['id']));?>">修改</a> | 
						<a href="<?php echo U('Student/delete',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a></td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
					  <th>id</th>
					  <th>学号</th>
					  <th>籍贯</th>
					  <th>年龄</th>
					  <th>学历</th>
					  <th>证书</th>
					  <th>工作经历</th>
					  <th>头像</th>
					  <th>添加时间</th>
					  <th width="60">操作</th>
					</tr>
				</tfoot>
			</table>
			
			<div class="pagination"><?php echo ($page); ?></div>

	  </form>
	</div>
	<script src="/education/statics/js/common.js"></script>
	<script>
		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location = "<?php echo U('AdminPost/index',$formget);?>";
			}
		}
		setInterval(function() {
			refersh_window();
		}, 2000);
		$(function() {
			setCookie("refersh_time", 0);
			Wind.use('ajaxForm', 'artDialog', 'iframeTools', function() {
				//批量移动
				$('.J_articles_move').click(
						function(e) {
							var str = 0;
							var id = tag = '';
							$("input[name='ids[]']").each(function() {
								if ($(this).attr('checked')) {
									str = 1;
									id += tag + $(this).val();
									tag = ',';
								}
							});
							if (str == 0) {
								art.dialog.through({
									id : 'error',
									icon : 'error',
									content : '您没有勾选信息，无法进行操作！',
									cancelVal : '关闭',
									cancel : true
								});
								return false;
							}
							var $this = $(this);
							art.dialog.open(
									"/education/index.php?g=portal&m=AdminPost&a=move&ids="
											+ id, {
										title : "批量移动",
										width : "80%"
									});
						});
			});
		});
	</script>
</body>
</html>