<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation_facility".
 *
 * @property int $id
 * @property int|null $accommodation_id
 * @property int|null $facility_id
 */
class AccommodationFacility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_facility';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accommodation_id', 'facility_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'accommodation_id' => 'Accommodation ID',
            'facility_id' => 'Facility ID',
        ];
    }
    public function getFacilityName()
    {
        return $this->hasOne(Facility::className(), ['id' => 'facility_id']);
    }
    public function getAccommodaton()
    {   
        return $this->hasOne(AccommodationProfile::className(), ['id' => 'accommodation_id']);
    }
}
