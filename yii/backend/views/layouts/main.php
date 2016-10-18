<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh_CN" style="overflow: hidden;">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Set render engine for 360 browser -->
<meta name="renderer" content="webkit">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>

<style>
.navbar .nav_shortcuts .btn {
	margin-top: 5px;
}
/*-----------------导航hack--------------------*/
.nav-list>li.open {
	position: relative;
}
.nav-list>li.open .back {
	display: none;
}
.nav-list>li.open .normal {
	display: inline-block !important;
}
.nav-list>li.open a {
	padding-left: 7px;
}
.nav-list>li .submenu>li>a {
	background: #fff;
}
.nav-list>li .submenu>li a>[class*="fa-"]:first-child {
	left: 20px;
}
.nav-list>li ul.submenu ul.submenu>li a>[class*="fa-"]:first-child {
	left: 30px;
}
.macro-component-tabitem { height: 39px!important}
select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input{ height: 30px!important}
/*----------------导航hack--------------------*/
</style>
<script>
//全局变量
var GV = {
	HOST:"/yii/backend/web/",
    DIMAUB: "/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<style>
#think_page_trace_open {
	left: 0 !important;
	right: initial !important;
}
</style>
<?php $this->beginBody() ?>


        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>


<?php $this->endBody() ?>
<script>
    $(document).ready(function() {
      Wind.css('treeTable');
      Wind.use('treeTable', function() {
        $("#menus-table").treeTable({
          indent : 20
        });
      });
    });

    setInterval(function() {
      var refersh_time = getCookie('refersh_time_admin_menu_index');
      if (refersh_time == 1) {
        reloadPage(window);
      }
    }, 1000);
    setCookie('refersh_time_admin_menu_index', 0);
  </script>
</html>
<?php $this->endPage() ?>
