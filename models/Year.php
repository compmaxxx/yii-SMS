<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "year".
 *
 * @property integer $id
 * @property string $year
 *
 * @property SendTo[] $sendTos
 * @property Student[] $students
 */
class Year extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSendTos()
    {
        return $this->hasMany(SendTo::className(), ['year_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['year_id' => 'id']);
    }
}
