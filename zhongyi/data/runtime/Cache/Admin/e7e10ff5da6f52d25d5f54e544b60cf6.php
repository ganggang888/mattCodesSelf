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
			<li><a href="<?php echo U('link/index');?>">友情链接</a></li>
			<li><a href="<?php echo U('link/add');?>">添加链接</a></li>
		</ul>
		<div class="common-form">
			<form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('link/edit_post');?>">
				<fieldset>
					<div class="control-group">
						<label class="control-label">链接名称:</label>
						<div class="controls">
							<input type="text" class="input" name="link_name" value="<?php echo ($link_name); ?>">
							<span class="must_red">*</span>
							<input type="hidden" class="input" name="link_id" value="<?php echo ($link_id); ?>">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">链接地址:</label>
						<div class="controls">
							<input type="text" class="input" name="link_url" value="<?php echo ($link_url); ?>">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">链接图标:</label>
						<div class="controls">
                        <div  style="text-align: left;"><input type='hidden' name='link_image' id='thumb' value="<?php echo ((isset($smeta["thumb"]) && ($smeta["thumb"] !== ""))?($smeta["thumb"]):''); ?>">
			<a href='javascript:void(0);' onClick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
			
			<?php if(empty($link_image)): ?><img src="/statics/images/icon/upload-pic.png" id='thumb_preview' width='135' height='113' style='cursor:hand' />
			<?php else: ?>
				<img src="<?php echo sp_get_asset_upload_path($link_image);?>" id='thumb_preview' width='135' height='113' style='cursor:hand' /><?php endif; ?>
			
			</a>
			<!-- <input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片">  -->
            <input type="button"  class="btn" onClick="$('#thumb_preview').attr('src','/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
            </div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">打开方式:</label>
						<div class="controls">
							<select name="link_target" class="normal_select">
								<?php if(is_array($targets)): foreach($targets as $key=>$vo): $link_target_selected=$link_target==$key?"selected='selected'":""; ?>
								<option value="<?php echo ($key); ?>" <?php echo ($link_target_selected); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">描述:</label>
						<div class="controls">
							<textarea name="link_description" rows="5" cols="57"><?php echo ($link_description); ?></textarea>
						</div>
					</div>
				</fieldset>
				<div class="form-actions">
					<button type="submit"
						class="btn btn-primary btn_submit J_ajax_submit_btn">更新</button>
					<a class="btn" href="/index.php/Admin/Link">返回</a>
				</div>
			</form>
		</div>
	</div>
	<script src="/statics/js/common.js"></script>
     <script type="text/javascript" src="/statics/js/content_addtop.js"></script>
</body>
</html>