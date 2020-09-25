<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\AccommodationProfile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="accommodation-profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone_number',
            'email_address:email',
            'address',
            'country_id',
            'price',
            'city_id',
            'status',
            'created_by',
            'check_in_time',
            'check_out_time',
            'created_date',
            'feature_image',
            'updated_date',
            'updated_by',
            'zip_code',
            'website_url:url',
            'accommodation_type',
            'accommodation_size:ntext',
            'star_rating',
            'number_of_rooms',
            'description:ntext',
            'term_condition:ntext',
            'privacy_policy:ntext',
        ],
    ]) ?>

</div>
