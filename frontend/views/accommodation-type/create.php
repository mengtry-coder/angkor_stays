<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AccommodationType */

$this->title = 'Create Accommodation Type';
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodation-type-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
