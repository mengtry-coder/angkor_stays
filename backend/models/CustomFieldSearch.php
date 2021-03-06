<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CustomField;

/**
 * CustomFieldSearch represents the model behind the search form of `backend\models\CustomField`.
 */
class CustomFieldSearch extends CustomField
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'updated_by', 'created_by'], 'integer'],
            [['name', 'short_description', 'feature_image', 'description', 'updated_date', 'created_date'], 'safe'],
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
        $query = CustomField::find();

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
            'updated_by' => $this->updated_by,
            'updated_date' => $this->updated_date,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'feature_image', $this->feature_image])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
