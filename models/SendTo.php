<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sendTo".
 *
 * @property integer $report_id
 * @property integer $major_id
 * @property integer $year_id
 *
 * @property Report $report
 * @property Major $major
 * @property Year $year
 */
class SendTo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sendTo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_id', 'major_id', 'year_id'], 'required'],
            [['report_id', 'major_id', 'year_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_id' => 'Report ID',
            'major_id' => 'Major ID',
            'year_id' => 'Year ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReport()
    {
        return $this->hasOne(Report::className(), ['id' => 'report_id']);
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
