<?php

namespace backend\controllers;

use Yii;
use backend\models\Classification;
use backend\models\ClassificationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\Tree;
use yii\helpers\Url;
/**
 * ClassificationController implements the CRUD actions for Classification model.
 */
class ClassificationController extends Controller
{


    public function init()
    {
        parent::init();
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Classification models.
     * @return mixed
     */
    public function actionIndex()
    {
        $tree = $this->actionTree();
        return $this->render('index', [
            'taxonomys' => $tree,
        ]);
    }

    /**
     * Displays a single Classification model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Classification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $id = Yii::$app->request->get('1')['id'];
        if (!$id) {
            $tree = $this->simple_tree(0);
        } else {
            $tree = $this->simple_tree($id);
        }

        return $this->render('create', [
            'tree' => $tree,
        ]);

    }


    /**
     * 文章分类提交.
     * 使用ajax方式
     * 具体字段请参照数据库表:classification
     * authot:ganggang
     * @return mixed
     */
    public function actionCreatePost()
    {
        //验证分类信息
        $model = new Classification();
        if (Yii::$app->request->post()) {
            $model->parent = Yii::$app->request->post('parent');
            $model->name = Yii::$app->request->post('name');
            $model->description = Yii::$app->request->post('description');
            $model->seo_title = Yii::$app->request->post('seo_title');
            $model->seo_keywords = Yii::$app->request->post('seo_keywords');
            $model->seo_description = Yii::$app->request->post('seo_description');
            $model->list_tpl = Yii::$app->request->post('list_tpl');
            $model->one_tpl = Yii::$app->request->post('one_tpl');
            if ($model->save()) {
                success('添加成功',Url::to(['classification/index']));
            } else {
                foreach ($model->errors as $vo)
                {
                    $error = $vo[0];
                }
                error($error);
            }
        }

    }

    /*
     * 修改
     */
    public function actionEdit()
    {
        $model = new Classification();
        //var_dump($_GET);
        $parent = Yii::$app->request->get('1')['parent'];
        $id = Yii::$app->request->get('1')['id'];
        $info  = Classification::findOne($id);
        //var_dump($info->attributes);
        $tree = $this->simple_tree($parent);
        //var_dump($tree);
        return $this->render('edit',[
            'info'=>$info->attributes,
            'tree'=>$tree,
        ]);
    }

    /*
     * 修改edit
     */
    public function actionEditPost()
    {
        //$model = new Classification();
        if (Yii::$app->request->post()) {
            $id = Yii::$app->request->post('id');
            $model = Classification::findOne($id);
            //$model->id = Yii::$app->request->post('id');
            $model->parent = Yii::$app->request->post('parent');
            $model->name = Yii::$app->request->post('name');
            $model->description = Yii::$app->request->post('description');
            $model->seo_title = Yii::$app->request->post('seo_title');
            $model->seo_keywords = Yii::$app->request->post('seo_keywords');
            $model->seo_description = Yii::$app->request->post('seo_description');
            $model->list_tpl = Yii::$app->request->post('list_tpl');
            $model->one_tpl = Yii::$app->request->post('one_tpl');
            if ($model->update()) {
                success('修改成功',Url::to(['classification/index']));
            } else {
                foreach ($model->errors as $vo)
                {
                    $error = $vo[0];
                }
                error($error);
            }
        }
    }
    /**
     * Deletes an existing Classification model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        if (Yii::$app->request->post()) {
            $this->findModel(Yii::$app->request->post('id'))->delete();
            ajaxReturn(0,0,'成功',1);
        }
        return $this->redirect(['index']);
    }
    /**
     * Finds the Classification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Classification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classification::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * 获取内容一级分类
     *
     */
    private function getTerm()
    {
        $info = Classification::find()->where("parent = 0")->all();
        if ($info) {
            return $info;
        } else {
            return false;
        }
    }

    /**
     * 文章分类获取,最多三层
     */
    public function actionTree()
    {
        $info = Classification::find()->all();
        foreach ($info as $vo) {
            $result[] = $vo->attributes;
        }
        //var_dump($result);exit;
        $tree = new Tree();
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        foreach ($result as $r) {
            $r['str_manage'] = '<a href="'.Url::to(["classification/create",array('id'=>$r[id],'rid'=>123)]).'">添加子类</a> | <a href="'.Url::to(["classification/edit",array('parent'=>$r[parent],'id'=>$r[id])]).'">修改</a> | <a class="J_ajax_del" href="'.Url::to(["classification/delete",array('id'=>$r[id])]).'">删除</a> ';
            $url='';
            $r['url'] = $url;
            $r['id']=$r['id'];
            $r['parentid']=$r['parent'];
            $array[] = $r;
        }
        $tree->init($array);
        $str = "<tr>
					<td>\$id</td>
					<td>\$spacer <a href='\$url' target='_blank'>\$name</a></td>
					<td>\$str_manage</td>
				</tr>";
        $taxonomys = $tree->get_tree(0, $str);
        return $taxonomys;


    }

    /*
     * 添加分类时树形结构
     */
    public function simple_tree($parentid)
    {
        $info = Classification::find()->all();
        foreach ($info as $vo) {
            $result[] = $vo->attributes;
        }
        $tree = new Tree();
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';

        $new_terms=array();
        foreach ($result as $r) {
            $r['id']=$r['id'];
            $r['parentid']=$r['parent'];
            $r['selected']= (!empty($parentid) && $r['id']==$parentid)? "selected":"";
            $new_terms[] = $r;
        }
        $tree->init($new_terms);
        $tree_tpl="<option value='\$id' \$selected>\$spacer\$name</option>";
        $taxonomys=$tree->get_tree(0,$tree_tpl);
        return $taxonomys;
    }
}