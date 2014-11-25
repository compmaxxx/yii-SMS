<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SendTo;
/**
 * SendToSearch represents the model behind the search form about `app\models\SendTo`.
 */
class SendToSearch extends SendTo
{
    /**
     * @inheritdoc
     */
    public $dateTime;
    public $message;
    public $state;
    public $major;
    public $year;


    public function rules()
    {
        return [
            [['report_id', 'major_id', 'year_id'], 'integer'],
            [['message','state','major','year', 'dateTime'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SendTo::find();

        $query->joinWith(['report', 'major', 'year']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $dataProvider->sort->attributes['dateTime'] = [
          // The tables are the ones our relation are configured to
          // in my case they are prefixed with "tbl_"
          'asc' => ['report.dateTime' => SORT_ASC],
          'desc' => ['report.dateTime' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['message'] = [
          // The tables are the ones our relation are configured to
          // in my case they are prefixed with "tbl_"
          'asc' => ['report.message' => SORT_ASC],
          'desc' => ['report.message' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['state'] = [
          // The tables are the ones our relation are configured to
          // in my case they are prefixed with "tbl_"
          'asc' => ['report.state' => SORT_ASC],
          'desc' => ['report.state' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['major'] = [
          // The tables are the ones our relation are configured to
          // in my case they are prefixed with "tbl_"
          'asc' => ['major.name' => SORT_ASC],
          'desc' => ['major.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['year'] = [
          // The tables are the ones our relation are configured to
          // in my case they are prefixed with "tbl_"
          'asc' => ['year.year' => SORT_ASC],
          'desc' => ['year.year' => SORT_DESC],
        ];
        $query->andFilterWhere([
            'report_id' => $this->report_id,
            'major_id' => $this->major_id,
            'year_id' => $this->year_id,
        ]);

        $query->andFilterWhere(['like', 'report.dateTime', $this->dateTime])
        ->andFilterWhere(['like', 'report.message', $this->message])
        ->andFilterWhere(['like', 'report.state', $this->state])
        ->andFilterWhere(['like', 'major.name', $this->major])
        ->andFilterWhere(['like', 'year.year', $this->year]);

        return $dataProvider;
    }
}
