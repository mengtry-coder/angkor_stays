<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccommodationGalleryImage */

$this->title = 'Create Accommodation Gallery Image';
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Gallery Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodation-gallery-image-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
