<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property integer $id
 * @property string $message
 * @property string $state
 *
 * @property SendTo[] $sendTos
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['state'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'state' => 'State',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendTos()
    {
        return $this->hasMany(SendTo::className(), ['report_id' => 'id']);
    }
}
