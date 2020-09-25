<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\OurService */

$this->title = 'Update Our Service: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Our Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="our-service-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
