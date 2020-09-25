<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccommodationGalleryImage */

$this->title = 'Update Accommodation Gallery Image: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Gallery Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="accommodation-gallery-image-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
