<?php
use yii\helpers\Url;
?>
<script type="text/javascript">
    var catid = "12";
</script>

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
.list-dot li a.close,.list-dot-othors li a.close{ background: url("__ROOT__/statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
.list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>

<script type="text/javascript" src="js/wind.js"></script>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li><a href="<?=Url::to(['page/index']);?>">所有页面</a></li>
     <li class="active"><a href="javascript:;">添加页面</a></li>
  </ul>
  <form name="myform" id="myform"  action="<?=Url::to(['page/create-post']);?>" method="post" class="form-horizontal J_ajaxForms" enctype="multipart/form-data">
  <input type="hidden" name="post[post_type]" value="2">
  <div class="col-right">
    <div class="table_full">
      <table width="100%" cellpadding="2" cellspacing="2">
         <tr>
          <td><b>缩略图</b></td>
        </tr>
        <tr>
          <td>
          	<div  style="text-align: center;"><input type='hidden' name='smeta[thumb]' id='thumb' value=''>
			<a href='javascript:void(0);' onClick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
			<img src='images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
			<!-- <input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片"> -->
            <input type="button"  class="btn" onClick="$('#thumb_preview').attr('src','__ROOT__/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
            </div>
			</td>
        </tr>
        <tr>
          <td><b>发布时间</b></td>
        </tr>
        <tr>
          <td><input type="text" name="post[post_modified]" id="updatetime" value="" size="21" class="input length_3 J_datetime "></td>
        </tr>
        <tr>
          <td><b>状态</b></td>
        </tr>
        <tr>
          <td>
          	<span class="switch_list cc">
			<label><input type="radio" name="post[post_status]" value="1" checked><span>审核通过</span></label>
			<label><input type="radio" name="post[post_status]" value="0"  ><span>待审核</span></label>
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
              <th width="80">标题 </th>
              <td>
              	<input type="text" style="width:400px;" name="post[post_title]" id="title" value="" style="color:" class="input input_hd J_title_color" placeholder="请输入标题" onkeyup="strlen_verify(this, 'title_len', 160)" />
              	<span class="must_red">*</span>
              </td>
            </tr>
            <tr>
              <th width="80">模版</th>
              <td>
              		<php>
              			$tpl_list=sp_admin_get_tpl_file_list();
              			unset($tpl_list['page']);
              		</php>
              		<select style="min-width:290px;" name='smeta[template]'>
              			<option value="page">page{:C("TMPL_TEMPLATE_SUFFIX")}</option>
              			<foreach name="tpl_list" item="vo">
              				<option value="{$vo}">{$vo}{:C("TMPL_TEMPLATE_SUFFIX")}</option>
              			</foreach>
              		</select>
              </td>
            </tr>
            <tr>
              <th width="80">关键词</th>
              <td><input type='text' name='post[post_keywords]' id='keywords' value='' style='width:280px'   class='input' placeholder='请输入关键字'> 多关键词之间用空格隔开</td>
            </tr>
            <tr>
              <th width="80">摘要 </th>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <th width="80">内容</th>
              <td><span class="must_red">*</span><div id='content_tip'>
                <textarea name='post[post_excerpt]' id='description' style='width:98%;height:200px;'  ></textarea>
              </div>
				<script id="editor" type="text/plain" style="width:1024px;height:300px;"></script>
                <script type="text/javascript">
                //编辑器路径定义
                var editorURL = GV.DIMAUB;
                </script>
                <script type="text/javascript"  src="js/ueditor/ueditor.config.js"></script>
                <script type="text/javascript"  src="js/ueditor/ueditor.all.min.js"></script>
                <script type="text/javascript" charset="utf-8" src="js/ueditor/lang/zh-cn/zh-cn.js"></script>
				</td>
            </tr>
                        
        </tbody>
      </table>
    </div>
  </div>
  <div class="form-actions">
        <button class="btn btn-primary btn_submit J_ajax_submit_btn"type="submit">提交</button>
        <a class="btn" href="{:U('AdminPage/index')}">返回</a>
  </div>
 </form>
</div>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/content_addtop.js"></script>
<script type="text/javascript"> 
$(function () {
	$(".J_ajax_close_btn").on('click', function (e) {
	    e.preventDefault();
	    Wind.use("artDialog", function () {
	        art.dialog({
	            id: "question",
	            icon: "question",
	            fixed: true,
	            lock: true,
	            background: "#CCCCCC",
	            opacity: 0,
	            content: "您确定需要关闭当前页面嘛？",
	            ok:function(){
					setCookie("refersh_time",1);
					window.close();
					return true;
				}
	        });
	    });
	});
	/////---------------------
	 Wind.use('validate', 'ajaxForm', 'artDialog', function () {
			//javascript
	        
	            //编辑器
	            var ue = UE.getEditor('editor');
	            editorcontent.render( 'content' );
	            try{editorcontent.sync();}catch(err){};
	            //增加编辑器验证规则
	            jQuery.validator.addMethod('editorcontent',function(){
	                try{editorcontent.sync();}catch(err){};
	                return editorcontent.hasContents();
	            });
	            var form = $('form.J_ajaxForms');
	        //ie处理placeholder提交问题
	        if ($.browser.msie) {
	            form.find('[placeholder]').each(function () {
	                var input = $(this);
	                if (input.val() == input.attr('placeholder')) {
	                    input.val('');
	                }
	            });
	        }
	        //表单验证开始
	        form.validate({
				//是否在获取焦点时验证
				onfocusout:false,
				//是否在敲击键盘时验证
				onkeyup:false,
				//当鼠标掉级时验证
				onclick: false,
	            //验证错误
	            showErrors: function (errorMap, errorArr) {
					//errorMap {'name':'错误信息'}
					//errorArr [{'message':'错误信息',element:({})}]
					try{
						$(errorArr[0].element).focus();
						art.dialog({
							id:'error',
							icon: 'error',
							lock: true,
							fixed: true,
							background:"#CCCCCC",
							opacity:0,
							content: errorArr[0].message,
							cancelVal: '确定',
							cancel: function(){
								$(errorArr[0].element).focus();
							}
						});
					}catch(err){
					}
	            },
	            //验证规则
	            rules: {'post[post_title]':{required:1},'post[post_content]':{editorcontent:true}},
	            //验证未通过提示消息
	            messages: {'post[post_title]':{required:'请输入标题'},'post[post_content]':{editorcontent:'内容不能为空'}},
	            //给未通过验证的元素加效果,闪烁等
	            highlight: false,
	            //是否在获取焦点时验证
	            onfocusout: false,
	            //验证通过，提交表单
	            submitHandler: function (forms) {
	                $(forms).ajaxSubmit({
	                    url: form.attr('action'), //按钮上是否自定义提交地址(多按钮情况)
	                    dataType: 'json',
	                    beforeSubmit: function (arr, $form, options) {
	                        
	                    },
	                    success: function (data, statusText, xhr, $form) {
	                        if(data.status){
								setCookie("refersh_time",1);
								//添加成功
								Wind.use("artDialog", function () {
								    art.dialog({
								        id: "succeed",
								        icon: "succeed",
								        fixed: true,
								        lock: true,
								        background: "#CCCCCC",
								        opacity: 0,
								        content: data.info,
										button:[
											{
												name: '继续添加？',
												callback:function(){
													reloadPage(window);
													return true;
												},
												focus: true
											},{
												name: '返回列表',
												callback:function(){
													location.href="";
													return true;
												}
											}
										]
								    });
								});
							}else{
								isalert(data.info);
							}
	                    }
	                });
	            }
	        });
	    });
	////-------------------------
});
</script>
</body>