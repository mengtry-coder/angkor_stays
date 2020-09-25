<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Experience */

$this->title = 'Update Experience: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Experiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="experience-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
