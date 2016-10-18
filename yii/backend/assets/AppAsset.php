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
        'css/theme.min.css',
        'css/font-awesome.min.css',
        'css/simplebootadmin.css',
        'css/simplebootadminindex.min.css',
        
    ];
    public $js = [
        'statics/js/jquery.js',
        'statics/js/wind.js',
        'statics/simpleboot/bootstrap/js/bootstrap.min.js',
        'statics/js/common.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
