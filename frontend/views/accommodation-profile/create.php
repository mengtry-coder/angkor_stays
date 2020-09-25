<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AccommodationProfile */

$this->title = 'Create Accommodation Profile';
$this->params['breadcrumbs'][] = ['label' => 'Accommodation Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodation-profile-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
