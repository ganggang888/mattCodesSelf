<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $parentid
 * @property string $app
 * @property string $model
 * @property string $action
 * @property string $data
 * @property integer $type
 * @property integer $status
 * @property string $name
 * @property string $icon
 * @property string $remark
 * @property integer $listorder
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid', 'type', 'status', 'listorder'], 'integer'],
            [['app', 'model', 'action', 'data', 'name', 'remark'], 'required'],
            //[['app', 'model', 'action'], 'string', 'max' => 20],
            [['data', 'name', 'icon'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parentid' => 'Parentid',
            'app' => 'App',
            'model' => 'Model',
            'action' => 'Action',
            'data' => 'Data',
            'type' => 'Type',
            'status' => 'Status',
            'name' => 'Name',
            'icon' => 'Icon',
            'remark' => 'Remark',
            'listorder' => 'Listorder',
        ];
    }


    public function createTree($array,$parentid=0)
    {
        $result = array();
        foreach($array as $key => $val){
            if($val['parentid'] == $parentid) {
            $tmp = $array[$key];unset($array[$key]);
            count(self::createTree($array,$val['id'])) > 0 && $tmp['children'] = self::createTree($array,$val['id']);
            $result[$key] = $tmp;
            }
        }
        return $result;
    }

   public function get_tree()
   {
        $result = $this->find()->all();
        foreach ($result as $key=>$vo) {
            $data[] = $vo->attributes;
        }
        $info = $this->createTree($data);
        return $info;
   }

   //所有数据
   public function allInfo()
   {
        $result = $this->find()->all();
        foreach ($result as $vo) {
            $data[] = $vo->attributes;
        }
        return $data;
   }
}