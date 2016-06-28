<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_credit".
 *
 * @property integer $id
 * @property string $name
 * @property string $time_start
 * @property string $time_end
 * @property double $price
 * @property integer $default_credit
 * @property integer $visiable
 *
 * @property Credit[] $credits
 */
class TypeCredit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_credit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'time_start', 'time_end'], 'required'],
            [['time_start', 'time_end'], 'safe'],
            [['price'], 'number'],
            [['default_credit', 'visiable'], 'integer'],
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
            'name' => '类别名称',
            'time_start' => '开始时间',
            'time_end' => '结束时间',
            'price' => 'Price',
            'default_credit' => '卡内初始次数',
            'visiable' => 'Visiable',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCredits()
    {
        return $this->hasMany(Credit::className(), ['type_id' => 'id']);
    }
}
