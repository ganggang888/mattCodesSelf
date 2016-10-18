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
<style type="text/css">
.col-auto { overflow: auto; _zoom: 1;_float: left;}
.col-right { float: right; width: 210px; overflow: hidden; margin-left: 6px; }
.table th, .table td {vertical-align: middle;}
.picList li{margin-bottom: 5px;}
</style>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li><a href="<?php echo U('Wchats/index');?>">所有回复</a></li>
     <li class="active"><a href="javascript:;"  target="_self">添加回复规则</a></li>
  </ul>
  <form name="myform" id="myform" action="<?php echo u('Wchats/add_post');?>" method="post" class="form-horizontal J_ajaxForms" enctype="multipart/form-data">
  
  <div class="col-auto">
    <div class="table_full">
      <table class="table table-bordered">
            <tr>
              <th width="80">分类</th>
              <td>
				<select name="type">
                <?php if(is_array($term)): foreach($term as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                </select>
              </td>
            </tr>
            <tr>
              <th width="80">触发关键词</th>
              <td>
              	<input type="text" name="keyword" />
              </td>
            </tr>
            <tr>
              <th width="80">文本消息</th>
              <td><textarea name='text' id='description'  required style='width:98%;height:50px;' placeholder='请填写文本消息'></textarea></td>
            </tr>
            
            <tr>
              <th width="80">相册图集 </th>
              <td>
				<fieldset class="blue pad-10">
		        <legend>图片列表</legend>
		        <ul id="photos" class="picList unstyled"></ul>
				</fieldset>
				<a href="javascript:;" style="margin: 5px 0;" onClick="javascript:flashupload('albums_images', '图片上传','photos',change_imagess,'10,gif|jpg|jpeg|png|bmp,0','','','')" class="btn">选择图片 </a>
			  </td>
            </tr>
                        
        </tbody>
      </table>
    </div>
  </div>
  <input type="hidden" name="add_time" value="<?php echo date('Y-m-d H:i:s');?>">
  <div class="form-actions">
        <button class="btn btn-primary btn_submit J_ajax_submit_btn">提交</button>
        <a class="btn" href="<?php echo U('AdminPost/index');?>">返回</a>
  </div>
 </form>
</div>
<script type="text/javascript" src="/school/statics/js/common.js"></script>
<script type="text/javascript" src="/school/statics/js/content_addtop.js"></script>
</body>
</html>
<style>
#image6247 .input{ width:400px!important}
</style>