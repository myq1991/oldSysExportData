<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_debit".
 *
 * @property integer $id
 * @property string $name
 * @property string $time_start
 * @property string $time_end
 * @property double $price
 * @property double $default_balance
 * @property integer $visiable
 *
 * @property Debit[] $debits
 */
class TypeDebit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_debit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'time_start', 'time_end'], 'required'],
            [['time_start', 'time_end'], 'safe'],
            [['price', 'default_balance'], 'number'],
            [['visiable'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '类别编号',
            'name' => '类别名字',
            'time_start' => '开始时间',
            'time_end' => '结束时间',
            'price' => 'Price',
            'default_balance' => '卡内初始余额',
            'visiable' => 'Visiable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDebits()
    {
        return $this->hasMany(Debit::className(), ['type_id' => 'id']);
    }
}
