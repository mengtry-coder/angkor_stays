<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $accommodation_id
 * @property string|null $description
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accommodation_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 250],
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
            'accommodation_id' => 'Accommodation ID',
            'description' => 'Description',
        ];
    }
}
