<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Experience */

$this->title = 'Create Experience';
$this->params['breadcrumbs'][] = ['label' => 'Experiences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experience-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
