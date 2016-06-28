<?php

namespace app\models;


use yii\base\Model;

class SearchTraineeInfo extends Model
{
    public $input;

    public function rules()
    {
        return [
            ['input', 'integer'],
            ['input', 'string', 'length' => [5, 11]],
        ];
    }

    public function search()
    {
        $trainee_data = Training::find()
            ->asArray()
            ->all();
        $trainees = [];
        foreach ($trainee_data as $person) {
            array_push($trainees, $person['member_id']);
        }
        $data = Member::find()
            ->where(['IN', 'id', $trainees])
            ->andWhere('telephone = :phone OR card_code LIKE :code', [':phone' => $this->input,':code'=>'%'.$this->input])
            ->asArray()
            ->all();
        $result = [];
        foreach ($data as $item) {
            $info = Training::findOne(['member_id' => $item['id']]);
            $bought_fee = round($info->fee_then, 2);
            $type = TypeTraining::findOne(['id' => $info->type_id])->name;
            array_push($result, [
                'id' => $item['card_code'],
                'name' => $item['name'],
                'phone' => $item['telephone'],
                'issue' => $item['issueDate'],
                'fee' => $bought_fee,
                'type' => $type,
                'used' => $info->used,
                'residue' => $info->residue,
                'portrait' => 'data:image/png;base64,' . $info->portrait,
            ]);
        }
        return $result;
    }
}