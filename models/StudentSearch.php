<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form about `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * @inheritdoc
     */
    public $major;
    public $year;

    public function rules()
    {
        return [
            [['id', 'major_id', 'year_id'], 'integer'],
            [['number', 'name', 'phone', 'email', 'major', 'year'], 'safe'],
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
        $query = Student::find();

        $query->joinWith(['major','year']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

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
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'major_id' => $this->major_id,
            'year_id' => $this->year_id,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'major.name', $this->major])
            ->andFilterWhere(['like', 'year.year', $this->year]);

        return $dataProvider;
    }
}
