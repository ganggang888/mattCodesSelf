<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/10
 * Time: 11:21
 */
namespace backend\controllers;

use Yii;
use common\models\LoginForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class TopController extends Controller
{
    public function init(){
        parent::init();
    }
}