<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "classification".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $description
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $list_tpl
 * @property string $one_tpl
 */
class Classification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'name', 'description', 'seo_title', 'seo_keywords', 'seo_description', 'list_tpl', 'one_tpl'], 'required'],
            [['parent'], 'integer'],
            [['name', 'list_tpl', 'one_tpl'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 200],
            [['seo_title', 'seo_keywords'], 'string', 'max' => 50],
            [['seo_description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'name' => 'Name',
            'description' => 'Description',
            'seo_title' => 'Seo Title',
            'seo_keywords' => 'Seo Keywords',
            'seo_description' => 'Seo Description',
            'list_tpl' => 'List Tpl',
            'one_tpl' => 'One Tpl',
        ];
    }
}