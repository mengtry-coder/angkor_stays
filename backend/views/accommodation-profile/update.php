<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccommodationProfile */

$this->title = 'Update Accommodation Profile: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accommodation-profile-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
