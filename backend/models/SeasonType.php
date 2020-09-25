<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "season_type".
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
class SeasonType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'season_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status'], 'boolean'],
            [['created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'required' , 'message' => 'Please fill the field']
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
            'created_date' => 'Created Date',
            'created_by' => 'Created By',
            'updated_date' => 'Updated Date',
            'updated_by' => 'Updated By',
        ];
    }
}
