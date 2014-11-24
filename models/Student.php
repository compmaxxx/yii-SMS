<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $number
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property integer $major_id
 * @property integer $year_id
 *
 * @property Major $major
 * @property Year $year
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['number', 'name', 'phone', 'email', 'major_id', 'year_id'], 'required'],
            [['major_id', 'year_id'], 'integer'],
            [['number', 'phone'], 'string', 'max' => 15],
            [['name', 'email'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'major_id' => 'Major ID',
            'year_id' => 'Year ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(Major::className(), ['id' => 'major_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYear()
    {
        return $this->hasOne(Year::className(), ['id' => 'year_id']);
    }
}
