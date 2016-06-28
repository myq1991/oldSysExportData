<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "training_team".
 *
 * @property integer $id
 * @property string $name
 *
 * @property TrainingRegister[] $trainingRegisters
 * @property TypeTraining[] $typeTrainings
 */
class TrainingTeam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'training_team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'id' => '团队编号',
            'name' => '团队名称',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingRegisters()
    {
        return $this->hasMany(TrainingRegister::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeTrainings()
    {
        return $this->hasMany(TypeTraining::className(), ['team_id' => 'id']);
    }
}
