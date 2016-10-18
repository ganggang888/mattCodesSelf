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
<div class="wrap J_check_wrap">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo U('Sdtmain/index');?>">学员列表</a></li>
        <li class="active"><a href="#" target="_self">添加工作经历</a></li>
    </ul>
    <div class="common-form">
        <form method="post" class="form-horizontal J_ajaxForms" action="<?php echo U('Sdtmain/work_add_post',array('id'=>$id));?>">
            <fieldset>
                <div class="control-group">
                    <label class="control-label">开始时间:</label>
                    <div class="controls">
                        <input type="text" name="post[from_time]" id="from_time"  size="21" class="J_date" >
                        <span class="must_red">*</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">结束时间:</label>
                    <div class="controls">
                        <input type="text" name="post[to_time]" id="to_time"  size="21" class="J_date" >
                        <span class="must_red">*</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">工作地点:</label>
                    <div class="controls">
                        <input type="text"  name="post[work_address]" id="work_address" class="input input_hd J_title_color"  />
                        <span class="must_red">*</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">宝宝性别:</label>
                    <div class="controls">
                        <label><input type="radio" name="post[baby_gender]" id="gender_0" value="0" checked>女</label>
                        <label><input type="radio" name="post[baby_gender]" id="gender_1" value="1">男</label>
                        <span class="must_red">*</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">宝宝月龄:</label>
                    <div class="controls">
                        <input type="text"  name="post[baby_month]" id="baby_month" class="input input_hd J_title_color"  />
                        <span class="must_red">*</span>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">备注:</label>
                    <div class="controls">
                        <textarea name='post[remark]' id='remark' style='width:98%;height:100px;'></textarea>
                    </div>
                </div>

            </fieldset>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn_submit J_ajax_submit_btn">添加</button>
                <a class="btn" href="<?php echo U('Sdtmain/index');?>">返回</a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="/school/statics/js/common.js"></script>
<script type="text/javascript" src="/school/statics/js/content_addtop.js"></script>
<script type="text/javascript">
    //    var ue =  new UE.ui.Editor({initialFrameHeight:250});
    //    ue.render("introduce");
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
                                                name: '继续添加工作经历？',
                                                callback: function () {
                                                    reloadPage(window);
                                                    return true;
                                                },
                                                focus: true
                                            }, {
                                                name: '返回列表页',
                                                callback: function () {
                                                    location = '<?php echo U('Sdtmain/index');?>';
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