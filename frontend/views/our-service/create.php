<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\OurService */

$this->title = 'Create Our Service';
$this->params['breadcrumbs'][] = ['label' => 'Our Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="our-service-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
