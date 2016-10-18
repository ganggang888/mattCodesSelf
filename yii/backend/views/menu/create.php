<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<body class="J_scroll_fixed">
<div class="wrap jj">
  <ul class="nav nav-tabs">
    <li><a href="<?= Url::toRoute('menu/lists');?>">后台菜单</a></li>
    <li class="active"><a href="javascript:;">添加菜单</a></li>
  </ul>
  <div class="common-form">
    <form method="post" class="form-horizontal J_ajaxForm" action="">
      <fieldset>
        <div class="control-group">
          <label class="control-label">上级:</label>
          <div class="controls">
            <select name="parentid" class="normal_select">
              <?=$select_categorys;?>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">名称:</label>
          <div class="controls">
            <input type="text" class="input" name="name" value="">
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">控制器:</label>
          <div class="controls">
            <input type="text" class="input" name="app" id="app" value="">
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">模块:</label>
          <div class="controls">
            <input type="text" class="input" name="model" id="model" value="">
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">方法:</label>
          <div class="controls">
            <input type="text" class="input" name="action" id="action" value="">
            <span class="must_red">*</span> </div>
        </div>
        <div class="control-group">
          <label class="control-label">参数:</label>
          <div class="controls">
            <input type="text" class="input length_5" name="data" value="">
            例:id=3&amp;p=3 </div>
        </div>
        <div class="control-group">
          <label class="control-label">图标:</label>
          <div class="controls">
            <input type="text" class="input" name="icon" id="action" value="">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">备注:</label>
          <div class="controls">
            <textarea name="remark" rows="5" cols="57"></textarea>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">状态:</label>
          <div class="controls">
            <select name="status" class="normal_select">
              <option value="1">显示</option>
              <option value="0">隐藏</option>
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">类型:</label>
          <div class="controls">
            <select name="type" class="normal_select">
              <option value="1" selected>权限认证+菜单</option>
              <option value="0">只作为菜单</option>
            </select>
            注意：“权限认证+菜单”表示加入后台权限管理，纯碎是菜单项请不要选择此项。 </div>
        </div>
      </fieldset>
      <div class="form-actions">
        <input type="submit" value="添加" class="btn btn-primary btn_submit  J_ajax_submit_btn">
        <a class="btn" href="__URL__">返回</a> </div>
        
        
        
      <input type="hidden" value="<?=Yii::$app->request->getCsrfToken();?>" name="_csrf" />
    </form>
  </div>
</div>
