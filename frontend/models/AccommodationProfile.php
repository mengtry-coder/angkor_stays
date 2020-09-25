<?php

namespace frontend\models;

use Yii;
use backend\models\Allotment;
use backend\models\AccommodationFacility;
use backend\models\Rate;
use backend\models\RatePlan;

/**
 * This is the model class for table "accommodation_profile".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone_number
 * @property string|null $email_address
 * @property string|null $address
 * @property int|null $country_id
 * @property float|null $price
 * @property int|null $city_id
 * @property int|null $status
 * @property int|null $created_by
 * @property string|null $check_in_time
 * @property string|null $check_out_time
 * @property string|null $created_date
 * @property string|null $feature_image
 * @property string|null $updated_date
 * @property int|null $updated_by
 * @property string|null $zip_code
 * @property string|null $website_url
 * @property int|null $accommodation_type
 * @property string|null $accommodation_size
 * @property int|null $star_rating
 * @property int|null $number_of_rooms
 * @property string|null $description
 * @property string|null $term_condition
 * @property string|null $privacy_policy
 */
class AccommodationProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_profile';
    }

    /**
     * {@inheritdoc}
     */
    public $facility, $from_date, $to_date, $price_from, $price_to;
    public function rules()
    {
        return [
            [['country_id', 'city_id', 'status', 'created_by', 'updated_by', 'accommodation_type', 'star_rating', 'number_of_rooms', 'max_guest'], 'integer'],
            [['price', 'price_from', 'price_to'], 'number'],
            [['title', 'first_name', 'last_name', 'email_address', 'phone_number'], 'required'],
            [['check_in_time', 'check_out_time', 'created_date', 'updated_date', 'facility'], 'safe'],
            [['accommodation_size', 'description', 'term_condition', 'privacy_policy', 'map_link'], 'string'],
            [['name', 'address', 'LatitudeLongitude'], 'string', 'max' => 250],
            [['phone_number', 'email_address', 'zip_code'], 'string', 'max' => 50],
            [['feature_image', 'website_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'LatitudeLongitude' => 'Latitude & Longtitude',
            'max_guest' => 'Max Guest',
            'map_link' => 'Map Iframe Link',
            'name' => 'Name',
            'phone_number' => 'Phone Number',
            'email_address' => 'Email Address',
            'address' => 'Address',
            'country_id' => 'Country ID',
            'price' => 'Price',
            'city_id' => 'City ID',
            'status' => 'Status',
            'created_by' => 'Created By',
            'check_in_time' => 'Check In Time',
            'check_out_time' => 'Check Out Time',
            'created_date' => 'Created Date',
            'feature_image' => 'Feature Image',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
            'zip_code' => 'Zip Code',
            'website_url' => 'Website Url',
            'accommodation_type' => 'Accommodation Type',
            'accommodation_size' => 'Accommodation Size',
            'star_rating' => 'Star Rating',
            'number_of_rooms' => 'Number Of Rooms',
            'description' => 'Description',
            'term_condition' => 'Term Condition',
            'privacy_policy' => 'Privacy Policy',
        ];
    }
    public function getAccType()
    {
        return $this->hasOne(AccommodationType::className(),['id'=>'accommodation_type']);
    }
    public function getAllotment()
    {
        return $this->hasOne(Allotment::className(),['accommodation_id'=>'id']);
    }
    public function getAccommodationFacility()
    {
        return $this->hasOne(AccommodationFacility::className(),['accommodation_id'=>'id']);
    }
    public function getRate()
    {
        return $this->hasOne(Rate::className(),['accommodation_id'=>'id']);
    }
    
}
