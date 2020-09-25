<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Transportation */

$this->title = 'Create Transportation';
$this->params['breadcrumbs'][] = ['label' => 'Transportations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transportation-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
