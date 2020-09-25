<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation_transportation".
 *
 * @property int $id
 * @property int|null $accommodation_id
 * @property int|null $transportation_id
 */
class AccommodationTransportation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_transportation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accommodation_id', 'transportation_id'], 'integer'],
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
            'transportation_id' => 'Transportation ID',
        ];
    }
    public function getTransportationName()
    {
        return $this->hasOne(Transportation::className(), ['id' => 'transportation_id']);
    }
}
