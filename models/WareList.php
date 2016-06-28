<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ware_list".
 *
 * @property string $code
 * @property string $name
 * @property integer $stock
 * @property double $price
 * @property double $price_range
 * @property double $member_offer
 */
class WareList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ware_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['stock'], 'integer'],
            [['price', 'price_range', 'member_offer'], 'number'],
            [['code', 'name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => '商品编号',
            'name' => '商品名称',
            'stock' => '商品库存',
            'price' => '商品价格',
            'price_range' => '商品议价范围',
            'member_offer' => '会员折扣率',
        ];
    }
}
