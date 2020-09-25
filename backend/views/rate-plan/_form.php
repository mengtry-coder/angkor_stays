<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RatePlan */
/* @var $form yii\widgets\ActiveForm */


$validationUrl = ['rate-plan/validation'];
if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}
?>

<div class="rate-plan-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'options' => ['enctype' => 'multipart/form-data'],
        'validationUrl' => $validationUrl
    ]); ?>
    <div class="row">
    	<div class="col-md-12">
    		<div class="col-md-3">
	    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			</div>
			<div class="col-md-3">
	    		<?= $form->field($model, 'guest')->textInput(['maxlength' => true]) ?>
			</div>
			<div class="col-md-4">
	    		<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
			</div>
    	</div>
    </div>

 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
