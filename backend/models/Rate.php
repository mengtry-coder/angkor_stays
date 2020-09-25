<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rate".
 *
 * @property int $id
 * @property float|null $price
 * @property float|null $promotion
 * @property int|null $promotion_type 1= amount, 2= %
 * @property string|null $date
 * @property int|null $updated_by
 * @property int|null $status 1= active, 0= inactive
 * @property string|null $updated_date
 * @property int|null $created_by
 * @property string|null $created_date
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * {@inheritdoc}
     */
    public $month, $year, $from_date, $to_date;
    public function rules()
    {
        return [
            [['price', 'promotion', 'grand_total'], 'number'],
            [['promotion_type', 'updated_by', 'status', 'created_by', 'accommodation_id', 'rate_plan_id'], 'integer'],
            [['date', 'updated_date', 'created_date'], 'safe'],
            [['from_date', 'to_date', 'price'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate_plan_id' => 'Rate Plan',
            'from_date' => 'From',
            'to_date' => 'To',
            'accommodation_id' => 'Property',
            'price' => 'Price',
            'grand_total' => 'Grand Total',
            'promotion' => 'Promotion',
            'promotion_type' => 'Promotion Type',
            'date' => 'Date',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'updated_date' => 'Updated Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
}
