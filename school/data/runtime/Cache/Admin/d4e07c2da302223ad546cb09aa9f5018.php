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
<div class="wrap jj">
  <ul class="nav nav-tabs">
    <li class="active"><a href="<?php echo U('Elective/course');?>">课程分类列表</a></li>
    <li><a href="javascript:;">添加课程分类</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Elective/add_course_post');?>">
      <fieldset>
        <div class="control-group">
          <label class="control-label">课程名称:</label>
          <div class="controls">
            <input type="text" class="input" name="class_name" value="">
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">课程介绍:</label>
          <div class="controls">
            <div id='content_tip'></div>
            <script type="text/plain" id="content" name="about"></script> 
            <script type="text/javascript">
                //编辑器路径定义
                var editorURL = GV.DIMAUB;
                </script> 
            <script type="text/javascript"  src="/school/statics/js/ueditor/ueditor.config.js"></script> 
            <script type="text/javascript"  src="/school/statics/js/ueditor/ueditor.all.min.js"></script> 
          </div>
        </div>
      </fieldset>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">添加</button>
        <a class="btn" href="/school/Admin/Elective">返回</a> </div>
    </form>
  </div> 
</div>
<script type="text/javascript" src="/school/statics/js/common.js"></script> 
<script type="text/javascript" src="/school/statics/js/content_addtop.js"></script>
<script>
//编辑器
	            editorcontent = new baidu.editor.ui.Editor();
	            editorcontent.render( 'content' );
	            try{editorcontent.sync();}catch(err){};
</script>

</body>
</html>