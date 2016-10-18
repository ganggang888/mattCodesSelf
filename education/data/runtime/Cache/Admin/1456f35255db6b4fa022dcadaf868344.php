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
	<div class="wrap jj">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('Student/index');?>">所有学员</a></li>
			<li class="active"><a href="javascript:;" target="_self">添加学员</a></li>
		</ul>
		<div class="common-form">
			<form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Student/add_post');?>">
				<fieldset>
					<div class="control-group">
						<label class="control-label">学号:</label>
						<div class="controls">
							<input type="text" class="input" name="num" value="">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">籍贯:</label>
						<div class="controls">
							<input type="text" class="input" name="place" value="">
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">年龄:</label>
						<div class="controls">
							<input type="text" class="input" name="age" value="">
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">学员图像:</label>
						<div class="controls">
							<div  style="text-align: left;"><input type='hidden' name='img' id='thumb' value=''>
			<a href='javascript:void(0);' onClick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
			<img src='/education/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
			<!-- <input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片">  -->
            <input type="button"  class="btn" onClick="$('#thumb_preview').attr('src','/education/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
            </div>
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">学历:</label>
						<div class="controls">
							<textarea name="education" rows="5" cols="57"></textarea>
							<span class="must_red">*</span>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">证书:</label>
						<div class="controls">
							<input type="text" class="input" name="book" value="">
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">工作经历:</label>
						<div class="controls">
                            <textarea name="experience" rows="5" cols="57"></textarea>
						</div>
					</div>
                    
				</fieldset>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">添加</button>
					<a class="btn" href="/education/index.php/Admin/Student">返回</a>
				</div>
			</form>
		</div>
	</div>
	<script src="/education/statics/js/common.js"></script>
    <script type="text/javascript" src="/education/statics/js/content_addtop.js"></script>
</body>
</html>