<!DOCTYPE html>
<html lang="zh_CN" style="overflow: hidden;">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta charset="utf-8">
    <title>ThinkCMF</title>
    <meta name="description" content="This is page-header (.page-header &gt; h1)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/theme.min.css" rel="stylesheet">
    <link href="css/simplebootadmin.css" rel="stylesheet">
    <link href="css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/cmf/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link rel="stylesheet" href="css/simplebootadminindex.min.css?">
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/cmf/statics/simpleboot/css/simplebootadminindex-ie.css?" />
    <![endif]-->
    <script>
        //全局变量
        var GV = {
            HOST:"localhost",
            DIMAUB: "/advanced/",
            JS_ROOT: "statics/js/",
            TOKEN: ""
        };
    </script>
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
        /*----------------导航hack--------------------*/
    </style>
    <style>
        #think_page_trace_open {
            left: 0 !important;
            right: initial !important;
        }
    </style>
</head>
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

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php $this->beginPage() ?>
    <?php $this->beginBody() ?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    <?php $this->endBody() ?>
<?php $this->endPage() ?>

</html>