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
	<div class="wrap jj">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('Info/index');?>">课程信息</a></li>
			<li class="active"><a href="javascript:;">修改信息</a></li>
		</ul>
		<div class="common-form">
			<form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Info/edit_post');?>">
				<fieldset>
					<div class="control-group">
						<label class="control-label">上级分类:</label>
						<div class="controls">
							<select name="parentid">
                            <option value="0">请选择分类</option>
                            <?php echo ($terms_tree); ?>
                            </select>
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">分类名称:</label>
						<div class="controls">
							<input type="text" class="input" name="name" value="<?php echo ($info["name"]); ?>">
                            <input type="hidden" class="input" name="id" value="<?php echo ($info["id"]); ?>">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">价格:</label>
						<div class="controls">
							<input type="text" class="input" name="price" value="<?php echo ($info["price"]); ?>">
							<span class="must_red">*</span>
						</div>
					</div>
					
					<div class="control-group">
          <label class="control-label">内容:</label>
          <div class="controls">
            <script type="text/plain" id="content" name="content"><?php echo ($info["content"]); ?></script>
                <script type="text/javascript">
                //编辑器路径定义
                var editorURL = GV.DIMAUB;
                </script>
                <script type="text/javascript"  src="/statics/js/ueditor/ueditor.config.js"></script>
                <script type="text/javascript"  src="/statics/js/ueditor/ueditor.all.min.js"></script>
            <span class="must_red">*</span> </div>
        </div>
					
					
				</fieldset>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">修改</button>
					<a class="btn" href="/Admin/Info">返回</a>
				</div>
			</form>
		</div>
	</div>
	<script src="/statics/js/common.js"></script>
    <script type="text/javascript" src="/statics/js/content_addtop.js"></script>
    <script>
$(function(){
editorcontent = new baidu.editor.ui.Editor();
	            editorcontent.render( 'content' );
	            try{editorcontent.sync();}catch(err){};
	            //增加编辑器验证规则
	            jQuery.validator.addMethod('editorcontent',function(){
	                try{editorcontent.sync();}catch(err){};
	                return editorcontent.hasContents();
	            });
})
</script>
</body>
</html>