<?php

use yii\helpers\Html;
use backend\models\AccommodationProfile;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PromotionSearch */
/* @var $form yii\widgets\ActiveForm */
$date_template = '{label}</br><div class="input-group">
            <span style="width: 50px" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
?>

<div class="promotion-search">
    <div class="col-md-12 search-bd"> 

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class= "col-sm-12">
            <div class="col-md-4">
                <?php
                    $acc_name = ArrayHelper::map(AccommodationProfile::find()
                    ->where(['status' => 1])
                    ->all(), 'id', function($model){return $model->name;});
                ?>
                <?= $form->field($model, 'accommodation_id')->widget(Select2::classname(), [
                        'data' => $acc_name,
                        'theme' => Select2::THEME_DEFAULT,
                        'language' => 'eg',
                        'options' => ['placeholder' => 'Property Name'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                ?> 
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'from_date', ['template'=>$date_template])
                ->textInput(['readonly' => true, 'style'=>'background: #fff !important;']) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'to_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important;']) ?>
            </div>
            <div class="col-sm-2">
                <?=$form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Inactive'], ['prompt' => 'Select status']);?>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <?=Html::submitButton('Filter', ['class' => 'btn btn-primary'])?>
                    <?= Html::a('Reset',['index'],['class' => 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

</div>
<style>
.search-bd{
    background: whitesmoke;
    height: 100px; 
    padding: 15px;  
}
.btn-primary {
    color: #fff;
    background-color: #3f5773;
    border-color: #3f5773; 
    margin-top: 30px;
}
</style>

<?php
$script = <<< JS
    $('#promotionsearch-from_date, #promotionsearch-to_date').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true,
    });


    $(document).ready(function(){
        $("#promotionsearch-from_date").datepicker("setStartDate", new Date());
        $("promotionsearch-to_date").datepicker("setStartDate", new Date());
    });

    $("#promotionsearch-from_date").change(function(){
        $("#promotionsearch-to_date").datepicker("setDate", $(this).val());
        $("#promotionsearch-to_date").datepicker("setStartDate", $(this).val());
    });
JS;
$this->registerJS($script);
?>