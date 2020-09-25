<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Meal */

$this->title = 'Update Meal: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Meals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="meal-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
