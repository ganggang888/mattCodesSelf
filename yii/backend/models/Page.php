<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $title
 * @property string $tpl
 * @property string $keywords
 * @property integer $excerpt
 * @property string $content
 * @property string $hits
 * @property integer $status
 * @property string $add_time
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'tpl', 'keywords', 'excerpt', 'content', 'hits', 'status', 'add_time'], 'required'],
            [['excerpt', 'hits', 'status'], 'integer'],
            [['content'], 'string'],
            [['add_time'], 'safe'],
            [['title', 'keywords'], 'string', 'max' => 100],
            [['tpl'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'tpl' => 'Tpl',
            'keywords' => 'Keywords',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
            'hits' => 'Hits',
            'status' => 'Status',
            'add_time' => 'Add Time',
        ];
    }
}