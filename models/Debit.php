<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "debit".
 *
 * @property integer $member_id
 * @property double $balance
 * @property integer $type_id
 * @property string $expireDate
 *
 * @property TypeDebit $type
 */
class Debit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'debit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'type_id'], 'required'],
            [['member_id', 'type_id'], 'integer'],
            [['balance'], 'number'],
            [['expireDate'], 'safe'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeDebit::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => '会员编号',
            'balance' => '卡余额',
            'type_id' => '储值卡类别号',
            'expireDate' => '卡到期时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeDebit::className(), ['id' => 'type_id']);
    }
}
