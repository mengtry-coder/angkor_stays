<?php
namespace backend\models;
use Yii;

/**
 * This is the model class for table "about_us".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $feature_image
 * @property string|null $updated_date
 * @property int|null $updated_by
 * @property string|null $created_date
 * @property int|null $created_by
 * @property int|null $status
 * @property int|null $user_id
 */
class AboutUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about_us';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public function rules()
    {
        return [
            [['updated_date', 'created_date'], 'safe'],
            [['updated_by', 'created_by', 'status', 'user_id'], 'integer'],
            [['file'], 'file'],
            [['name', 'feature_image'], 'string', 'max' => 255],
            [['name'],'required','message'=>'Please fill the field'],
            [['short_description', 'long_description'], 'string'],
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
            'short_description' => 'Short Description',
            'long_description' => 'Long Description',
            'feature_image' => 'Feature Image',
            'description_chose_us' => 'Description Chose Us',
            'updated_date' => 'Updated Date',
            'file' => 'Image',
            'updated_by' => 'Updated By',
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }
}
