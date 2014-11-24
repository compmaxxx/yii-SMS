<?php

namespace app\models;

use yii\base\Model;

class SendMsgForm extends Model
{
    public $name;
    public $email;
    public $msg;

    public function rules()
    {
        return [
            [['name', 'email','msg'], 'required'],
            ['email', 'email'],
            ['msg', 'string']
        ];
    }
}
