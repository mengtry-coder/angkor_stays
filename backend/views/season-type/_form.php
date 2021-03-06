<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SeasonType */
/* @var $form yii\widgets\ActiveForm */
$base_url = Yii::getAlias('@web');
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$validationUrl = ['season-type/validation'];
if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}

?>

<div class="season-type-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'options' => ['enctype' => 'multipart/form-data'],
        'validationUrl' => $validationUrl
    ]); ?>
        <div class="row">
            <div class="col-md-12">                    
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true])?>
                </div>
                <div class="col-md-6">
                    <?php
                        $model->status = $model->isNewRecord ? 1 : $model->status;
                        echo $form->field($model, 'status')->radioList(['1' => 'Active', '0' => 'Inactive'], ['unselect' => false, 'default' => 1]);
                        ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'description')->textArea(['class'=>"editor_area"]) ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS

    var base_url = "$base_url";

    $('.editor_area').each(function(e){
        CKEDITOR.replace( this.id, { customConfig: base_url + '/plugins/ckeditor/config.js' });
    });

JS;
$this->registerJS($script);
?>
