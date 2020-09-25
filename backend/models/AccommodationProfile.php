<?php

namespace backend\models;

use Yii;
use app\models\User;


/**
 * This is the model class for table "accommodation_profile".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone_number
 * @property string|null $email_address
 * @property string|null $address
 * @property int|null $country_id
 * @property int|null $city_id
 * @property int|null $status
 * @property int|null $created_by
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
    public $file, $facility, $service, $transportation, $sport, $globalSearch, $file_name, $file_path;
    public function rules()
    {
        return [
            [['file'], 'file'],
            [['file_name'], 'file', 'maxFiles' => 10],
            [['country_id', 'city_id', 'status', 'created_by', 'updated_by', 'accommodation_type', 'star_rating', 'number_of_rooms', 'max_guest'], 'integer'],
            [['created_date', 'updated_date', 'facility', 'service', 'transportation', 'sport', 'globalSearch', 'check_in_time', 'check_out_time'], 'safe'],
            [['accommodation_size', 'description', 'term_condition', 'privacy_policy', 'file_path', 'map_link', 'LatitudeLongitude'], 'string'],
            [['name', 'address'], 'string', 'max' => 250],
            [['phone_number', 'email_address', 'zip_code', 'reservation_email'], 'string', 'max' => 50],
            [['feature_image', 'website_url'], 'string', 'max' => 255],
            [['name'], 'required', 'message' => 'Please fill the field'],
            [['price'], 'number'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'globalSearch' => 'Search',
            'reservation_email' => 'Reservation Email',
            'LatitudeLongitude' => 'Latitude & Longtitude',
            'map_link' => 'Map Iframe Link',
            'check_in_time' => 'Check In',
            'check_out_time' => 'Check Out',
            'price' => 'Price',
            'max_guest' => 'Max Guest',
            'id' => 'ID',
            'facility' => 'Facility',
            'service' => 'Service',
            'transportation' => 'Transportation',
            'sport' => 'Sport',
            'phone_number' => 'Phone Number',
            'email_address' => 'Email Address',
            'address' => 'Address',
            'file' => 'Image',
            'country_id' => 'Country',
            'city_id' => 'City',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'feature_image' => 'Feature Image',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
            'zip_code' => 'Zip Code',
            'website_url' => 'Website Url',
            'accommodation_type' => 'Accommodation Type',
            'accommodation_size' => 'Accommodation Size',
            'star_rating' => 'Star Rating',
            'number_of_rooms' => 'Max Room Number',
            'description' => 'Description',
            'term_condition' => 'Term Condition',
            'privacy_policy' => 'Privacy Policy',
        ];
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getAccommodationType()
    {
        return $this->hasOne(AccommodationType::className(), ['id' => 'accommodation_type']);
    }
    public function getRatePlan()
    {
        return $this->hasOne(RatePlan::className(),['accommodation_id'=>'id']);
    }
}
