<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Rate */

$this->title = 'Create Rate';
$this->params['breadcrumbs'][] = ['label' => 'Rate', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
