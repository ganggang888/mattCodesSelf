<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/simplebootadmin.css',
        'css/simplebootadminindex.min.css',
        'css/theme.min.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/index.js',
        'js/jquery.js',
    ];
    public $depends = [/*
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
}
