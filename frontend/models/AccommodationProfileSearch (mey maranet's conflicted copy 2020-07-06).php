<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AccommodationProfile;

/**
 * AccommodationProfileSearch represents the model behind the search form of `frontend\models\AccommodationProfile`.
 */
class AccommodationProfileSearch extends AccommodationProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'city_id', 'status', 'created_by', 'updated_by', 'accommodation_type', 'star_rating', 'number_of_rooms'], 'integer'],
            [['name', 'phone_number', 'email_address', 'address', 'check_in_time', 'check_out_time', 'created_date', 'feature_image', 'updated_date', 'zip_code', 'website_url', 'accommodation_size', 'description', 'term_condition', 'privacy_policy', 'number_of_guests', 'facility', 'daterangepicker'], 'safe'],
            [['price'], 'number'],
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
            // 'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
            'pagination' => ['pageSize' => 8],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'accommodation_type', $this->accommodation_type])
            ->andFilterWhere(['like', 'email_address', $this->email_address])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'feature_image', $this->feature_image])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'website_url', $this->website_url])
            ->andFilterWhere(['like', 'accommodation_size', $this->accommodation_size])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'term_condition', $this->term_condition])
            ->andFilterWhere(['like', 'privacy_policy', $this->privacy_policy]);

        return $dataProvider;
    }
}
