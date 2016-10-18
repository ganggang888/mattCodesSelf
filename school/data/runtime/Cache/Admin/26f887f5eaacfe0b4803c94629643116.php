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
    <li class="active"><a href="javascript:;">所有回复</a></li>
     <li><a href="<?php echo U('Wchats/add');?>"  target="_self">添加回复规则</a></li>
  </ul>
  <form class="J_ajaxForm" action="" method="post">
    <table class="table table-hover table-bordered table-list">
      <thead>
        <tr>
          <th width="50">id</th>
          <th>关键字</th>
          <th>回复类型</th>
          <th>文本消息</th>
          <th>时间</th>
          <th>操作</th>
        </tr>
      </thead>
      <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
          <td><?php echo ($vo["id"]); ?></td>
          <td><a href="" target="_blank"> <span><?php echo ($vo["keyword"]); ?></span></a></td>
          <td>
          <?php if($vo[type] == 1): ?>文本消息
          <?php elseif($vo[type] == 1): ?>
          图片消息
          <?php else: ?>
          图文消息<?php endif; ?>
          </td>
          <td><?php echo ($vo["text"]); ?></td>
          <td><?php echo ($vo["add_time"]); ?></td>
          <td><a href="<?php echo U('Wchats/edit',array('id'=>$vo[id]));?>">修改</a> | <a href="<?php echo U('Wchats/delete',array('id'=>$vo[id]));?>" class="J_ajax_del">删除</a></td>
        </tr><?php endforeach; endif; ?>
      <tfoot>
        <tr>
          <th>id</th>
          <th>关键字</th>
          <th>回复类型</th>
          <th>文本消息</th>
          <th>时间</th>
          <th>操作</th>
        </tr>
      </tfoot>
    </table>
    <div class="pagination"><?php echo ($page); ?></div>
  </form>
</div>
<script src="/school/statics/js/common.js"></script>
</body>
</html>