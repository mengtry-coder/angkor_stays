<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rate_plan".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $guest
 * @property int|null $accommodation_id
 * @property string|null $description
 */
class RatePlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest', 'accommodation_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'guest'], 'required'],
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
            'guest' => 'Max Guest',
            'accommodation_id' => 'Accommodation ID',
            'description' => 'Description',
        ];
    }
}
