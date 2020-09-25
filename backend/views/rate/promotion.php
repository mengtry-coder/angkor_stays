<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use kartik\select2\Select2;
    use yii\helpers\ArrayHelper;
    use backend\models\AccommodationProfile;


    if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}
$validationUrl = ['promotion/validation'];
$date_template = '{label}</br><div class="input-group">
            <span style="width: 50px;line-height: 0rem;padding: 9px;" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
 ?>
 <style>
     input#promotion_from_date {
    border: 1px solid #80808047;
    width: 100%
}
input#promotion_to_date {
    border: 1px solid #80808047;
    width: 100%
}
 </style>
<div class="promotion">
    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'enableAjaxValidation' => false,
        'action' => ['rate/promotion-create'],
        'enableClientValidation' => true,
        'options' => ['enctype' => 'multipart/form-data'],
        'validationUrl' => $validationUrl
    ]); ?>

    <div class="main_input">
        <div class="row">
            <div class="col-md-4">
                <?php
                    $acc_arr = ArrayHelper::map(AccommodationProfile::find()
                    ->where(['status'=>1])
                    ->all(), 'id', function($model){return $model->name;});
                ?>
                <?= $form->field($model, 'accommodation_id')->widget(Select2::classname(), [
                        'data' => $acc_arr,
                        'theme' => Select2::THEME_DEFAULT,
                        'language' => 'eg',
                        'options' => [
                            'name' => 'acc_name',
                            ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                ?> 
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'from_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important;', 'class'=>'yearly_from_date', 'id' => 'promotion_from_date']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'to_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important;', 'class'=>'yearly_to_date', 'id' => 'promotion_to_date']) ?>
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
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success save-btn']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
$base_url = Yii::getAlias('@web');
$script = <<< JS
        var base_url = "$base_url";
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

         $('#promotion_from_date, #promotion_to_date').datepicker({
            format: 'yyyy-mm-dd',
            changeMonth: true,
            changeYear: true,
            autoclose: true,
        });
        $( document ).ready(function() {
            var id = $("#rate-accommodation_id").val();
            console.log(id);
            $.ajax({
                url: base_url+'/index.php?r=rate/dependent',
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
                    $('#rate-rate_plan_id').html(str);
                }
            });
        });
        $("#rate-accommodation_id").change(function(){ 
            var id = $(this).val();
            $.ajax({
                url: base_url+'/index.php?r=rate/dependent',
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
                    $('#rate-rate_plan_id').html(str);
                }
            });

        });


JS;
$this->registerJS($script);
?>