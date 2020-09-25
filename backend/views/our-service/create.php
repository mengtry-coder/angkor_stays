<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\service */

$this->title = 'Create Service';
$this->params['breadcrumbs'][] = ['label' => 'Our Service', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
