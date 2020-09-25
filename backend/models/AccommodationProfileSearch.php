<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AccommodationProfile;

/**
 * AccommodationProfileSearch represents the model behind the search form of `backend\models\AccommodationProfile`.
 */
class AccommodationProfileSearch extends AccommodationProfile
{
    /**
     * {@inheritdoc}
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'country_id', 'city_id', 'status', 'created_by', 'updated_by', 'accommodation_type', 'star_rating', 'number_of_rooms', 'max_guest'], 'integer'],
            [['name', 'phone_number', 'email_address', 'address', 'created_date', 'feature_image', 'updated_date', 'zip_code', 'website_url', 'accommodation_size', 'description', 'term_condition', 'privacy_policy','facility', 'service', 'transportation', 'sport', 'globalSearch'], 'safe'],
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
        $query = AccommodationProfile::find();

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
            ['like', 'name', $this->globalSearch],
            ['like', 'number_of_rooms', $this->globalSearch]])
            ->andFilterWhere(['like', 'star_rating', $this->star_rating])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'accommodation_type', $this->accommodation_type]);

        return $dataProvider;
    }
}
