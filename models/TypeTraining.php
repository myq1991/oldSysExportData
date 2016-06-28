<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_training".
 *
 * @property integer $id
 * @property string $name
 * @property string $time_start
 * @property string $time_end
 * @property double $fee_current
 * @property integer $team_id
 * @property integer $default_times
 *
 * @property Training[] $trainings
 * @property TrainingTeam $team
 */
class TypeTraining extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_training';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'time_start', 'time_end', 'team_id'], 'required'],
            [['time_start', 'time_end'], 'safe'],
            [['fee_current'], 'number'],
            [['team_id', 'default_times'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['name'], 'unique'],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => TrainingTeam::className(), 'targetAttribute' => ['team_id' => 'id']],
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
            'fee_current' => '本年培训费用',
            'team_id' => '培训团队编号',
            'default_times' => '卡内初始培训次数',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainings()
    {
        return $this->hasMany(Training::className(), ['type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(TrainingTeam::className(), ['id' => 'team_id']);
    }
}
