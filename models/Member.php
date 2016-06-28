<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $card_code
 * @property string $name
 * @property string $telephone
 * @property string $password
 * @property string $fingerprint
 * @property integer $isLost
 * @property string $issueDate
 *
 * @property CardUsage[] $cardUsages
 * @property TrainingRegister[] $trainingRegisters
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['card_code', 'name', 'telephone', 'issueDate'], 'required'],
            [['fingerprint'], 'string'],
            [['isLost'], 'integer'],
            [['issueDate'], 'safe'],
            [['card_code'], 'string', 'max' => 100],
            [['name', 'telephone', 'password'], 'string', 'max' => 50],
            [['card_code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '会员编号',
            'card_code' => '会员持卡卡号',
            'name' => '会员名字',
            'telephone' => '会员电话',
            'password' => '会员密码',
            'fingerprint' => '会员指纹',
            'isLost' => '卡是否挂失',
            'issueDate' => '发卡日期',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardUsages()
    {
        return $this->hasMany(CardUsage::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingRegisters()
    {
        return $this->hasMany(TrainingRegister::className(), ['member_id' => 'id']);
    }
}
