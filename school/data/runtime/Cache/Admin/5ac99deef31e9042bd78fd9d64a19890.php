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
    .t_head{
        text-align: center;
        background-color: #dbe5e7;
        font-size: 20px;
        height: 30px;
        float: inherit;
    }
    body fieldset {
        border: 1px solid #D8D8D8;
        padding: 10px;
        background-color: #FFF;
    }
    .table_full th{

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
    .list-dot li a.close,.list-dot-othors li a.close{ background: url("/school/statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
    .list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
    .list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
<script type="text/javascript"  src="/school/statics/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript"  src="/school/statics/js/ueditor/ueditor.all.min.js"></script>

</head>
<body>
    <div class="wrap J_check_wrap">
        <ul class="nav nav-tabs">
            <li><a href="<?php echo U('Sdtmain/index');?>">学员列表</a></li>
            <li class="active"><a href="<?php echo U('Sdtmain/edit');?>" target="_self">修改学员</a></li>
        </ul>
        <form name="myform" id="myform"  action="<?php echo U('Sdtmain/edit_post',array('id'=>$student['id']));?>" method="post" class="form-horizontal J_ajaxForms" enctype="multipart/form-data">

        <!--<div class="col-right">-->
        <!--<-->
        <!--</div>-->
        <div class="col-auto">
        <div class="table_full">
        <table width="100%" cellpadding="2" cellspacing="2">
        <tr><td colspan="6"><div class="t_head"><span>基本信息</span></div></td></tr>
        <tr>
            <th>填表日期</th>
            <td>
                <input type="text" name="post[fill_time]" id="filltime" value="<?php echo ($student["fill_time"]); ?>" size="21" class="J_date" >
            </td>
            <th>入学日期</th>
            <td><input type="text"  name="post[start_time]" id="starttime" value="<?php echo ($student["start_time"]); ?>" size="21" class="J_date"></td>
            <td rowspan="11">
                <div  style="text-align: center;float: left"><input type='hidden' name='post[photo]' id='thumb' value=''>
                    <a href='javascript:void(0);' onClick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
                        <?php if(empty($student['photo'])): ?><img src='/school/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' />
                            <?php else: ?>
                            <img src='<?php echo ($student["photo"]); ?>' id='thumb_preview' width='135' height='113' style='cursor:hand' /><?php endif; ?>
                    </a>
                    <!--<input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片"> -->
                    <br/>
                    <input type="button"  class="btn" onClick="$('#thumb_preview').attr('src','/school/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
                </div>
            </td>
        </tr>
        <tr>
            <th>姓名</th>
            <td><input type="text" disabled="disabled"  name="post[name]" id="name"  required value="<?php echo ($student["name"]); ?>" style="color:red;" class="input input_hd J_title_color" placeholder="请输入姓名" onKeyUp="strlen_verify(this, 'title_len', 160)" /></td>
            <th>性别</th>
            <td>
                <?php $check_0 = $student['gender'] == 0?'checked':''; $check_1 = $student['gender'] == 1?'checked':''; ?>
                <span class="switch_list cc">
                    <label><input type="radio" name="post[gender]" id="gender_0" value="0" <?php echo ($check_0); ?>>女</label>
                    <label><input type="radio" name="post[gender]" id="gender_1" value="1" <?php echo ($check_1); ?>>男</label>
                </span>
            </td>
        </tr>
        <tr>
            <th>学历</th>
            <td>
                <select style="min-width:200px;" name='post[education]'>
                    <?php if(is_array($education)): foreach($education as $key=>$vo): $edu_checked = $student['education'] == $key?"selected":""; ?>
                        <option value="<?php echo ($key); ?>" <?php echo ($edu_checked); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
            <th>籍贯</th>
            <td><input type="text"  name="post[home]"  required value="<?php echo ($student["home"]); ?>"id="home" class="input input_hd J_title_color"  /></td>
            <td></td>
        </tr>
        <tr>
            <th>星座</th>
            <td>
                <select style="min-width:200px;" name='post[constellation]'>
                    <?php if(is_array($constellation)): foreach($constellation as $key=>$vo): $con_checked = $student['constellation'] == $key?"selected":""; ?>
                        <option value="<?php echo ($key); ?>" <?php echo ($con_checked); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
            <th>属相</th>
            <td>
                <select style="min-width:200px;" name='post[zodiac]'>
                    <?php if(is_array($zodiac)): foreach($zodiac as $key=>$vo): $zod_checked = $student['zodiac'] == $key?"selected":""; ?>
                        <option value="<?php echo ($key); ?>" <?php echo ($zod_checked); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>血型</th>
            <td>
                <select style="min-width:200px;" name='post[blood]'>
                    <?php if(is_array($blood)): foreach($blood as $key=>$vo): $bld_checked = $student['blood'] == $key?"selected":""; ?>
                        <option value="<?php echo ($key); ?>" <?php echo ($bld_checked); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
            <th>出生日期</th>
            <td>
                <input type="text" name="post[birthday]" value="<?php echo ($student["birthday"]); ?>"  id="birthday" size="21" class="J_date" >
            </td>
        </tr>

        <tr>
            <th>政治面貌</th>
            <td>
                <input type="text"  name="post[politics]" value="<?php echo ($student["politics"]); ?>" id="politics" class="input input_hd J_title_color"  />
            </td>
            <th>户籍类别</th>
            <td>
                 <span class="switch_list cc">
                     <?php $home_check_0 = $student['home_status'] == 0?'checked':''; $home_check_1 = $student['home_status'] == 1?'checked':''; ?>
                    <label><input type="radio" name="post[home_status]" id="home_status_0" value="0" <?php echo ($home_check_0); ?>>农村</label>
                    <label><input type="radio" name="post[home_status]" id="home_status_1" value="1" <?php echo ($home_check_1); ?>>城市</label>
                </span>
            </td>
        </tr>
        <tr>
            <th>联系电话</th>
            <td>
                <input type="text"  name="post[phone]" value="<?php echo ($student["phone"]); ?>" id="phone" class="input input_hd J_title_color"  />
            </td>
            <th>身份证号码</th>
            <td>
                <input type="text" disabled="disabled" name="post[id_card]" id="id_card" value="<?php echo ($student["id_card"]); ?>"  class="input input_hd J_title_color"  />
            </td>
        </tr>
        <tr>
            <th>婚姻状况</th>
            <td>
                <select style="min-width:200px;" name='post[marriage]'>
                    <?php if(is_array($marriage)): foreach($marriage as $key=>$vo): $mar_checked = $student['marriage'] == $key?"selected":""; ?>
                        <option value="<?php echo ($key); ?>" <?php echo ($mar_checked); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
            <th>生育状况</th>
            <td>
                <?php $birth_check_0 = $student['birth_status'] == 0?'checked':''; $birth_check_1 = $student['birth_status'] == 1?'checked':''; ?>
                <span class="switch_list cc">
                    <label><input type="radio" name="post[birth_status]" id="birth_status_0" value="0" <?php echo ($birth_check_0); ?>>已育</label>
                    <label><input type="radio" name="post[birth_status]" id="birth_status_1" value="1" <?php echo ($birth_check_1); ?>>未育</label>
                </span>
            </td>
        </tr>
        <tr>
            <th>传染病史</th>
            <td>
                <input type="text"  name="post[medical_history]" value="<?php echo ($student["medical_history"]); ?>" id="medical_history" class="input input_hd J_title_color"  />
            </td>
            <th>英语能力</th>
            <td>
                <select style="min-width:200px;" name='post[english]'>
                    <?php if(is_array($language)): foreach($language as $key=>$vo): $en_checked = $student['english'] == $key?"selected":""; ?>
                        <option value="<?php echo ($key); ?>" <?php echo ($en_checked); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>普通话能力</th>
            <td>
                <select style="min-width:200px;" name='post[putonghua]'>

                    <?php if(is_array($language)): foreach($language as $key=>$vo): $pt_checked = $student['putonghua'] == $key?"selected":""; ?>
                        <option value="<?php echo ($key); ?>" <?php echo ($pt_checked); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
            <th>上海话能力</th>
            <td>
                <select style="min-width:200px;" name='post[shanghaihua]'>
                    <?php if(is_array($language)): foreach($language as $key=>$vo): $sh_checked = $student['shanghaihua'] == $key?"selected":""; ?>
                        <option value="<?php echo ($key); ?>" <?php echo ($sh_checked); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
                        <th>学号</th>
                        <td colspan="3" >
                            <input type="text" style="width: 720px" name="post[student_id]" id="home_address" value="<?php echo ($student["student_id"]); ?>" class="input input_hd J_title_color"  />
                        </td>

                    </tr>
                    <tr>
                        <th>年龄</th>
                        <td colspan="3" >
                            <input type="text" style="width: 720px" name="post[age]" id="home_address" value="<?php echo ($student["age"]); ?>" class="input input_hd J_title_color"  />
                        </td>

                    </tr>
        <tr>
            <th>户口所在地地址</th>
            <td colspan="3" >
                <input type="text" style="width: 720px" name="post[home_address]" value="<?php echo ($student["home_address"]); ?>" id="home_address" class="input input_hd J_title_color"  />
            </td>

        </tr>
        <tr>
            <th>联系地址</th>
            <td colspan="3" >
                <input type="text" style="width: 720px" name="post[address]" value="<?php echo ($student["address"]); ?>" id="address" class="input input_hd J_title_color"  />
            </td>

        </tr>
        <tr>
            <th>获得证书</th>
            <td colspan="3">
                <div style="width:735px;height: 100px;border: 100px;overflow-y:auto;">
                    <?php if(is_array($certificate)): foreach($certificate as $key=>$vo): ?><label>
                            <?php $checked = in_array($vo['title'],$sdt_cer)?"checked":""; ?>
                            <input type="checkbox"  name="certificate[]" value="<?php echo ($vo["id"]); ?>" <?php echo ($checked); ?>><?php echo ($vo["title"]); ?> </input>
                        </label><?php endforeach; endif; ?>
                </div>
            </td>
        </tr>
        <tr><td colspan="6"><div class="t_head"><span>紧急联系人</span></div></td></tr>
        <?php $contact = json_decode($student['em_contact'],true); ?>
        <tr>
            <th>姓名</th>
            <td>
                <input type="text" name="contact[name]" value="<?php echo ($contact["name"]); ?>" id="lxr_name" class="input input_hd J_title_color"  />
            </td>
            <th>联系电话</th>
            <td>
                <input type="text" name="contact[phone]" value="<?php echo ($contact["phone"]); ?>" id="lxr_phone" class="input input_hd J_title_color"  />
            </td>
            <th>与紧急联系人关系</th>
            <td>
                <input type="text" name="contact[relation]" value="<?php echo ($contact["relation"]); ?>" id="lxr_relation" class="input input_hd J_title_color"  />
            </td>
        </tr>
        <tr><td colspan="6"><div class="t_head"><span>家庭成员</span></div></td></tr>
        <tr>
            <th>称谓</th><th>姓名</th><th>性别</th><th>年龄</th><th>电话</th><th>职业</th>
        </tr>
        <tr>
            <?php $family = json_decode($student['family'],true); $father = $family['father']; $mother = $family['mother']; $mate = $family['mate']; $child1 = $family['child'][0]; $child2 = $family['child'][1]; ?>
            <th>父</th>
            <td><input type="text"  name="father[name]" value="<?php echo ($father["name"]); ?>" id="f_name" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="father[gender]" value="<?php echo ($father["gender"]); ?>" id="f_gender" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="father[age]" value="<?php echo ($father["age"]); ?>" id="f_age" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="father[phone]" value="<?php echo ($father["phone"]); ?>" id="f_phone" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="father[position]" value="<?php echo ($father["position"]); ?>" id="f_position" class="input input_hd J_title_color"  /></td>
        </tr>
        <tr>
            <th>母</th>
            <td><input type="text"  name="mother[name]" value="<?php echo ($mother["name"]); ?>" id="m_name" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="mother[gender]" value="<?php echo ($mother["gender"]); ?>" id="m_gender" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="mother[age]" value="<?php echo ($mother["age"]); ?>" id="m_age" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="mother[phone]" value="<?php echo ($mother["phone"]); ?>" id="m_phone" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="mother[position]" value="<?php echo ($mother["position"]); ?>" id="m_position" class="input input_hd J_title_color"  /></td>
        </tr>
        <tr>
            <th>配偶</th>
            <td><input type="text"  name="mate[name]" value="<?php echo ($mate["name"]); ?>" id="mt_name" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="mate[gender]" value="<?php echo ($mate["gender"]); ?>" id="mt_gender" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="mate[age]" value="<?php echo ($mate["age"]); ?>" id="mt_age" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="mate[phone]" value="<?php echo ($mate["phone"]); ?>" id="mt_phone" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="mate[position]" value="<?php echo ($mate["position"]); ?>" id="mt_position" class="input input_hd J_title_color"  /></td>
        </tr>
        <tr>
            <th>子女1</th>
            <td><input type="text"  name="child1[name]" value="<?php echo ($child1["name"]); ?>" id="c_name" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="child1[gender]" value="<?php echo ($child1["gender"]); ?>" id="c_gender" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="child1[age]" value="<?php echo ($child1["age"]); ?>" id="c_age" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="child1[phone]" value="<?php echo ($child1["phone"]); ?>" id="c_phone" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="child1[position]" value="<?php echo ($child1["position"]); ?>" id="c_position" class="input input_hd J_title_color"  /></td>
        </tr>
        <tr>
            <th>子女2</th>
            <td><input type="text"  name="child2[name]" value="<?php echo ($child2["name"]); ?>" id="c2_name" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="child2[gender]" value="<?php echo ($child2["gender"]); ?>" id="c2_gender" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="child2[age]" value="<?php echo ($child2["age"]); ?>" id="c2_age" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="child2[phone]" value="<?php echo ($child2["phone"]); ?>" id="c2_phone" class="input input_hd J_title_color"  /></td>
            <td><input type="text"  name="child2[position]" value="<?php echo ($child2["position"]); ?>" id="c2_position" class="input input_hd J_title_color"  /></td>
        </tr>
        <tr><td colspan="6"><div class="t_head"><span>个性化个人介绍</span></div></td></tr>
        <?php $introduce = json_decode($student['introduce'],true); ?>
        <tr>
            <th>个性</th>
            <td colspan="3" >
                <input type="text" style="width: 720px" name="introduce[character]" value="<?php echo ($introduce["character"]); ?>" id="itr_character" class="input input_hd J_title_color"  />
            </td>
        </tr>
        <tr>
            <th>特长</th>
            <td colspan="3" >
                <input type="text" style="width: 720px" name="introduce[special]" value="<?php echo ($introduce["special"]); ?>" id="itr_special" class="input input_hd J_title_color"  />
            </td>
        </tr>
        <tr>
            <th>缺点不足</th>
            <td colspan="3" >
                <input type="text" style="width: 720px" name="introduce[short]" value="<?php echo ($introduce["short"]); ?>" id="itr_short" class="input input_hd J_title_color"  />
            </td>
        </tr>
        <tr>
            <th>其它(个性短语)</th>
            <td colspan="3" >
                <input type="text" style="width: 720px" name="introduce[word]" value="<?php echo ($introduce["word"]); ?>" id="itr_word" class="input input_hd J_title_color"  />
            </td>
        </tr>
        </table>


        <div class="table_full">
        </div>
        </div>
        </div>
        <div class="form-actions">
            <button class="btn btn-primary btn_submit J_ajax_submit_btn"type="submit">提交</button>
            <a class="btn" href="<?php echo U('Sdtmain/index');?>">返回</a>
        </div>
        </form>
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
                                            content: "修改成功!",
                                            button: [
                                                {
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