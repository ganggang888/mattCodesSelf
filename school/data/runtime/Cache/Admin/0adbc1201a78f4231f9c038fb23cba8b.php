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
			<li class="active"><a href="javascript:;">所有订单</a></li>
		</ul>
		<form class="well form-search">
			<div class="search_type cc mb10">
				<div class="mb10">
					<span class="mr20">
						手机号：
						<input type="text" id="phone" value="<?php echo ($phone); ?>">
						&nbsp;&nbsp;订单号：<input type="text" id="numbers" value="<?php echo ($number); ?>"><a href="javascript:;" onClick="todo()" class="btn btn-primary">搜索</a>&nbsp;&nbsp;
					</span>
					<script>
					function todo() {
						var phone = $("#phone").val();
						var numbers = $("#numbers").val();
						window.location.href='/index.php?g=Admin&m=Subject&a=order&menuid=183&phone='+phone+'&number='+numbers;
					}
					</script>
				</div>
			</div>
		</form>
		<form class="J_ajaxForm" action="" method="post">
			
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th>id</th>
						<th>订单名称</th>
                        <th>用户名</th>
						<th>订单号</th>
						<th>价格</th>
						<th>支付方式</th>
						<th>支付状态</th>
						<th>订单信息</th>
						<th>下单时间</th>
						<th>操作</th>
					</tr>
				</thead>
				
				<?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["order_name"]); ?></td>
                    <th>
                    <?php $user = getUsername($vo['uid']); echo $user['user_login']; ?>
                    </th>
					<td><?php echo ($vo["order_number"]); ?></td>
					<td><?php echo ($vo["order_money"]); ?></td>
					<td>
                    <?php if($vo[type] == 1): ?>支付宝
                    <?php elseif($vo[type] == 2): ?>
                    微信支付<?php endif; ?>
                    </td>
					<td>
                    <?php if($vo[status] == 1): ?>支付成功
                    <?php else: ?>
                    支付失败<?php endif; ?>
                    </td>
					<td>
                    <?php $info = orderInfo($vo['info']); ?>
                    <?php if(is_array($info)): foreach($info as $key=>$v): echo ($v["parent"]); ?>-><?php echo ($v["name"]); ?> ￥<?php echo ($v["price"]); ?><br/><?php endforeach; endif; ?>
                    </td>
					<td>
                    <?php echo ($vo["add_time"]); ?>
                    </td>
					<td><a href="<?php echo U('AdminPost/delete',array('term'=>empty($term['term_id'])?'':$term['term_id'],'tid'=>$vo['tid']));?>" class="J_ajax_del"></a></td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
				</tfoot>
			</table>
			
			<div class="pagination"><?php echo ($page); ?></div>

	  </form>
	</div>
	<script src="/school/statics/js/common.js"></script>
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
									"/school/index.php?g=portal&m=AdminPost&a=move&ids="
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