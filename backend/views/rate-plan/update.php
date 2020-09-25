<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RatePlan */

$this->title = 'Update Rate Plan: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rate Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rate-plan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
