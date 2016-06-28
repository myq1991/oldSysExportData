<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "swim_item".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property double $member_offer
 */
class SwimItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'swim_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['price', 'member_offer'], 'number'],
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
            'id' => '项目编号',
            'name' => '项目名称',
            'price' => '项目价格',
            'member_offer' => '会员折扣率',
        ];
    }
}
