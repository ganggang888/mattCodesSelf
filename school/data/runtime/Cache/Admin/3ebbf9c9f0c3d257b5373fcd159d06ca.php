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
    <li class="active"><a href="javascript:;">所有课程</a></li>
    <li><a href="<?php echo U('Subject/add',array('term'=>empty($term['term_id'])?'':$term['term_id']));?>" target="_self">添加课程</a></li>
  </ul>
  <form class="J_ajaxForm" action="" method="post">
    <table class="table table-hover table-bordered table-list">
      <thead>
        <tr>
          <th width="50">id</th>
          <th>标题</th>
          <th>介绍</th>
          <th>缩略图</th>
          <th>内容</th>
          <th>所属分类</th>
          <th>点击量</th>
          <th>添加时间</th>
          <th>发布人</th>
          <th>操作</th>
        </tr>
      </thead>
      <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
          <td><?php echo ($vo["id"]); ?></td>
          <td><a href="" target="_blank"> <span><?php echo ($vo["title"]); ?></span></a></td>
          <td><?php echo ($vo["about"]); ?></td>
          <td><?php if(!empty($vo[img])): ?><img src="<?php echo ($vo["img"]); ?>" width="40" />
              <?php else: ?>
              无<?php endif; ?></td>
          <td><?php echo mb_substr(strip_tags($vo[content]),0,80,'utf-8'); ?></td>
          <td><?php echo ($vo["name"]); ?></td>
          <td><?php echo ($vo["hits"]); ?></td>
          <td><?php echo ($vo["add_time"]); ?></td>
          <td>
          <?php $info = getUsername($vo['uid']); echo $info['user_login']; ?></td>
          <td><a href="<?php echo U('Subject/edit',array('id'=>$vo[id]));?>">修改</a> | <a href="<?php echo U('Subject/delete',array('id'=>$vo[id]));?>" class="J_ajax_del">删除</a></td>
        </tr><?php endforeach; endif; ?>
      <tfoot>
        <tr>
          <th>id</th>
          <th>标题</th>
          <th>介绍</th>
          <th>缩略图</th>
          <th>内容</th>
          <th>所属分类</th>
          <th>点击量</th>
          <th>添加时间</th>
          <th>发布人</th>
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