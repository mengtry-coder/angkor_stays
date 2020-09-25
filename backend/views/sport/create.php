<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sport */

$this->title = 'Create Sport';
$this->params['breadcrumbs'][] = ['label' => 'Sports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sport-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
