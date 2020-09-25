<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "star_rating".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $created_date
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property string|null $updated_date
 * @property int|null $status
 */
class StarRating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'star_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['updated_by', 'created_by', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
        ];
    }
}
