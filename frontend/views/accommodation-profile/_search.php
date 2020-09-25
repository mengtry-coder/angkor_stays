<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\models\AccommodationType;
    use yii\helpers\ArrayHelper;
    use kartik\select2\Select2;
    use frontend\models\AccommodationProfile;
    use backend\models\Facility;
    use backend\models\Allotment;
    $date_template = '{label}</br><div class="input-group">
            <span style="width: 50px;line-height: 0rem;padding: 9px;" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
?>
<style>
input#date {
    border: 1px solid #80808094;
    padding: 12px;
    margin: 0px 12px;
}

input#date_to {
    border: 1px solid #80808094;
    padding: 12px;
    margin: 0px 7px;
}
</style>

<div class="from_fitter">
    <?php $form = ActiveForm::begin([
        'action' => ['accommodation-profile/index'],
        'method' => 'get',
    ]); ?>
    <div class="row no-gutters">
        <div class="col-lg-2">
            <div class="select_form">
                <input type="text" id="demo" class="form-control">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="select-form">
                <?php
                        $acc_type = ArrayHelper::map(AccommodationType::find()
                        ->where(['status' => 1])
                        ->all(), 'id', function($model){return $model->name;});
                    ?>
                <?= $form->field($model, 'accommodation_type')->label(false)->widget(Select2::classname(), [
                            'data' => $acc_type,
                            'theme' => Select2::THEME_DEFAULT,
                            'language' => 'eg',
                            'options' => ['placeholder' => 'Type'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="select_form">
                <?php
                        $facility = ArrayHelper::map(facility::find()
                        ->where(['status' => 1])
                        ->all(), 'id', function($model){return $model->name;});
                    ?>
                <?= $form->field($model, 'facility')->label(false)->widget(Select2::classname(), [
                            'data' => $facility,
                            'theme' => Select2::THEME_DEFAULT,
                            'language' => 'eg',
                            'options' => [
                                'placeholder' => 'Facility',
                                'multiple' => true,
                                
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?>

            </div>
        </div>
        <div class="col-lg-2">
            <div class="select_form">
                <?php
                        $number_of_guests = ['1' => '1 Guest', '2' => '2 Guests', '3' => '3 Guests', '4' => '4 Guests', '5' => '5 Guests', '6' => '6 Guests', '7' => '7 Guests', '8' => '8 Guests', '9' => '9 Guests', '10' => '10 Guests', '11' => '11 Guests', '12' => '12 Guests', '13' => '13 Guests', '14' => '14 Guests', '15' => '15 Guests', '16' => '16 Guests', '17' => '17 Guests', '18' => '18 Guests', '19' => '19 Guests', '20' => '20+ Guests'];
                    ?>
                <?= $form->field($model, 'max_guest')->label(false)->widget(Select2::classname(), [
                            'data' => $number_of_guests,
                            'theme' => Select2::THEME_DEFAULT,
                            'language' => 'eg',
                            'options' => ['placeholder' => 'Guest'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?>
            </div>
        </div>
        <div class="col-md-1">
            <div class="select_form">
                <?=$form->field($model, 'price_from')->textInput(['maxlength' => true, 'placeholder' => '$ From', 'type' => 'number'])->label(false)?>
            </div>
        </div>
        <div class="col-md-1">
            <div class="select_form">
                <?=$form->field($model, 'price_to')->textInput(['maxlength' => true, 'placeholder' => '$ To', 'type' => 'number'])->label(false)?>
            </div>
        </div>
        <div class="select_form">
            <?= $form->field($model, 'from_date')->hiddenInput(['id' => 'from_date', 'value' => ''])->label(false); ?>
        </div>
        <div class="select_form">
            <?= $form->field($model, 'to_date')->hiddenInput(['id' => 'to_date', 'value' => ''])->label(false); ?>
        </div>
        <div class="col-lg-1">
            <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn_search']) ?>
        </div>


    </div>
    <?php ActiveForm::end(); ?>
</div>
<style type="text/css">
    input#accommodationprofilesearch-price_from {
        padding: 23px 7px;
        font-size: 13px;
        /*margin: 0px 1px;*/
        border-radius: 0px;
    }
    input#accommodationprofilesearch-price_to {
        padding: 23px 7px;
        /*margin: 0px 4px;*/
        font-size: 13px;
        border-radius: 0px;
    }
.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 44px;
    /*height: 100%;*/
}

.page_accommodation_type .fiiter .from_fitter {
    border-radius: 0px;
}

.select2-container--default .select2-selection--single {
    border-radius: 0px;
}

.page_accommodation_type .fiiter .from_fitter .btn_search {
    padding: 12px;
    height: initial;
}

.page_accommodation_type .fiiter .from_fitter .select_form .form-control {
    box-shadow: none;
}

.select2-container--default .select2-search--inline .select2-search__field {
    padding: 7px;
    line-height: 23px;
}

.select2-container--default .select2-selection--multiple {
    border-radius: 0;
}

.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: solid #adb0b0 1px;
}

.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    height: 79%;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 42px;
}

span.select2-selection.select2-selection--single {
    height: 49px;
}
</style>
<?php
$script = <<< JS
    var f_from_date = "$f_from_date";
    var f_to_date = "$f_to_date";
    $("#demo").daterangepicker({
        autoApply: true,
        // showDropdowns: true,
        // timePicker: true,
        // timePickerSeconds: true,
        // timePicker24Hour: true,
        // opens: 'left',
        // drops: 'down',
        startDate: f_from_date,
        minDate: new Date(),
        endDate: f_to_date,
        locale: {
            format: 'YYYY-MM-DD' 
        }
    });
    $("#demo").change(function(){
        var date = $(this).val();
        var from_date = date.substring(0, 11);
        var to_date = date.substr(13, 11);
        $("#from_date").val(from_date);
        $("#to_date").val(to_date);
        
    });
    $(document).ready(function(){
        var date = $("#demo").val();
        var from_date = date.substring(0, 11);
        var to_date = date.substr(13, 11);
        $("#from_date").val(from_date);
        $("#to_date").val(to_date);
        
    });


JS;
$this->registerJS($script);
?>