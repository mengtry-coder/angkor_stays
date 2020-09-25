<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation_meal".
 *
 * @property int $id
 * @property int|null $accommodation_id
 * @property int|null $meal_id
 */
class AccommodationMeal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_meal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accommodation_id', 'meal_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'accommodation_id' => 'Accommodation ID',
            'meal_id' => 'Facility ID',
        ];
    }
    public function getMealName()
    {
        return $this->hasOne(Meal::className(), ['id' => 'meal_id']);
    }
}
