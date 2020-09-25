<?php 
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use backend\models\AccommodationType;
    use yii\helpers\ArrayHelper;
    use kartik\select2\Select2;
    use frontend\models\AccommodationProfile;
    use backend\models\Facility;

?>

<div class="from_fitter">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <div class="row no-gutters">
            <div class="col-lg-2">
                <div class="select_form">
                    <!-- <input type="date" class="form-control" placeholder="Date"> -->
                    <input type="text" name="daterangepicker" id="calendar" class="form-control">
                    <!-- <?= $form->field($model, 'check_in_time')->textInput() ?> -->
                    <!-- <?= $form->field($model, 'check_in_time')->textInput(['id' => 'calendar', 'readonly' => true,'class'=>'form-control'])->label(false) ?>      -->
                </div>
            </div>
            <div class="col-lg-2">
                <div class="select_form">
                    <?php
                        $number_of_rooms = ['1' => '1 room', '2' => '2 rooms', '3' => '3 rooms', '4' => '4 rooms', '5' => '5 rooms', '6' => '6 rooms'];
                    ?>
                    <?= $form->field($model, 'number_of_rooms')->label(false)->widget(Select2::classname(), [
                            'data' => $number_of_rooms,
                            'theme' => Select2::THEME_DEFAULT,
                            'language' => 'eg',
                            'options' => [
                                'placeholder' => 'Select Rooms'
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            
                            ],
                        ]);
                    ?> 
                        
                </div>
            </div>
            <div class="col-lg-2">
                <div class="select_form">
                    <?php
                        $number_of_guests = ['1' => '1 Guest', '2' => '2 Guests', '3' => '3 Guests', '4' => '4 Guests', '5' => '5 Guests', '6' => '6 Guests'];
                    ?>
                    <?= $form->field($model, 'number_of_guests')->label(false)->widget(Select2::classname(), [
                            'data' => $number_of_guests,
                            'theme' => Select2::THEME_DEFAULT,
                            'language' => 'eg',
                            'options' => ['placeholder' => 'Select Number'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?> 
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
                            'options' => ['placeholder' => 'Select Type'],
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
                            'options' => ['placeholder' => 'Select Facility'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?> 
                </div>
            </div>
            <div class="col-lg-2">
                <?= Html::submitButton('Search', ['class' => 'btn_search']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<style type="text/css">
    .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 100%;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        line-height: 46px;
    }
    .page_accommodation_type .fiiter .from_fitter{
        border-radius: 0px;
    }
    .select2-container--default .select2-selection--single{
        border-radius: 0px;
    }
    .page_accommodation_type .fiiter .from_fitter .btn_search{
        padding: 12.5px;
        height: initial;
    }
    .page_accommodation_type .fiiter .from_fitter .select_form .form-control{
        box-shadow: none;
    }
</style>
<?php
$script = <<< JS
    $(function () {
        $("#calendar").daterangepicker({
            autoApply: true,
            // showDropdowns: true,
            // timePicker: true,
            // timePickerSeconds: true,
            // timePicker24Hour: true,
            // opens: 'left',
            // drops: 'down',
            // startDate: '06/23/2020',
            // endDate: '06/24/2020',
            locale: {
                format: 'DD/MMM/YYYY' 
            }
        });
    });


JS;
$this->registerJS($script);
?>