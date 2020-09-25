<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation_type".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property bool|null $status
 * @property string|null $created_date
 * @property int|null $created_by
 * @property string|null $updated_date
 * @property int|null $updated_by
 */
class AccommodationType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_type';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['file'], 'file'],
            [['status'], 'boolean'],
            [['created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['name','feature_image'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'status' => 'Status',
            'file' => 'Image',
            'created_date' => 'Created Date',
            'feature_image' => 'Feature Image',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        ];
    }
}
