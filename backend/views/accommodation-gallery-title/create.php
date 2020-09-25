<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccommodationGalleryTitle */

$this->title = 'Create Accommodation Gallery Title';
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Gallery Titles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodation-gallery-title-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
