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
    public function rules()
    {
        return [
            [['report_id', 'major_id', 'year_id'], 'integer'],
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'report_id' => $this->report_id,
            'major_id' => $this->major_id,
            'year_id' => $this->year_id,
        ]);

        return $dataProvider;
    }
}
