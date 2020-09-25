<?php

namespace backend\models;

use Yii;
use app\models\User;
/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $feature_image
 * @property string|null $description
 * @property int|null $created_by
 * @property string|null $created_date
 * @property int|null $updated_by
 * @property string|null $updated_date
 * @property int|null $status
 */
class OurService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'our_service';
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
            [['created_by', 'updated_by', 'status'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['name', 'feature_image'], 'string', 'max' => 255],
            [['name'], 'required', 'message' => 'Please fill the field']
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
            'file' => 'File',
            'feature_image' => 'Feature Image',
            'description' => 'Description',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
        ];
    }
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
