<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rate;

/**
 * RateSearch represents the model behind the search form of `backend\models\Rate`.
 */
class RateSearch extends Rate
{
    /**
     * {@inheritdoc}
     */
    public $month, $year;
    public function rules()
    {
        return [
            [['id', 'promotion_type', 'updated_by', 'status', 'created_by', 'accommodation_id'], 'integer'],
            [['price', 'promotion', 'month', 'year'], 'number'],
            [['date', 'updated_date', 'created_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Rate::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'accommodation_id' => $this->accommodation_id,
            'price' => $this->price,
            'promotion' => $this->promotion,
            'promotion_type' => $this->promotion_type,
            'date' => $this->date,
            'updated_by' => $this->updated_by,
            'status' => $this->status,
            'updated_date' => $this->updated_date,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
        ]);

        return $dataProvider;
    }
}
