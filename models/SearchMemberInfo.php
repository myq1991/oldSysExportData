<?php

namespace app\models;


use yii\base\Model;

class SearchMemberInfo extends Model
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
        $data = Member::find()
            ->where('telephone = :phone OR card_code LIKE :code', [':phone' => $this->input, ':code' => '%' . $this->input])
            ->orderBy(['id' => SORT_ASC])
            ->asArray()
            ->all();
        $result = [];
        foreach ($data as $item) {
            $member_id = $item['id'];
            if (Debit::findOne(['member_id' => $member_id]) != null) {
                $debit = Debit::findOne(['member_id' => $member_id]);
                $balance = round($debit->balance, 2);
                $last_use = CardUsage::find()
                    ->where(['member_id' => $member_id])
                    ->orderBy(['datetime' => SORT_DESC])
                    ->asArray()
                    ->one();
                array_push($result, [
                    'id' => $item['card_code'],
                    'name' => $item['name'],
                    'phone' => $item['telephone'],
                    'issue' => $item['issueDate'],
                    'type' => TypeDebit::findOne(['id' => $debit->type_id])->name,
                    'balance' => $balance,
                    'last' => $last_use['datetime'],
                ]);
            }
        }
        return $result;
    }
}