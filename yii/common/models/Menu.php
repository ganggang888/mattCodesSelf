<?php

namespace app\models;

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
            [['app', 'model', 'action'], 'string', 'max' => 20],
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
}