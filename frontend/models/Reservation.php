<?php

namespace frontend\models;

use Yii;
use backend\models\AccommodationProfile;

/**
 * This is the model class for table "reservation".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $check_in
 * @property string|null $check_out
 * @property int|null $number_of_bed
 * @property int|null $agree_term_condition agree = 1; disagree = 0; 
 * @property int|null $number_of_guest
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $confirm_email
 * @property string|null $contact_phone
 * @property string|null $address
 * @property string|null $description
 * @property float|null $total
 * @property int|null $created_by
 * @property int|null $status
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property string|null $created_date
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * {@inheritdoc}
     */
    public $reCaptcha;
    public function rules()
    {
        return [
            [['check_in', 'check_out', 'updated_date', 'created_date'], 'safe'],
            [['number_of_bed', 'agree_term_condition', 'number_of_guest', 'created_by', 'status', 'updated_by', 'accommodation_id', 'promotion', 'promotion_type', 'rate_plan_id'], 'integer'],
            [['address', 'description'], 'string'],
            [['total', 'sub_total'], 'number'],
            [['title', 'first_name', 'last_name', 'email', 'contact_phone', 'number_of_guest'], 'required'],
            [['reCaptcha'], 'required', 'message' => 'Please Re Capcha'],
            [['title', 'first_name', 'last_name', 'email', 'confirm_email', 'contact_phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate_plan_id' => 'Rate Choice',
            'title' => 'Title',
            'check_in' => 'Check In',
            'check_out' => 'Check Out',
            'number_of_bed' => 'Number Of Bed',
            'agree_term_condition' => 'Agree Term Condition',
            'number_of_guest' => 'Number Of Guest',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'confirm_email' => 'Confirm Email',
            'contact_phone' => 'Contact Phone',
            'address' => 'Address',
            'description' => 'Description',
            'total' => 'Total',
            'created_by' => 'Created By',
            'status' => 'Status',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'created_date' => 'Created Date',
        ];
    }

    public function getAccommodationProfile()
    {
        return $this->hasOne(AccommodationProfile::className(), ['accommmodation_id' => 'id']);
    }
}
