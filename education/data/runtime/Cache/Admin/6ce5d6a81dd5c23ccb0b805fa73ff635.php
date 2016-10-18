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
    <li><a href="<?php echo U('Vcr/index');?>">所有VCR</a></li>
    <li class="active"><a href="javascript:;" target="_self">添加VCR</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="form-horizontal J_ajaxForm" action="<?php echo U('Vcr/add_post');?>">
      <fieldset>
        <div class="control-group">
          <label class="control-label">vcr名称:</label>
          <div class="controls">
            <input type="text" class="input" name="name" value="">
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">VCR类型:</label>
          <div class="controls">
            <?php $type = array( array( 'name' => '教师VCR', 'value' => '1', ), array( 'name' => '学生VCR', 'value' => '2', ), ); ?>
            <select name="type">
              <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["value"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">宣传图:</label>
          <div class="controls">
            <div  style="text-align: left;">
              <input type='hidden' name='img' id='thumb' value=''>
              <a href='javascript:void(0);' onClick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;"> <img src='/education/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a> 
              <!-- <input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片">  -->
              <input type="button"  class="btn" onClick="$('#thumb_preview').attr('src','/education/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
            </div>
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">视频:</label>
          <div class="controls">
            <input type="file" name="uploadmedia" id="uploadmedia">
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">介绍:</label>
          <div class="controls">
            <div id='content_tip'></div>
            <script type="text/plain" id="content" name="about"></script> 
            <script type="text/javascript">
                //编辑器路径定义
                var editorURL = GV.DIMAUB;
                </script> 
            <script type="text/javascript"  src="/education/statics/js/ueditor/ueditor.config.js"></script> 
            <script type="text/javascript"  src="/education/statics/js/ueditor/ueditor.all.min.js"></script> 
          </div>
        </div>
        
        
        
      </fieldset>
      <div class="form-actions">
        <button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">添加</button>
        <a class="btn" href="/education/index.php/Admin/Vcr">返回</a> </div>
    </form>
  </div>
</div>
<script src="/education/statics/js/common.js"></script> 
<script type="text/javascript" src="/education/statics/js/content_addtop.js"></script> 
<script>
$(function(){
//编辑器
 editorcontent = new baidu.editor.ui.Editor();
	            editorcontent.render( 'content' );
	            try{editorcontent.sync();}catch(err){};
})
</script>
</body>
</html>