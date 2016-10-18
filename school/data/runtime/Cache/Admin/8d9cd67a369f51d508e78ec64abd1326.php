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
<style type="text/css">
    .col-auto {
        overflow: hidden;
        _zoom: 1;
        _float: left;
        border: 1px solid #c2d1d8;
    }
    .col-right {
        float: right;
        width: 210px;
        overflow: hidden;
        margin-left: 6px;
        border: 1px solid #c2d1d8;
    }

    body fieldset {
        border: 1px solid #D8D8D8;
        padding: 10px;
        background-color: #FFF;
    }
    body fieldset legend {
        background-color: #F9F9F9;
        border: 1px solid #D8D8D8;
        font-weight: 700;
        padding: 3px 8px;
    }
    .list-dot{ padding-bottom:10px}
    .list-dot li,.list-dot-othors li{padding:5px 0; border-bottom:1px dotted #c6dde0; font-family:"宋体"; color:#bbb; position:relative;_height:22px}
    .list-dot li span,.list-dot-othors li span{color:#004499}
    .list-dot li a.close span,.list-dot-othors li a.close span{display:none}
    .list-dot li a.close,.list-dot-othors li a.close{ background: url("/statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
    .list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
    .list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
<script type="text/javascript"  src="/statics/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript"  src="/statics/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/statics/js/common.js"></script>
<script type="text/javascript" src="/statics/js/content_addtop.js"></script>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo U('Expert/index');?>">专家列表</a></li>
        <li class="active"><a href="<?php echo U('Expert/add');?>" target="_self">添加专家</a></li>
    </ul>
    <form name="myform" id="myform"  action="<?php echo U('Expert/add_post');?>" method="post" class="form-horizontal J_ajaxForms" enctype="multipart/form-data">
        <div class="col-right">
            <div class="table_full">
                <table width="100%" cellpadding="2" cellspacing="2">
                    <tr>
                        <td><b>上传照片</b></td>
                    </tr>
                    <tr>
                        <td>
                            <div  style="text-align: center;"><input type='hidden' name='post[photo]' id='thumb' value=''>
                                <a href='javascript:void(0);' onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
                                    <img src='/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
                                 <!--<input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片"> -->
                                <input type="button"  class="btn" onclick="$('#thumb_preview').attr('src','/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><b>发布时间</b></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="post[update_time]" id="updatetime" value="<?php echo date('Y-m-d H:i:s',time());?>" size="21" class="input length_3 J_datetime "></td>
                    </tr>
                    <tr>
                        <td>
                            <span class="switch_list cc">
                                <label><input type="radio" name="post[is_top]" value="1" checked><span>置顶</span></label>
                                <label><input type="radio" name="post[is_top]" value="0"  ><span>未置顶</span></label>
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <div class="col-auto">
        <div class="table_full">
            <table width="100%" cellpadding="2" cellspacing="2">
                <tr>
                    <th width="80">专家姓名</th>
                    <td>
                        <input type="text" style="width:400px;" name="post[name]" id="title"  required value="" style="color:red" class="input input_hd J_title_color" placeholder="请输入姓名" onkeyup="strlen_verify(this, 'title_len', 160)" />

                    </td>
                </tr>
                <tr>
                    <th width="80">专家类别</th>
                    <td>

                        <select style="min-width:200px;" name='post[expert_type]'>
                            <?php if(is_array($types)): foreach($types as $key=>$vo): ?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th width="80">职务</th>
                    <td>

                        <input type="text" style="width:400px;" name="post[position]" id="position"  required value="" style="color:red" class="input input_hd J_title_color" placeholder="请输入职务" onkeyup="strlen_verify(this, 'title_len', 160)" />
                    </td>
                </tr>
                <tr>
                    <th width="80">专家介绍</th>
                    <td><span class="must_red">*</span><div id='content_tip'></div>
                        <script type="text/plain" id="introduce" name="post[introduce]"></script>
                    </td>
                </tr>
                <tr>
                    <th width="80">格言 </th>
                    <td><textarea name='post[motto]' id='motto' style='width:98%;height:100px;'  ></textarea> </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-actions">
        <button class="btn btn-primary btn_submit J_ajax_submit_btn"type="submit">提交</button>
        <a class="btn" href="<?php echo U('Expert/index');?>">返回</a>
    </div>
    </form>
</div>
<script type="text/javascript">
    var ue =  new UE.ui.Editor({initialFrameHeight:250});
    ue.render("introduce");
</script>
</body>

</html>