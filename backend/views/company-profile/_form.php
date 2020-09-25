<?php

use backend\models\CompanyStatus;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanyProfile */
/* @var $form yii\widgets\ActiveForm */
$base_url = Yii::getAlias('@web');
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$validationUrl = ['company-profile/validation'];
if (!$model->isNewRecord) {
    $validationUrl['id'] = $model->id;
}
$date_template = '{label}</br><div class="input-group">
            <span style="width: 50px;line-height: 0rem;padding: 9px;" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
            ?>

<div class="company-profile-form">
    <?php $form = ActiveForm::begin([
                'id' => $model->formName(),
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'options' => ['enctype' => 'multipart/form-data'],
                'validationUrl' => $validationUrl,
            ]);?>
        <div class="row" style="background: white;padding: 10px;">
            <div class="col-lg-12">
                <div class="col-md-3">
                        <label class="control-label">Company Logo</label>
                        <div style="display: block">
                            <?=$form->field($model, 'file')->fileInput(['multiple' => false, 'accept' => 'image/*'])->label(false)?>
                        </div>
                        <div class="wr_img">
                            <?php if ($model->feature_image == "" || $model->isNewRecord) {?>
                                <label for = 'companyprofile-file'>
                                    <img id ='feature_images' src="<?php $base_url?>images/default-image.png" class='img-responsive'>
                                </label>
                            <?php } else {?>
                                <label for="companyprofile-file">
                                    <img id="feature_images" src="<?=$model->feature_image;?>" class="img-responsive" onError="this.onerror=null;this.src='<?=$base_url . '/backend/uploads/empty-avatar.png'?>';">
                                </label>
                            <?php }?>
                        </div>
                    </div>

                    <div class="col-md-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-lg-6">
                                <div class= "row">
                                    <div class= "col-lg-12">
                                        <div class="col-lg-6">
                                            <?php
                                            $country = ArrayHelper::map(\backend\models\Country::find()
                                                ->where(['id' => 56])
                                                ->all(), 'id', function ($model) {return $model->name;});
                                                ?>
                                                <?=$form->field($model, 'country_id')->widget(Select2::classname(), [
                                                    'data' => $country,
                                                    'id' => 'country_id',
                                                    'theme' => Select2::THEME_DEFAULT,
                                                    'language' => 'eg',
                                                    'options' => ['placeholder' => 'Select country'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true,
                                                    ],
                                                ]);
                                                ?>
                                            </div>
                                            <div class="col-lg-6">
                                                <?php 
                                                if (!$model->isNewRecord) {
                                                    $validation['id'] = $model->id;
                                                    $city = ArrayHelper::map(\backend\models\City::find()
                                                    ->where(['id' => 2])
                                                    ->all(), 'id', function ($model) {return $model->name;});
                                                    }else{
                                                        $city =[];
                                                    }
                                                 ?>
                                                    <?=$form->field($model, 'city_id')->widget(Select2::classname(), [
                                                        'data' => $city,
                                                        'theme' => Select2::THEME_DEFAULT,
                                                        'language' => 'eg',
                                                        'options' => ['placeholder' => 'Select city'],
                                                        'pluginOptions' => [
                                                            'allowClear' => true,
                                                        ],
                                                    ]);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <?=$form->field($model, 'postal_code')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-lg-6">
                                <?=$form->field($model, 'website_url')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-lg-6">
                                <?=$form->field($model, 'address')->textInput(['maxlength' => true])?>
                            </div>
                            <div class= "col-lg-6">
                                <?php
                                $model->status = $model->isNewRecord ? 1 : $model->status;
                                echo $form->field($model, 'status')->radioList(['1' => 'Active', '0' => 'Inactive'], ['unselect' => false, 'default' => 1]);
                                ?>
                            </div>
                               <!-- start tab -->
            <div class= "col-lg-12">
                <ul class="nav nav-tabs">
                    <li class= "active"><a data-toggle="tab" href="#profile">Descriptoin</a></li>
                    <li><a data-toggle="tab" href="#contact">Contact</a></li>
                    <li><a data-toggle="tab" href="#term">Term & Condition</a></li>
                    <li><a data-toggle="tab" href="#social">Social Media</a></li>
                    <li><a data-toggle="tab" href="#mail">Mailing</a></li>
                </ul>   
                <!-- content -->
                <div class="tab-content">
                     <!-- ==========tap 1======== -->
                     <div id="profile" class="tab-pane fade in active"><br>
                            <div class= "row">
                                <div class="col-lg-12">
                                    <?= $form->field($model, 'description')->textArea(['class'=>"editor_area"]) ?>
                                </div>
                            </div>
                        </div>
                        <!-- ==========end tap1======== -->
                    <!-- ==========tap 1======== -->
                        <div id="contact" class="tab-pane fade in "><br>
                            <div class= "row">
                                <div class= "col-lg-12">
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'reservation_email')->textInput([]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=$form->field($model, 'contact_person')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=$form->field($model, 'general_email')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=$form->field($model, 'main_phone_1')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=$form->field($model, 'main_phone_2')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=$form->field($model, 'invoice_email')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=$form->field($model, 'mobile_number_invoice')->textInput(['maxlength' => true])?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ==========end tap1======== -->
                        <div id="term" class="tab-pane fade in"><br>
                            <div class= "row">
                                <div class= "col-lg-12">
                                    <?= $form->field($model, 'term_condition')->textArea(['class'=>"editor_area"]) ?>
                                </div>
                                <div class= "col-lg-12">
                                    <?= $form->field($model, 'privacy_policy')->textArea(['class'=>"editor_area"]) ?>
                                </div>
                                <div class= "col-lg-12">
                                    <?= $form->field($model, 'payment_term')->textArea(['class'=>"editor_area"]) ?>
                                </div>
                            </div>
                        </div>
                        <!-- ==========start tap5======== -->
                        <div id="social" class="tab-pane fade in"><br>
                            <div class= "row">
                                <div class= "col-lg-12">
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'link_facebook')->textInput([]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'link_instagram')->textInput([]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'link_twitter')->textInput([]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'link_linkedin')->textInput([]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'map_link')->textInput([]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ==========end tap5======== -->
                        <!-- ==========start tap5======== -->
                        <div id="mail" class="tab-pane fade in"><br>
                            <div class= "row">
                                <div class= "col-lg-12">
                                    <p class="text-danger">* Note: Make sure the Gmail and Password are correct.</p>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'gmail_username')->textInput([]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'gmail_password')->passwordInput(['maxlength' => true, 'id' => 'myInput']) ?>
                                        <input class="check_box" type="checkbox" onclick="myFunction()"> បង្ហាញពាក្យសម្ងាត់
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
            </div>
                </div>
                <!-- ===============end div-->
                        </div> 
                        
            </div>
            <div class="col-md-12 v-space"></div>
         
               
            </div>
            <!-- end tab -->
           
        </div>
    <?php ActiveForm::end();?> 

</div>



<?php
$script = <<< JS

    var base_url = "$base_url";

    $('.editor_area').each(function(e){
        CKEDITOR.replace( this.id, { customConfig: base_url + '/plugins/ckeditor/config.js' });
    });

    $(function () {
        $("#companyprofile-file").change(function () {
            readURL(this);
        });
        $("#companyprofile-file").hide();
    });
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                x= e.target.result;
                $("#feature_images").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#companyprofile-sale_date, #companyprofile-lived_date').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true,
    });
 
    
    

    // // =========city country===========

    // $("#companyprofile-country_id").change(function(){ 
    //     var id = $(this).val();
    //     $.ajax({
    //         url: base_url+'/index.php?r=company-profile/index',
    //         type: 'post',
    //         data: {
    //             country_id: id,
    //             action: 'get_city'
    //         },
    //         success: function(response){ 
    //             var data = JSON.parse(response);
    //             var str = "";
    //             $.each(data,function(key,value){
    //                 str = str + '<option value="'+value.id+'">'+value.name+'</option>';
    //             });
    //             $('#companyprofile-city_id').html(str);
    //         }
    //     });

    // });

JS;

$this->registerJs($script);

?>
<script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>