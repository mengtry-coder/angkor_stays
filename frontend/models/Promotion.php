<?php

namespace app\models;

use Yii;
use app\models\User;
use backend\models\AccommodationProfile;
use backend\models\RatePlan;

/**
 * This is the model class for table "promotion".
 *
 * @property int $id
 * @property int|null $accommodation_id
 * @property int|null $rate_plan_id
 * @property int|null $promotion_type 1= amount; 0= percentage
 * @property string|null $date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property bool|null $status
 * @property int|null $created_by
 * @property string|null $created_date
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accommodation_id', 'rate_plan_id', 'promotion_type', 'updated_by', 'created_by', 'min_stay'], 'integer'],
            [['date', 'updated_date', 'created_date', 'from_date', 'to_date'], 'safe'],
            [['status'], 'boolean'],
            [['description', 'name'], 'string'],
            [['promotion'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Promotion Name',
            'min_stay' => 'Minimum Stay',
            'description' => 'Description',
            'promotion' => 'Promotion',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'accommodation_id' => 'Property Name',
            'rate_plan_id' => 'Rate Plan',
            'promotion_type' => 'Promotion Type',
            'date' => 'Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
    public function getProperty()
    {
        return $this->hasOne(AccommodationProfile::className(), ['id' => 'accommodation_id']);
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getRatePlan()
    {
        return $this->hasOne(RatePlan::className(), ['id' => 'rate_plan_id']);
    }
}
