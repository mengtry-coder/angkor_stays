<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Meal */

$this->title = 'Create Meal';
$this->params['breadcrumbs'][] = ['label' => 'Meals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meal-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
