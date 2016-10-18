<?php
namespace frontend\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $realname
 * @property string $email
 * @property integer $status
 * @property string $registtime
 * @property string $token
 * @property string $ip
 * @property string $csrf_token
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'token'], 'string'],
            [['status', 'registtime'/*, 'token', 'ip', 'csrf_token'*/], 'required'],
            [['status'], 'integer'],
            [['registtime'], 'safe'],
            [['username'], 'string', 'max' => 16],
            [['realname', 'email'], 'string', 'max' => 32],
            [['ip'], 'string', 'max' => 50],
            [['csrf_token'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'realname' => Yii::t('app', 'Realname'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'registtime' => Yii::t('app', 'Registtime'),
            'token' => Yii::t('app', 'Token'),
            'ip' => Yii::t('app', 'Ip'),
            'csrf_token' => Yii::t('app', 'Csrf Token'),
        ];
    }

}