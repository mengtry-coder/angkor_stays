<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AccommodationType */

$this->title = 'Update Accommodation Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accommodation-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
