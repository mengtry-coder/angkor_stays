<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sport */

$this->title = 'Update Sport: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Sports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sport-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
