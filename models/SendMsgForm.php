<?php

namespace app\models;

use yii\base\Model;

class SendMsgForm extends Model
{
    public $name;
    public $email;
    public $msg;
    public $major_id;
    public $year_id;

    public function rules()
    {
        return [
            [['name', 'email','msg'], 'required'],
            ['email', 'email'],
            ['msg', 'string'],
            ['major_id','number'],
            ['year_id','number']
        ];
    }
}
