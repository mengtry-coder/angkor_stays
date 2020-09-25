<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Promotion;

/**
 * PromotionSearch represents the model behind the search form of `app\models\Promotion`.
 */
class PromotionSearch extends Promotion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'accommodation_id', 'rate_plan_id', 'promotion_type', 'updated_by', 'created_by'], 'integer'],
            [['date', 'updated_date', 'created_date', 'from_date', 'to_date'], 'safe'],
            [['status'], 'boolean'],
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
        $query = Promotion::find();

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
        $query->andFilterWhere(['or',
                ['between', 'date', $this->from_date, $this->to_date],
            ])
            ->andFilterWhere(['=', 'status', $this->status])
            ->andFilterWhere(['=', 'accommodation_id', $this->accommodation_id]);
        return $dataProvider;
    }
}
