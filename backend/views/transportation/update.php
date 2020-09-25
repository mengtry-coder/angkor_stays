<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Transportation */

$this->title = 'Update Transportation: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Transportations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transportation-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
