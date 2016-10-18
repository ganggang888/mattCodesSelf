<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "M_Baby".
 *
 * @property integer $Baby_ID
 * @property integer $UserId
 * @property string $Baby_Name
 * @property string $Baby_Date
 * @property integer $Baby_IsNormal
 * @property string $Baby_Parents
 * @property string $Baby_Guardian
 * @property string $Baby_GuardianCard
 * @property string $Baby_Tel
 * @property string $Baby_Addr
 * @property string $Baby_SpecialCase
 * @property integer $IsPowerUser
 * @property integer $Baby_ExpertID
 * @property integer $Baby_TeacherID
 * @property integer $Baby_Level
 * @property string $CreateDate
 * @property string $UpdateDate
 * @property string $Baby_Img
 * @property integer $Baby_AgeGroup
 * @property string $Baby_Info
 * @property integer $IsDelete
 * @property string $DeleteTime
 * @property string $Team
 * @property integer $Baby_Sex
 * @property integer $Order_Type
 * @property integer $Order_Money
 * @property integer $Feed_Type
 * @property integer $HandbookDays
 * @property integer $HandbookBuySuit
 * @property string $UseDate
 * @property integer $share1
 * @property integer $share2
 * @property integer $share3
 * @property integer $share4
 * @property integer $share5
 * @property integer $BandTeacher
 * @property integer $BandMother
 * @property integer $handbook_type
 * @property string $uuid
 * @property integer $score
 * @property string $listorder
 */
class MBaby extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'M_Baby';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserId', 'CreateDate', 'handbook_type', 'uuid', 'score', 'listorder'], 'required'],
            [['UserId', 'Baby_IsNormal', 'IsPowerUser', 'Baby_ExpertID', 'Baby_TeacherID', 'Baby_Level', 'Baby_AgeGroup', 'IsDelete', 'Baby_Sex', 'Order_Type', 'Order_Money', 'Feed_Type', 'HandbookDays', 'HandbookBuySuit', 'share1', 'share2', 'share3', 'share4', 'share5', 'BandTeacher', 'BandMother', 'handbook_type', 'score', 'listorder'], 'integer'],
            [['Baby_Date', 'CreateDate', 'UpdateDate', 'DeleteTime', 'UseDate'], 'safe'],
            [['Baby_SpecialCase', 'Baby_Img', 'Baby_Info', 'Team'], 'string'],
            [['Baby_Name', 'Baby_Parents', 'Baby_Guardian', 'Baby_GuardianCard', 'Baby_Tel'], 'string', 'max' => 50],
            [['Baby_Addr', 'uuid'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Baby_ID' => Yii::t('app', 'Baby  ID'),
            'UserId' => Yii::t('app', 'User ID'),
            'Baby_Name' => Yii::t('app', 'Baby  Name'),
            'Baby_Date' => Yii::t('app', 'Baby  Date'),
            'Baby_IsNormal' => Yii::t('app', 'Baby  Is Normal'),
            'Baby_Parents' => Yii::t('app', 'Baby  Parents'),
            'Baby_Guardian' => Yii::t('app', 'Baby  Guardian'),
            'Baby_GuardianCard' => Yii::t('app', 'Baby  Guardian Card'),
            'Baby_Tel' => Yii::t('app', 'Baby  Tel'),
            'Baby_Addr' => Yii::t('app', 'Baby  Addr'),
            'Baby_SpecialCase' => Yii::t('app', 'Baby  Special Case'),
            'IsPowerUser' => Yii::t('app', 'Is Power User'),
            'Baby_ExpertID' => Yii::t('app', 'Baby  Expert ID'),
            'Baby_TeacherID' => Yii::t('app', 'Baby  Teacher ID'),
            'Baby_Level' => Yii::t('app', 'Baby  Level'),
            'CreateDate' => Yii::t('app', 'Create Date'),
            'UpdateDate' => Yii::t('app', 'Update Date'),
            'Baby_Img' => Yii::t('app', 'Baby  Img'),
            'Baby_AgeGroup' => Yii::t('app', 'Baby  Age Group'),
            'Baby_Info' => Yii::t('app', 'Baby  Info'),
            'IsDelete' => Yii::t('app', 'Is Delete'),
            'DeleteTime' => Yii::t('app', 'Delete Time'),
            'Team' => Yii::t('app', 'Team'),
            'Baby_Sex' => Yii::t('app', 'Baby  Sex'),
            'Order_Type' => Yii::t('app', 'Order  Type'),
            'Order_Money' => Yii::t('app', 'Order  Money'),
            'Feed_Type' => Yii::t('app', 'Feed  Type'),
            'HandbookDays' => Yii::t('app', 'Handbook Days'),
            'HandbookBuySuit' => Yii::t('app', 'Handbook Buy Suit'),
            'UseDate' => Yii::t('app', 'Use Date'),
            'share1' => Yii::t('app', 'Share1'),
            'share2' => Yii::t('app', 'Share2'),
            'share3' => Yii::t('app', 'Share3'),
            'share4' => Yii::t('app', 'Share4'),
            'share5' => Yii::t('app', 'Share5'),
            'BandTeacher' => Yii::t('app', 'Band Teacher'),
            'BandMother' => Yii::t('app', 'Band Mother'),
            'handbook_type' => Yii::t('app', 'Handbook Type'),
            'uuid' => Yii::t('app', 'Uuid'),
            'score' => Yii::t('app', 'Score'),
            'listorder' => Yii::t('app', 'Listorder'),
        ];
    }



    /*
     * 获取宝宝个人信息
     * @param   $Baby_ID    Int     宝宝ID
     */
    public function getOne(int $Baby_ID)
    {
        $Baby_ID = (int)$Baby_ID;
        $sql = " SELECT * FROM {$this->_name} WHERE Baby_ID = $Baby_ID ";
        $rows = $this->_db->fetchRow($sql);
        $rows = !empty($rows)?get_object_vars($rows):'';
        return $rows;
    }
}