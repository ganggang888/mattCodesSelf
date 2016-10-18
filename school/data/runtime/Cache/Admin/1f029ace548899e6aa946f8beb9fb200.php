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
    <style>
        .t_head{
            text-align: center;
            background-color: #dbe5e7;
            font-size: 20px;
            height: 40px;
            float: inherit;
            margin: 0 0 0px;
            line-height: 40px;
        }
        fieldset{

            margin:0px auto
        }
        p{
            font-size: 20px;
            margin: 0 0 0px;
        }
    </style>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo U('Sdtmain/index');?>">学员列表</a></li>
        <li class="active"><a href="#" target="_self">在校课程表现</a></li>
    </ul>
    <div class="common-form">
        <form method="post" class="form-horizontal J_ajaxForms" action="<?php echo U('Sdtmain/result_add_post',array('student_id'=>$student['id'],'parent_id'=>$parent['id']));?>">
            <div class="search_type cc mb10">
                <div class="well form-search">
					<span class="mr20">
						<p><?php echo ($student["name"]); ?>-><?php echo ($class["name"]); ?></p>
                        <input type="hidden" value="<?php echo ($class["id"]); ?>" name = "post[info_id]" id="info_id">
					</span>
                </div>
            </div>

            <fieldset>
                <div class="control-group">
                    <label class="control-label">选择课程:</label>
                    <div class="controls">
                        <label style="padding-top: 5px"><?php echo ($parent["name"]); ?>-><?php echo ($class["name"]); ?></label>
                    </div>
                </div>
                <div class="control-group">

                    <label class="control-label">上课照片:</label>
                    <div  class="controls">
                        <table>
                            <tr>
                                <td>
                                    <input type="button" onclick="flashupload('thumb_images', '图片上传','class',change_images,'10,jpg|jpeg|gif|png|bmp,0','','&max_count=5','');return false;" value="图片上传"/>
                                </td>
                                <td>
                                    <ul name='post[class_photo]'  id='class' />
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="control-group">
                    <label class="control-label">作品展示:</label>
                    <div  class="controls">
                        <table>
                            <tr>
                                <td>
                                    <input type="button" onclick="flashupload('thumb_images', '图片上传','works',change_images,'10,jpg|jpeg|gif|png|bmp,0','','&max_count=5','');return false;" value="图片上传"/>
                                </td>
                                <td>
                                    <ul name='post[class_photo]'  id='works' />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">学习成绩:</label>
                    <div class="controls">
                        <input type="text"  name="post[score]" id="score"  class="input input_hd J_title_color"  />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">老师评价:</label>
                    <div class="controls">
                        <textarea name='post[teacher_result]' id='teacher_result' style='width:60%;height:100px;'></textarea>
                    </div>
                </div>

            </fieldset>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">提交</button>
                <a class="btn" href="<?php echo U('Sdtmain/result_index',array('id'=>$student['id']));?>">返回</a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="/statics/js/common.js"></script>
<script type="text/javascript" src="/statics/js/content_addtop.js"></script>
<script type="text/javascript">
    $(function () {
        /////---------------------
        var form = $('form.J_ajaxForms');
        Wind.use('validate', 'ajaxForm', 'artDialog', function () {
            form.validate({
                submitHandler: function (forms) {
                    //if (formloading) return;
                    $(forms).ajaxSubmit({
                        url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
                        dataType: 'json',
                        beforeSubmit: function (arr, $form, options) {
                            formloading = true;
                        },
                        success: function (data, statusText, xhr, $form) {
                            formloading = false;
//                            var a =JSON.stringify(data);
//                            alert(a);
                            if (data.status) {
                                //alert();
                                setCookie("refersh_time", 1);
                                //添加成功
                                Wind.use("artDialog", function () {
                                    art.dialog({
                                        id: "succeed",
                                        icon: "succeed",
                                        fixed: true,
                                        lock: true,
                                        background: "#CCCCCC",
                                        opacity: 0,
                                        content: "添加成功!",
                                        button: [
                                             {
                                                name: '返回列表页',
                                                callback: function () {
                                                    location = "<?php echo U('Sdtmain/result_index',array('id'=>$student['id']));?>";
                                                    return true;
                                                }
                                            }
                                        ]
                                    });
                                });
                            } else {
                                isalert(data.info);
                            }
                        }
                    });
                }
            })
        })
    })


</script>
</body>


</html>