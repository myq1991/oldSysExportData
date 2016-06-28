<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card_usage".
 *
 * @property string $usageId
 * @property integer $member_id
 * @property string $description
 * @property double $expenditure_cash
 * @property integer $expenditure_credit
 * @property string $datetime
 * @property integer $operator_id
 *
 * @property Member $member
 * @property SysUser $operator
 */
class CardUsage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card_usage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usageId', 'member_id', 'description', 'expenditure_credit', 'operator_id'], 'required'],
            [['member_id', 'expenditure_credit', 'operator_id'], 'integer'],
            [['expenditure_cash'], 'number'],
            [['datetime'], 'safe'],
            [['usageId'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysUser::className(), 'targetAttribute' => ['operator_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usageId' => 'Usage ID',
            'member_id' => 'Member ID',
            'description' => 'Description',
            'expenditure_cash' => 'Expenditure Cash',
            'expenditure_credit' => 'Expenditure Credit',
            'datetime' => 'Datetime',
            'operator_id' => 'Operator ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(SysUser::className(), ['id' => 'operator_id']);
    }
}
