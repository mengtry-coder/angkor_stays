<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "allotment".
 *
 * @property int $id
 * @property int|null $rate_set_up_id
 * @property string|null $date
 * @property string|null $tour_item_id
 * @property int|null $number
 * @property string|null $description
 * @property int|null $updated_by
 * @property int|null $status 1= active, 0= stop_sell
 * @property string|null $updated_date
 * @property int|null $created_by
 * @property string|null $created_date
 */
class Allotment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'allotment';
    }

    /**
     * {@inheritdoc}
     */
    public $month, $year, $from_date, $to_date;
    public function rules()
    {
        return [
            [['accommodation_id', 'number_of_guest', 'updated_by', 'status', 'created_by', 'month', 'year'], 'integer'],
            [['date', 'updated_date', 'created_date', 'from_date', 'to_date'], 'safe'],
            [['description'], 'string'],
            [['from_date', 'to_date', 'number_of_guest'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'month' => 'Month',
            'year' => 'year',
            'accommodation_id' => 'Property Name',
            'date' => 'Date',
            'number_of_guest' => 'Number',
            'description' => 'Description',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'updated_date' => 'Updated Date',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
}
