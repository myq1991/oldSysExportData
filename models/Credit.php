<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "credit".
 *
 * @property integer $member_id
 * @property integer $credit
 * @property integer $type_id
 * @property string $expireDate
 *
 * @property TypeCredit $type
 */
class Credit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'credit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'type_id'], 'required'],
            [['member_id', 'credit', 'type_id'], 'integer'],
            [['expireDate'], 'safe'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeCredit::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => '会员编号',
            'credit' => '剩余次数',
            'type_id' => '次卡种类代码',
            'expireDate' => '次卡到期时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeCredit::className(), ['id' => 'type_id']);
    }
}
