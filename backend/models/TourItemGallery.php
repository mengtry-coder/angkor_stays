<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tour_item_gallery".
 *
 * @property int $id
 * @property string|null $feature_image
 * @property int|null $tour_item_id
 */
class TourItemGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tour_item_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public $filename;
    public function rules()
    {
        return [
            [['tour_item_id'], 'integer'],
            [['filename'], 'file', 'max' => 10],
            [['feature_image', 'file_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feature_image' => 'Feature Image',
            'tour_item_id' => 'Tour Item ID',
        ];
    }
}
