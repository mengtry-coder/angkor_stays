<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; 
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Promotion */
/* @var $form yii\widgets\ActiveForm */
$date_template = '{label}</br><div class="input-group">
            <span style="width: 50px" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
$base_url = Yii::getAlias('@web');
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$validationUrl = ['promotion/validation'];
if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}

?>

<div class="promotion-form">
    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'options' => ['enctype' => 'multipart/form-data'],
        'validationUrl' => $validationUrl
    ]); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <?php
                        $acc_name = ArrayHelper::map(\backend\models\AccommodationProfile::find()
                        ->where(['status'=>1])
                        ->all(), 'id', function($model){return $model->name;});
                    ?>
                    <?= $form->field($model, 'accommodation_id')->widget(Select2::classname(), [
                            'data' => $acc_name,
                            'theme' => Select2::THEME_DEFAULT,
                            'language' => 'eg',
                            'pluginOptions' => [
                                'allowClear' => true,
                                'class' => 'form-control',
                            ],
                        ]);
                    ?> 
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'from_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'width: 100%; border: 1px solid #00000024; padding: 7px;', 'class'=>'yearly_from_date', 'id' => 'promotion_from_date']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'to_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'width: 100%; border: 1px solid #00000024; padding: 7px;', 'class'=>'yearly_to_date', 'id' => 'promotion_to_date']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'name') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'min_stay') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'rate_plan_id')->widget(Select2::classname(), [
                            'data' => "",
                            'theme' => Select2::THEME_DEFAULT,
                            'language' => 'eg',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?> 
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'promotion') ?>
                </div>
                <div class="col-md-4">
                    <?php 
                        $promotion_arr = ['0' => '%', '1' => 'Amount'];
                        echo $form->field($model, 'promotion_type')->widget(Select2::classname(), [
                            'data' => $promotion_arr,
                            'theme' => Select2::THEME_DEFAULT,
                            'language' => 'eg',
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?> 
                </div>
                <div class= "col-md-6">
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
if ($model->isNewRecord) {
    $isNewRecord = 1;
    $from_date = "";
    $to_date = "";
}else{
    $isNewRecord = 0;
    $from_date = $model->from_date;
    $to_date = $model->to_date;
}
$base_url = Yii::getAlias('@web');
$script = <<< JS
        var base_url = "$base_url";
        var isNewRecord = "$isNewRecord";
        var to_date = "$to_date";
        var from_date = "$from_date";
        $('.editor_area').each(function(e){
            CKEDITOR.replace( this.id, { customConfig: base_url + '/plugins/ckeditor/config.js' });
        });
        if(isNewRecord == 1){
            $(document).ready(function(){
                $("#promotion_from_date").datepicker("setDate", new Date());
                $("#promotion_from_date").datepicker("setStartDate", new Date());
                $("#promotion_to_date").datepicker("setDate", new Date());
                $("#promotion_to_date").datepicker("setStartDate", new Date());
            });

            $("#promotion_from_date").change(function(){
                $("#promotion_to_date").datepicker("setDate", $(this).val());
                $("#promotion_to_date").datepicker("setStartDate", $(this).val());
            });
        }else{
            $(document).ready(function(){
                $("#promotion_from_date").datepicker("setDate", new Date(from_date));
                $("#promotion_from_date").datepicker("setStartDate", new Date(from_date));
                $("#promotion_to_date").datepicker("setDate", new Date(to_date));
                $("#promotion_to_date").datepicker("setStartDate", new Date(from_date));
            });

            $("#promotion_from_date").change(function(){
                $("#promotion_to_date").datepicker("setDate", $(this).val());
                $("#promotion_to_date").datepicker("setStartDate", $(this).val());
            });
        }

         $('#promotion_from_date, #promotion_to_date').datepicker({
            format: 'yyyy-mm-dd',
            changeMonth: true,
            changeYear: true,
            autoclose: true,
        });
        $( document ).ready(function() {
            var id = $("#promotion-accommodation_id").val();
            $.ajax({
                url: base_url+'/index.php?r=promotion/dependent',
                type: 'post',
                data: {
                    id: id,
                    action: 'get_rate_plan'
                },
                success: function(response){ 
                    var data = JSON.parse(response);
                    var str = "";
                    $.each(data,function(key,value){
                        str = str + '<option value="'+value.id+'">'+value.name+'</option>';
                    });
                    $('#promotion-rate_plan_id').html(str);
                }
            });
        });
        $("#promotion-accommodation_id").change(function(){ 
            var id = $(this).val();
            $.ajax({
                url: base_url+'/index.php?r=promotion/dependent',
                type: 'post',
                data: {
                    id: id,
                    action: 'get_rate_plan'
                },
                success: function(response){ 
                    var data = JSON.parse(response);
                    var str = "";
                    $.each(data,function(key,value){
                        str = str + '<option value="'+value.id+'">'+value.name+'</option>';
                    });
                    $('#promotion-rate_plan_id').html(str);
                }
            });

        });


JS;
$this->registerJS($script);
?>
