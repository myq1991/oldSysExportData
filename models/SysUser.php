<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sys_user".
 *
 * @property integer $id
 * @property string $name
 * @property string $password
 * @property integer $isAdministrator
 * @property integer $isLocked
 * @property integer $cash_role
 * @property integer $ware_role
 * @property integer $training_role
 *
 * @property CardUsage[] $cardUsages
 * @property TrainingRegister[] $trainingRegisters
 * @property Transactions[] $transactions
 */
class SysUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'password'], 'required'],
            [['isAdministrator', 'isLocked', 'cash_role', 'ware_role', 'training_role'], 'integer'],
            [['name', 'password'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户编号',
            'name' => '用户名',
            'password' => '用户密码',
            'isAdministrator' => '是否拥有管理员权限',
            'isLocked' => 'Is Locked',
            'cash_role' => 'Cash Role',
            'ware_role' => 'Ware Role',
            'training_role' => 'Training Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardUsages()
    {
        return $this->hasMany(CardUsage::className(), ['operator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingRegisters()
    {
        return $this->hasMany(TrainingRegister::className(), ['operator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['operator_id' => 'id']);
    }
}
