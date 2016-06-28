<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training".
 *
 * @property integer $member_id
 * @property integer $residue
 * @property integer $used
 * @property string $portrait
 * @property integer $isLocked
 * @property integer $type_id
 * @property string $year
 * @property double $fee_then
 * @property string $expireDate
 *
 * @property TypeTraining $type
 */
class Training extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'training';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'type_id', 'year', 'fee_then'], 'required'],
            [['member_id', 'residue', 'used', 'isLocked', 'type_id'], 'integer'],
            [['portrait'], 'string'],
            [['year', 'expireDate'], 'safe'],
            [['fee_then'], 'number'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeTraining::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => '会员编号',
            'residue' => '剩余次数',
            'used' => '已使用次数',
            'portrait' => '用户头像照片数据',
            'isLocked' => '学员卡功能是否被锁定',
            'type_id' => '学员卡类别编号',
            'year' => '学员卡生效年份',
            'fee_then' => '购买时价',
            'expireDate' => '学员卡到期时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeTraining::className(), ['id' => 'type_id']);
    }
}
