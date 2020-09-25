<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reservation */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reservation-view">

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
            'title',
            'check_in',
            'check_out',
            'number_of_bed',
            'agree_term_condition',
            'number_of_guest',
            'first_name',
            'last_name',
            'email:email',
            'confirm_email:email',
            'contact_phone',
            'address:ntext',
            'description:ntext',
            'total',
            'created_by',
            'status',
            'updated_by',
            'updated_date',
            'created_date',
        ],
    ]) ?>

</div>
