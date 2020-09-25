<?php

use yii\helpers\Html;
use backend\models\AccommodationProfile;
/* @var $this yii\web\View */
/* @var $model backend\models\Room */

$this->title = 'Create Room';
$this->params['breadcrumbs'][] = ['label' => AccommodationProfile::findOne($id)->name, 'url' => ['accommodation-profile/update', 'id'=>$id]];
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">


    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>

</div>
