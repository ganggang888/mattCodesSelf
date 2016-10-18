<?php

namespace backend\controllers;

use Yii;
use backend\models\Menu;
use backend\models\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\data\Pagination;
use backend\models\Tree;
/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends Controller
{
    protected $nav = null; //一级菜单
    protected $tree = null;
    protected $menu = null;
    public function init()
    {
        parent::init();
        $this->nav = $this->navs();
        $this->menu = new Menu();
        $this->tree = new Tree();
    }


    //获取菜单树
    private function navs()
    {
        $nav = Menu::find()->where("parentid = 0")->all();
        if ($nav) {
            foreach ($nav as $vo) {
                $id = $vo->id;
                $after_nav = Menu::find()->where("parentid = '$id'")->all();
                if ($after_nav) {
                    foreach ($after_nav as $v) {
                        $son[] = ['nr'=>$v->name,'id'=>$vo->id];
                    }

                    $nr[] = ['nr'=>$vo->name,'id'=>$vo->id,'son'=>$son];
                } else {
                    $nr[] = ['nr'=>$vo->name,'id'=>$vo->id,'son'=>''];
                }
            }
            return $nr;
        }
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
     * Lists all Menu models.
     * @return mixed
     */
    public function actionLists()
    {
        $result = $this->menu->allInfo();
        $this->tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $newmenus=array();
        foreach ($result as $m){
            $newmenus[$m['id']]=$m;

        }
        foreach ($result as $n=> $r) {

            $result[$n]['level'] = $this->_get_level($r['id'], $newmenus);
            $result[$n]['parentid_node'] = ($r['parentid']) ? ' class="child-of-node-' . $r['parentid'] . '"' : '';

            $result[$n]['str_manage'] = '<a href="'.Url::toRoute(['menu/create','parentid'=>$r['id']]).'">添加子菜单</a> | <a target="_blank" href="'.Url::toRoute('menu/edit').'">修改</a> | <a class="J_ajax_del" href="'.Url::toRoute(['menu/delete','id'=>$r['id']]).'">删除</a> ';
            $result[$n]['status'] = $r['status'] ? "显示" : "隐藏";
            $result[$n]['app']=$r['app']."/".$r['model']."/".$r['action'];
        }
        $this->tree->init($result);
        $str = "<tr id='node-\$id' \$parentid_node>
                    <td style='padding-left:20px;'><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input input-order'></td>
                    <td>\$id</td>
                    <td>\$app</td>
                    <td>\$spacer\$name</td>
                    <td>\$status</td>
                    <td>\$str_manage</td>
                </tr>";

        $categorys = $this->tree->get_tree(0, $str);
      /*  $query = Menu::find();
        $pagination = new Pagination([
            'defaultPageSize'=>10,
            'totalCount'=>$query->count(),
        ]);
        $all = $query->orderBy('id,listorder')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();*/
        return $this->render('index', [
            'categorys' => $categorys,
            //'all' => $all,
            //'pagination' => $pagination,
        ]);
    }


    /**
     * 获取菜单深度
     * @param $id
     * @param $array
     * @param $i
     */
    protected function _get_level($id, $array = array(), $i = 0) {

        if ($array[$id]['parentid']==0 || empty($array[$array[$id]['parentid']]) || $array[$id]['parentid']==$id){
            return  $i;
        }else{
            $i++;
            return $this->_get_level($array[$id]['parentid'],$array,$i);
        }

    }
    /**
     * Displays a single Menu model.
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
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $parentid = Yii::$app->request->get('parentid');
        $tree = new Tree();
        $result = Menu::find()->orderBy("listorder ASC")->all();
        foreach ($result as $vo) {
            $data[] = $vo->attributes;
        }
        foreach ($data as $r) {
            $r['selected'] = $r['id'] == $parentid ? 'selected' : '';
            $array[] = $r;
        }
        $str = "<option value='\$id' \$selected>\$spacer \$name</option>";
        $tree->init($array);
        $select_categorys = $tree->get_tree(0, $str);
        $model = new Menu();
        if ($_POST) {
            //将数组组装成对象给予Menu
            $model->parentid = Yii::$app->request->post('parentid');
            $model->app = Yii::$app->$result->post('app');
            $model->model = Yii::$app->request->post('model');
            $model->action = Yii::$app->request->post('action');
            $model->data = Yii::$app->request->post('data');
            $model->icon = Yii::$app->request->post('icon');
            $model->name = Yii::$app->request->post('name');
            $model->remark = Yii::$app->request->post('remark');
            $model->status = Yii::$app->request->post('status');
            $model->type = Yii::$app->request->post('type');
            if ($model->save()) {
                $this->redirect(Url::toRoute('menu/index'));
            } else {
                $info = '';
                foreach ($model->errors as $vo) {
                    $info .= $vo[0]."\\n";
                }
                echo "<script>alert('".$info."');window.location='".Url::toRoute('menu/create')."'</script>";
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'firstMenu' => $this->nav,
                'select_categorys'=>$select_categorys,
            ]);
        }
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = $this->findModel(Yii::$app->request->post('id'));

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $row = $this->findModel(Yii::$app->request->get('id'))->delete();
        if ($row) {
            $this->redirect('menu/lists');
        } else {
            alert('删除错误');
            $this->redirect('menu/lists');
        }
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}