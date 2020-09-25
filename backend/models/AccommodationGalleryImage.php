<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation_gallery_image".
 *
 * @property int $id
 * @property string|null $file_path
 * @property string|null $file_name
 * @property int|null $accommodation_id
 */
class AccommodationGalleryImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_gallery_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accommodation_id'], 'integer'],
            [['file_path', 'file_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_path' => 'File Path',
            'file_name' => 'File Name',
            'accommodation_id' => 'Accommodation ID',
        ];
    }
}
