<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $id_area
 * @property string|null $name
 * @property string|null $code
 * @property string|null $description
 * @property string|null $feature_image
 * @property string|null $video_link
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property int|null $status
 * @property int|null $created_by
 * @property string|null $created_date
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'id_area', 'updated_by', 'status', 'created_by'], 'integer'],
            [['description'], 'string'],
            [['updated_date', 'created_date'], 'safe'],
            [['name', 'feature_image', 'video_link'], 'string', 'max' => 250],
            [['code'], 'string', 'max' => 100],
            [['latitude', 'longitude'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'id_area' => 'Id Area',
            'name' => 'Name',
            'code' => 'Code',
            'description' => 'Description',
            'feature_image' => 'Feature Image',
            'video_link' => 'Video Link',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
}
