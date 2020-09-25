<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;
use frontend\models\AccommodationProfile;
use backend\models\Rate;
use backend\models\RatePlan;


/**
 * AccommodationProfileSearch represents the model behind the search form of `frontend\models\AccommodationProfile`.
 */
class AccommodationProfileSearch extends AccommodationProfile
{
    /**
     * {@inheritdoc}
     */
    public $from_date, $to_date, $price_from, $price_to;
    public function rules()
    {
        return [
            [['id', 'country_id', 'city_id', 'status', 'created_by', 'updated_by', 'accommodation_type', 'star_rating', 'number_of_rooms', 'max_guest'], 'integer'],
            [['name', 'phone_number', 'email_address', 'address', 'check_in_time', 'check_out_time', 'created_date', 'feature_image', 'updated_date', 'zip_code', 'website_url', 'accommodation_size', 'description', 'term_condition', 'privacy_policy', 'facility', 'from_date', 'to_date'], 'safe'],
            [['price', 'price_from', 'price_to'], 'number'],
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
        $query = AccommodationProfile::find()->distinct();
        $query->innerJoinWith(['accType']);
        $query->innerJoinWith(['allotment']);
        $query->innerJoinWith(['accommodationFacility']);
        // $query->joinWith(['rate']);
        // $query = Yii::$app->db->createCommand("SELECT distinct pro.name, pro.accommodation_type
        //     FROM accommodation_profile as pro
        //     INNER JOIN accommodation_type as type ON type.id = pro.accommodation_type
        //     INNER JOIN allotment as allot ON allot.accommodation_id = pro.id
        //     where type.id = 2
        //     and pro.id = 10");

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // 'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
            'pagination' => ['pageSize' => 50],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if ($this->from_date) {
            $selectProIDFromAllotment = "SELECT DISTINCT (accommodation_id), COUNT(id) as sizeAllotment from 
            allotment 
            where date between '$this->from_date' AND '$this->to_date' AND date < '$this->to_date' and number_of_guest > 0
                        GROUP BY accommodation_id";
            
            $date_arr = Yii::$app->db->createCommand("$selectProIDFromAllotment")->queryAll(); // get property which have allotment
            $date1 = new \DateTime($this->from_date, new \DateTimeZone('UTC'));
            $date2 = new \DateTime($this->to_date, new \DateTimeZone('UTC'));
            $numberOfNights = $date2->diff($date1)->format("%a");
            // echo $this->from_date;
            // echo $this->to_date;
            $propertyArr = array();
            if ($date_arr) {
                foreach ($date_arr as $n) {
                    $sizeAllotment = $n['sizeAllotment'];
                    $propert_id = $n['accommodation_id'];
                    if($sizeAllotment == $numberOfNights){
                        array_push($propertyArr, $propert_id);
                    }
                }
            }
            $query->andFilterWhere(['in', 'accommodation_profile.id', $propertyArr]);
            // $query->andFilterWhere(['IN', 'accommodation_profile.id', $propertyArr]);
            if($propertyArr){ // if get some id of accom meet date search
                $propertyArrCoverted =  implode(",",$propertyArr);
                $date_arr_checked_level_1 = Yii::$app->db->createCommand("SELECT * from 
            allotment 
            where date between '$this->from_date' AND '$this->to_date' AND accommodation_id IN ($propertyArrCoverted) and number_of_guest > 0")->queryAll();
            // end get allotment of filter 
            // loop check rate < 1 and allotment <= 0
               foreach ($date_arr_checked_level_1 as $row) {
                    $accommodation_id = $row['accommodation_id'];
                   // get rate plan 
                    $get_rate_plan = RatePlan::find()->where(['=','accommodation_id',$accommodation_id])->All();
                    // loop check rate > 1 of each rate plan per accomodation
                    if($get_rate_plan){
                        $checkRateIndex = 0;
                        foreach($get_rate_plan as $rp){
                            $rate_plan_id = $rp['id'] ;
                            $rate_sql = "SELECT * from rate where rate_plan_id = $rate_plan_id and accommodation_id = $accommodation_id and price > 0 and date BETWEEN '$this->from_date' and '$this->to_date' and date < '$this->to_date'";
                            $get_rate_index = Yii::$app->db->createCommand("$rate_sql")->queryAll();
                            $get_rate_plan_size = sizeof($get_rate_index);
                            if($get_rate_plan_size == $numberOfNights){
                                $checkRateIndex = $checkRateIndex + 1;
                            }
                        }
                        // check if $checkRateIndex < 1 filter out that accomodation id
                        if($checkRateIndex < 1) {
                            $query->andFilterWhere(['<>', 'accommodation_profile.id', $accommodation_id]);
                            echo 'acc id = '.$accommodation_id.' is filter out';
                        } // else not filter out
                    }
                    // exit();// maco here
                }

            $query->andFilterWhere(['=', 'accommodation_type', $this->accommodation_type]);
            $query->andFilterWhere(['=', 'accommodation_profile.status', 1]);
            // $query->andFilterWhere(['>', 'rate.price', 0]);
            // $query->andFilterWhere(['>=', 'max_guest', $this->max_guest]);
            // $query->andFilterWhere(['BETWEEN', 'price', $this->price_from, $this->price_to]);
            $query->andFilterWhere(['>=', 'max_guest', $this->max_guest]);
            $query->andFilterWhere(['=', 'accommodation_type', $this->accommodation_type]);
            $query->andFilterWhere(['<=', 'price',  $this->price_to]);
            $query->andFilterWhere(['>=', 'price',  $this->price_from]);
            return $dataProvider;
        }else{
            $query->andFilterWhere(['=', 'accommodation_type', 0]);
            return $dataProvider;
            // echo 'no acc';
        }
    }else{
        // not filter by date
        $query->andFilterWhere(['=', 'accommodation_profile.status', 1]);
        $query->andFilterWhere(['>=', 'max_guest', $this->max_guest]);
        $query->andFilterWhere(['<=', 'price',  $this->price_to]);
        $query->andFilterWhere(['>=', 'price',  $this->price_from]);
        $query->andFilterWhere(['=', 'accommodation_type', $this->accommodation_type]);
        return $dataProvider;

    }


    }
}
