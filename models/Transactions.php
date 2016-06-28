<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transactions".
 *
 * @property string $transactionId
 * @property string $description
 * @property double $paid_up
 * @property string $datetime
 * @property integer $operator_id
 * @property integer $isCanceled
 *
 * @property SysUser $operator
 */
class Transactions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transactionId', 'description', 'operator_id'], 'required'],
            [['paid_up'], 'number'],
            [['datetime'], 'safe'],
            [['operator_id', 'isCanceled'], 'integer'],
            [['transactionId'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 100],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysUser::className(), 'targetAttribute' => ['operator_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'transactionId' => 'Transaction ID',
            'description' => 'Description',
            'paid_up' => 'Paid Up',
            'datetime' => 'Datetime',
            'operator_id' => 'Operator ID',
            'isCanceled' => 'Is Canceled',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(SysUser::className(), ['id' => 'operator_id']);
    }
}
