<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccommodationGalleryTitle */

$this->title = 'Update Accommodation Gallery Title: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Gallery Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accommodation-gallery-title-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
