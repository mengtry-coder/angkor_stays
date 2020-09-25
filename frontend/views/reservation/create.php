<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reservation */

$this->title = 'Create Reservation';
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-create">


    <?= $this->render('_form', [
        'model' => $model,
        'check_out_date' => $check_out_date,
        'check_in_date' => $check_in_date,
        'rate_plan' => $rate_plan,

    ]) ?>

</div>
