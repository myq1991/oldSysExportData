<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "swim_session".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property string $time_start
 * @property string $time_end
 * @property double $member_offer
 */
class SwimSession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'swim_session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['price', 'member_offer'], 'number'],
            [['time_start', 'time_end'], 'safe'],
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
            'id' => '场次编号',
            'name' => '场次名称',
            'price' => '场次价格',
            'time_start' => '场次开始时间',
            'time_end' => '场次结束时间',
            'member_offer' => '场次会员折扣',
        ];
    }
}
