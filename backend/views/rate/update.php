<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rate */

$this->title = 'Update Rate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rate', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
