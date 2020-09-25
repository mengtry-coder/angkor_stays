<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $accommodation_id
 * @property string|null $feature_image
 * @property string|null $description
 * @property string|null $policy
 * @property float|null $price
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property int|null $status
 * @property int|null $created_by
 * @property string|null $created_date
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['updated_by', 'status', 'created_by'], 'integer'],
            [['description', 'policy'], 'string'],
            [['price'], 'number'],
            [['updated_date', 'created_date'], 'safe'],
            [['name'], 'string', 'max' => 250],
            [['feature_image'], 'string', 'max' => 255],
            [['file'],'file'],
            [['name'],'required','message'=>'Please fill the field']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'feature_image' => 'Feature Image',
            'description' => 'Description',
            'policy' => 'Policy',
            'price' => 'Price',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
    public function getAccommodationProfile()
    {
        return $this->hasOne(AccommodationProfile::className(), ['id' => 'accommodation_id']);
    }
}
