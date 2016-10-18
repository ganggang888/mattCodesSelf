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
			<li class="active"><a href="javascript:;">所有教师</a></li>
			<li><a href="<?php echo U('Teacher/add');?>" target="_self">添加教师</a></li>
		</ul>
		
		<form class="J_ajaxForm" action="" method="post">
			
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
					  <th width="50">id</th>
					  <th>姓名</th>
						<th>教师背景</th>
					  <th>荣誉</th>
						<th>曾经任职</th>
						<th>著作</th>
						<th>专业领域</th>
						<th>专家见解</th>
                        <th>添加时间</th>
					  <th width="60">操作</th>
					</tr>
				</thead>
				<?php if(is_array($rows)): foreach($rows as $key=>$vo): ?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["background"]); ?></td>
					<td><?php echo ($vo["honour"]); ?></td>
					<td><?php echo ($vo["had_do"]); ?></td>
					<td><?php echo ($vo["book"]); ?></td>
					<td><?php echo ($vo["territory"]); ?></td>
					<td><?php echo ($vo["talk"]); ?></td>
                    <th><?php echo ($vo["add_time"]); ?></th>
					<td>
						<a href="<?php echo U('Teacher/edit',array('id'=>$vo['id']));?>">修改</a> | 
						<a href="<?php echo U('Teacher/delete',array('id'=>$vo['id']));?>" class="J_ajax_del">删除</a></td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
					  <th>id</th>
					  <th>姓名</th>
					  <th>教师背景</th>
					  <th>荣誉</th>
					  <th>曾经任职</th>
					  <th>著作</th>
					  <th>专业领域</th>
					  <th>专家见解</th>
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