<?php

namespace app\models;

use yii\base\Model;

class SendMsgForm extends Model
{
    public $msg;
    public $lstMY;

    public function rules()
    {
        return [
            [['msg'], 'required'],
            ['msg', 'string'],
            ['lstMY','string']
        ];
    }
}
