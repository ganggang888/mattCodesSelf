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
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
    <li class="active"><a href="javascript:;">所有优惠码</a></li>
  </ul>
  <form class="well form-search">
			<div class="search_type cc mb10">
				<div class="mb10">
					<span class="mr20">
						优惠码：
						<input type="text" id="code" value="<?php echo ($code); ?>">
				<a href="javascript:;" onClick="todo()" class="btn btn-primary">搜索</a>&nbsp;&nbsp;
					</span>
					<script>
					function todo() {
						var code = $("#code").val();
						window.location.href='/index.php?g=Admin&m=Subject&a=code&menuid=183&code='+code;
					}
					</script>
				</div>
			</div>
		</form>
  <form class="J_ajaxForm" action="" method="post">
    <table class="table table-hover table-bordered table-list">
      <thead>
        <tr>
          <th width="50">id</th>
          <th>用户</th>
          <th>优惠码</th>
          <th>状态</th>
          <th>优惠码信息</th>
          <th>添加时间</th>
          <th>操作</th>
        </tr>
      </thead>
      <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
          <td><?php echo ($vo["id"]); ?></td>
          <td>
          <?php $user = getUsername($vo['uid']); echo $user['user_login']; ?>
          </td>
          <td><?php echo ($vo["code"]); ?></td>
          <td>
          <?php if($vo[status] == 1): ?>已兑换
          <?php else: ?>
          未兑换<?php endif; ?>
          </td>
          <td><?php $info = orderInfo($vo['info']); ?>
          <?php if(is_array($info)): foreach($info as $key=>$v): echo ($v["parent"]); ?>-><?php echo ($v["name"]); ?> ￥<?php echo ($v["price"]); ?><br/><?php endforeach; endif; ?>
          </td>
          <td><?php echo ($vo["add_time"]); ?></td>
          <td><a href="<?php echo U('Admin/subject/delCode',array('id'=>$vo[id]));?>">删除</a>
          <?php if($vo[status] == 0): ?>| <a href="<?php echo U('Admin/subject/changeCode',array('id'=>$vo[id]));?>" class="J_ajax_dialog_btn" data-msg="确定执行吗？">已兑换</a><?php endif; ?>
           </td>
        </tr><?php endforeach; endif; ?>
      <tfoot>
      </tfoot>
    </table>
    <div class="pagination"><?php echo ($page); ?></div>
  </form>
</div>
<script src="/statics/js/common.js"></script>
</body>
</html>