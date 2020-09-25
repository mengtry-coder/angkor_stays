<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation_gallery_title".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $accommodation_id
 * @property string|null $updated_date
 * @property int|null $updated_by
 * @property string|null $created_date
 * @property int|null $created_by
 * @property int|null $status
 */
class AccommodationGalleryTitle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_gallery_title';
    }

    /**
     * {@inheritdoc}
     */
    public $file_name;
    public $file;
    public function rules()
    {
        return [
            [['accommodation_id', 'updated_by', 'created_by', 'status'], 'integer'],
            [['updated_date', 'created_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'required', 'message' => 'Please fill the field'],
            [['file_name'], 'file', 'maxFiles' => 10]
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
            'accommodation_id' => 'Accommodation',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'status' => 'Status',
        ];
    }
    public function getAccommodationProfile()
    {
        return $this->hasOne(AccommodationProfile::className(), ['id' => 'accommodation_id']);
    }
}
