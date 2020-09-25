<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "accommodation_service".
 *
 * @property int $id
 * @property int|null $accommodation_id
 * @property int|null $service_id
 */
class AccommodationService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accommodation_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accommodation_id', 'service_id'], 'integer'],
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
            'service_id' => 'Service ID',
        ];
    }
    public function getServiceName()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
}
