<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<body class="J_scroll_fixed">
<link href="http://m.matteducation.com/statics/js/artDialog/skins/default.css" rel="stylesheet">
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
    <li class="active"><a href="<?= Url::toRoute('menu/index');?>">后台菜单</a></li>
    <li><a href="<?= Url::toRoute('menu/create');?>">添加菜单</a></li>
  </ul>
  <form class="J_ajaxForm" action="{:U('Menu/listorders')}" method="post">
    <div class="table-actions"> </div>
    <table class="table table-hover table-bordered table-list" id="menus-table">
      <thead>
        <tr>
          <th width="80">排序</th>
          <th width="50">ID</th>
          <th>菜单名称</th>
          <th>model</th>
          <th width="80">状态</th>
          <th width="150">管理操作</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $categorys;?>
      </tbody>
    </table>
    <div class="table-actions"> </div>
  </form>
</div>

</body>
