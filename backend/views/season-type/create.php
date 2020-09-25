<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SeasonType */

$this->title = 'Create Season Type';
$this->params['breadcrumbs'][] = ['label' => 'Season Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="season-type-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
