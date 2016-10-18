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
			<li class="active"><a href="<?php echo U('Elective/add');?>">教师列表</a></li>
			<li><a href="javascript:;">添加教师</a></li>
		</ul>
		<div class="common-form">
			<form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Elective/add_teacher_post');?>">
				<fieldset>
					<div class="control-group">
						<label class="control-label">教师姓名:</label>
						<div class="controls">
							<input type="text" class="input" name="name" value="">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">教师性别:</label>
						<div class="controls">
							<input type="text" class="input" name="sex" value="">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">教师年龄:</label>
						<div class="controls">
							<input type="text" class="input" name="age" value="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">工作经验:</label>
						<div class="controls">
							<input type="text" class="input" name="experience" value="">
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">教师头像:</label>
						<div class="controls">
							<div  style="text-align: left;"><input type='hidden' name='img' id='thumb' value=''>
			<a href='javascript:void(0);' onClick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
			<img src='/school/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
			<!-- <input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片">  -->
            <input type="button"  class="btn" onClick="$('#thumb_preview').attr('src','/school/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
            </div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">证书信息:</label>
						<div class="controls">
							<textarea name="certificate" rows="5" cols="57"></textarea>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">教师图集:</label>
						<div class="controls">
							<fieldset class="blue pad-10">
		        <legend>图片列表</legend>
		        <ul id="photos" class="picList unstyled"></ul>
				</fieldset>
				<a href="javascript:;" style="margin: 5px 0;" onClick="javascript:flashupload('albums_images', '图片上传','photos',change_images,'10,gif|jpg|jpeg|png|bmp,0','','','')" class="btn">选择图片 </a>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">优秀格言:</label>
						<div class="controls">
							<textarea name="motto" rows="5" cols="57"></textarea>
						</div>
					</div>
				</fieldset>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">添加</button>
					<a class="btn" href="/school/Admin/Elective">返回</a>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="/school/statics/js/common.js"></script>
<script type="text/javascript" src="/school/statics/js/content_addtop.js">
</body>
</html>