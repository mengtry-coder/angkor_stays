<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SeasonType */

$this->title = 'Update Season Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Season Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="season-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
