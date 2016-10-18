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

	<link href="/group/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/group/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/group/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/group/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/group/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/group/",
    JS_ROOT: "public/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/group/public/js/jquery.js"></script>
    <script src="/group/public/js/wind.js"></script>
    <script src="/group/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed">
	<div class="wrap jj">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('Vaccine/index');?>">疫苗列表</a></li>
			<li class="active"><a href="javascript:;">添加疫苗</a></li>
		</ul>
		<div class="common-form">
			<form method="post" class="form-horizontal J_ajaxForm" action="">
				<fieldset>
					<div class="control-group">
						<label class="control-label">名称:</label>
						<div class="controls">
							<input type="text" class="input" name="name" value="">
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">剂次总数:</label>
						<div class="controls">
							<input type="text" class="input" name="total" value="">
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">剂次值:</label>
						<div class="controls">
							<input type="text" class="input" name="index" value="">
							<span class="must_red">*</span>
						</div>
					</div>
                    
					<div class="control-group">
						<label class="control-label">类别:</label>
						<div class="controls">
							<select name="type">
                            <option value="1">一类</option>
                            <option value="2">二类</option>
                            </select>
							<span class="must_red">*</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">月份:</label>
						<div class="controls">
							<select name="required_months" id="month">
							<?php for($i=0;$i<=72;$i++) { ?>
							<option value="<?php echo ($i); ?>"><?php echo ($i); ?>月份</option>
							<?php } ?>
						</select>
							<span class="must_red">*</span>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">是否为必须:</label>
						<div class="controls">
							<select name="is_necessary" id="important">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">是否免费:</label>
						<div class="controls">
							<select name="is_free" id="is_free">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">是否可替换:</label>
						<div class="controls">
							<select name="is_replaceable" id="is_replaceable">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">是否可忽视:</label>
						<div class="controls">
							<select name="is_ignore" id="is_ignore">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">疫苗首字母:</label>
						<div class="controls">
							<input type="text" name="first_letter">
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">免疫程序:</label>
						<div class="controls">
							<textarea rows="6" name="detail_field_1"></textarea>
							<span class="must_red">*</span>
						</div>
					</div>
                    
                    <div class="control-group">
						<label class="control-label">接种方法:</label>
						<div class="controls">
							<textarea rows="6" name="detail_field_2"></textarea>
							<span class="must_red">*</span>
						</div>
					</div>
                    
                    <div class="control-group">
						<label class="control-label">作用:</label>
						<div class="controls">
							<textarea rows="6" name="detail_field_3"></textarea>
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">禁忌症:</label>
						<div class="controls">
							<textarea rows="6" name="detail_field_4"></textarea>
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">不良反应:</label>
						<div class="controls">
							<textarea rows="6" name="detail_field_5"></textarea>
							<span class="must_red">*</span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">注意事项:</label>
						<div class="controls">
							<textarea rows="6" name="detail_field_6"></textarea>
							<span class="must_red">*</span>
						</div>
					</div>
					<input type="hidden" name="create_time" value="<?php echo date('Y-m-d H:i:s');?>">
				</fieldset>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">添加</button>
					<a class="btn" href="/group/index.php/Admin/Vaccine">返回</a>
				</div>
			</form>
		</div>
	</div>
	<script src="/group/statics/js/common.js"></script>
    <script type="text/javascript" src="/group/statics/js/content_addtop.js"></script>
    <script>
	editorcontent = new baidu.editor.ui.Editor();
	editorcontent.render( 'content' );
    </script>
</body>
</html>