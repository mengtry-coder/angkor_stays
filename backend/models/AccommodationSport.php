<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation_sport".
 *
 * @property int $id
 * @property int|null $accommodation_id
 * @property int|null $sport_id
 */
class AccommodationSport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_sport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accommodation_id', 'sport_id'], 'integer'],
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
            'sport_id' => 'Sport ID',
        ];
    }
    public function getSportName()
    {
        return $this->hasOne(Sport::className(), ['id' => 'sport_id']);
    }
}
