<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_register".
 *
 * @property integer $id
 * @property integer $member_id
 * @property integer $team_id
 * @property string $reg_datetime
 * @property string $reg_year
 * @property double $paid_up
 * @property string $description
 * @property integer $operator_id
 *
 * @property Member $member
 * @property SysUser $operator
 * @property TrainingTeam $team
 */
class TrainingRegister extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'training_register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'team_id', 'reg_datetime', 'reg_year', 'description', 'operator_id'], 'required'],
            [['member_id', 'team_id', 'operator_id'], 'integer'],
            [['reg_datetime', 'reg_year'], 'safe'],
            [['paid_up'], 'number'],
            [['description'], 'string', 'max' => 100],
            [['member_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member_id' => 'id']],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysUser::className(), 'targetAttribute' => ['operator_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => TrainingTeam::className(), 'targetAttribute' => ['team_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '注册编号',
            'member_id' => '会员编号',
            'team_id' => '培训团队编号',
            'reg_datetime' => '注册时间',
            'reg_year' => '注册年份',
            'paid_up' => '实收金额',
            'description' => '培训类别编号',
            'operator_id' => '操作员编号',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(TrainingTeam::className(), ['id' => 'team_id']);
    }
}
