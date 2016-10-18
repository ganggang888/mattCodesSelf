<?php
use yii\helpers\Url;
?>
<script>
//全局变量
var GV = {
	HOST:"localhost",
    DIMAUB: "/advanced/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>

<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#A" data-toggle="tab">基本属性</a></li>
    <li><a href="#B" data-toggle="tab">SEO设置</a></li>
    <li><a href="#C" data-toggle="tab">模板设置</a></li>
  </ul>
  <form class="form-horizontal J_ajaxForm" name="myform" id="myform" action="<?=Url::to(['classification/edit-post']);?>" method="post">
    <div class="tabbable">
      <div class="tab-content">
        <div class="tab-pane active" id="A">
          <table cellpadding="2" cellspacing="2" width="100%">
            <tbody>
              <tr>
                <td width="140">上级:</td>
                <td><select name="parent" class="normal_select">
                    <option value="0">作为一级分类</option>
                    
											<?=$tree?>
									
                  </select></td>
              </tr>
              <tr>
                <td>名称:</td>
                <td><input type="text" class="input" name="name" id="name" value="<?=$info['name'];?>">
                  <span class="must_red">*</span></td>
              </tr>
              <tr>
                <td>描述:</td>
                <td><textarea name="description" rows="5" id="description" cols="57"><?=$info['description'];?></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="tab-pane" id="B">
          <table cellpadding="2" cellspacing="2" width="100%">
            <tbody>
              <tr>
                <td width="180">SEO标题:</td>
                <td><input type="text" class="input" name="seo_title" id="seo_title" value="<?=$info['seo_title'];?>"></td>
              </tr>
              <tr>
                <td>SEO关键字:</td>
                <td><input type="text" class="input" name="seo_keywords" id="seo_keywords" value="<?=$info['seo_keywords'];?>"></td>
              </tr>
              <tr>
                <td>SEO描述:</td>
                <td><textarea name="seo_description" id="seo_description" rows="5" cols="57"><?=$info['seo_description'];?></textarea></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="tab-pane" id="C">
          <table cellpadding="2" cellspacing="2" width="100%">
            <tbody>
              <tr>
                <td width="180">列表页模板:</td>
                <td><input type="text" class="input" name="list_tpl" id="list_tpl" value="<?=$info['list_tpl'];?>"></td>
              </tr>
              <tr>
                <td>单文章模板:</td>
                <td><input type="text" class="input" name="one_tpl" id="one_tpl" value="<?=$info['one_tpl'];?>">
                  <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken();?>" />
                  <input type="hidden" name="id" value="<?=$info['id'];?>" />
                  </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="form-actions">
      <button class="btn btn-primary btn_submit J_ajax_submit_btn"type="submit">修改</button>
      <a class="btn" href="javascript:;" onClick="history.go(-1)">返回</a> </div>
  </form>
</div>
<script type="text/javascript" src="js/wind.js"></script>
<script type="text/javascript" src="js/common.js"></script>
</body>