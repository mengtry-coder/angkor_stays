<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sport".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $feature_image
 * @property string|null $description
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property int|null $status
 * @property int|null $created_by
 * @property string|null $created_date
 */
class Sport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'sport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['updated_by', 'status', 'created_by'], 'integer'],
            [['description'], 'string'],
            [['updated_date', 'created_date'], 'safe'],
            [['name'], 'string', 'max' => 250],
            [['feature_image'], 'string', 'max' => 255],
            [['name'], 'required', 'message' => 'Please fill the field'],
            [['file'], 'file']
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
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
}
