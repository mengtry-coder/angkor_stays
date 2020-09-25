<?php

namespace backend\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "custom_field".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $field_name
 * @property string|null $feature_image
 * @property string|null $description
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property bool|null $status
 * @property int|null $created_by
 * @property string|null $created_date
 */
class CustomField extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'custom_field';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['updated_by', 'created_by'], 'integer'],
            [['file'], 'file'],
            [['updated_date', 'created_date'], 'safe'],
            [['status'], 'boolean'],
            [['name'], 'required'],
            [['name', 'short_description'], 'string', 'max' => 100],
            [['feature_image'], 'string', 'max' => 250],
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
            'short_description' => 'Short Descripton',
            'file' => 'Image',
            'feature_image' => 'Feature Image',
            'description' => 'Description',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
