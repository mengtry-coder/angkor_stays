<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\TourItemGallery;
use backend\models\RatePlanSetupSearch;
use yii\web\Cookie;


/* @var $this yii\web\View */
/* @var $model backend\models\TourItem */
/* @var $form yii\widgets\ActiveForm */
$time_template = '
    {label}
    </br>
    <div class="input-group">
        <span style="width: 40px" class="input-group-addon">
            <i class="demo-pli-clock"></i>
        </span> 
        {input} 
    </div>
    {error}{hint}';
$base_url = Yii::getAlias('@web');
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$validationUrl = ['tour-item/validation'];
if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}

if ($model->isNewRecord) {
    $hide = "hidden";
}else{
    $hide = "";
}
?>

<div class="tour-item-form">
<style>
.img-rounded {
    padding: 10px;
    object-fit: cover;
}
input#touritem-starting_time {
    border: 1px solid #ededed;
}
img.img-fluid {
    width: 100%;
    height: 280px;
    object-fit: cover;
    border: 1px solid #afa8a8;
}
i.fa.fa-close.icon-flat {
    position: absolute;
    top: 6px;
    right: 15px;
    background: #ded8d880;
    padding: 10px;
}
</style>
    <ul class="nav nav-tabs">
        <li class= "active"><a data-toggle="tab" href="#tour_item">Tour Item</a></li>
    </ul>   
    <!-- content -->
    <div class="tab-content">
        <div id="tour_item" class="tab-pane fade in active"><br>
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
                        <label class="control-label">Feature Image</label>
                        <div style="display: block">
                            <?= $form->field($model, 'file')->fileInput(['multiple' => false, 'accept' => 'image/*',])->label(false) ?>
                        </div>
                        <div class="wr_img">
                            <?php if ($model->feature_image == "" || $model->isNewRecord ){ ?>
                                <label for = 'touritem-file'>
                                    <img id ='feature_images' src="<?php $base_url?>images/default-image.png" class='img-responsive'>
                                </label>
                            <?php } else {?>
                                <label for="touritem-file">
                                    <img id="feature_images" src="<?= $model->feature_image;?>" class="img-responsive" onError="this.onerror=null;this.src='<?= $base_url.'/backend/uploads/empty-avatar.png' ?>';">
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    $tour_category = ArrayHelper::map(\backend\models\TourCategory::find()
                                    ->where(['status'=>1])
                                    ->all(), 'id', function($model){return $model->name;});
                                ?>
                                <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
                                        'data' => $tour_category,
                                        'theme' => Select2::THEME_DEFAULT,
                                        'language' => 'eg',
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]);
                                ?> 
                                </div>
                                <div class="col-md-4">
                                    <?=$form->field($model, 'price')->textInput(['maxlength' => true])?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <?=$form->field($model, 'duration')->textInput(['maxlength' => true])?>
                                </div>
                                <div class="col-md-4"> 
                                    <?php
                                        $duration_type = ["1"=>"Day","2"=>"Hour"];
                                    ?>
                                    <?= $form->field($model, 'duration_type')->widget(Select2::classname(), [
                                            'data' => $duration_type,
                                            'theme' => Select2::THEME_DEFAULT,
                                            'language' => 'eg', 
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]);
                                    ?> 
                                </div>
                                <div class="col-md-4">
                                    <?php 

                                    $model->starting_time = $model->isNewRecord ? '5:00' : $model->starting_time;
                                     ?>
                                    <?= $form->field($model, 'starting_time', [
                                        'template'=>$time_template,
                                        'options' => ['placeholder' => 'Time']
                                        ])->textInput(['class'=>'date_picker']) 
                                    ?>  
                                </div>
                            </div>
                        </div>

                        <div class= "col-md-6">
                            <?php
                                $model->recommended = $model->isNewRecord ? 0 : $model->recommended;
                                echo $form->field($model, 'recommended')->radioList(['1' => 'Recommended', '0' => 'Not Recommended'], ['unselect' => false, 'default' => 0]);
                            ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'description')->textArea(['style' => 'height:100px!important;']) ?>
                        </div>
                        <div class="col-md-12">
                            <?= $form->field($model, 'tip_note')->textArea(['class'=>"editor_area"]) ?>
                        </div>

                        <div class= "col-md-6">
                            <?php
                                $model->status = $model->isNewRecord ? 1 : $model->status;
                                echo $form->field($model, 'status')->radioList(['1' => 'Active', '0' => 'Inactive'], ['unselect' => false, 'default' => 1]);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3>Photo Gallery <hr></h3><br>
                        <?= $form->field($model, 'file_name[]')->fileInput(['multiple' => true, 'accept' => 'image/*',])->label(false) ?>
                    </div>
                    <div class="col-md-12">
                        <?php 
                            if (!$model->isNewRecord) {
                                $tour_item_gallery = TourItemGallery::find()->where(['tour_item_id' => $model->id])->all();
                            }else{
                                $tour_item_gallery = [];
                            }
                        ?>
                        <?php
                            foreach ($tour_item_gallery as $row_tour_item_gallery) {   
                        ?>
                            <figure class="col-md-4">
                                <img id= "<?= $row_tour_item_gallery['id'] ;?>" alt="picture" src="<?= $row_tour_item_gallery['file_path'].$row_tour_item_gallery['file_name'] ;?>" class="img-fluid">
                                <?= Html::a('<i class="fa fa-close icon-flat"></i>', ['delete-image', 'id' => $row_tour_item_gallery->id], ['class' => 'remove-image', 'data' => [
                                                'confirm' => 'Are you sure want to delete it?',
                                                'method' => 'post',
                                            ],]) ?>
                            </figure>
                        <?php 
                            }   
                        ?>
                    </div>
                </div>
            </div>
             <div class="col-lg-12">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>  
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
<?php

$script = <<< JS
    $(function () {
        $("#touritem-file").change(function () {
            readURL(this);
        });
        $("#touritem-file").hide();
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

    $(function () {
        $("#touritem-file").change(function () {
            readURL(this);
        });
        $("#touritem-file").hide();
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

    var base_url = "$base_url";

    $('.editor_area').each(function(e){
        CKEDITOR.replace( this.id, { customConfig: base_url + '/plugins/ckeditor/config.js' });
    });
    // =========Timepicker===========

    $('#touritem-starting_time').datetimepicker({
        timepicker: true,
        datepicker: false,
        format: 'H:i',
        hours24: true,
    });
    // $("i").click(function(event){ 
    //     var id = event.target.id;
    //     console.log(id);
    //     $.ajax({
    //         url: base_url+'/index.php?r=tour-item/remove',
    //         type: 'post',
    //         data: {
    //             id: id,
    //             action: 'delete_image'
    //         },
    //         success: function(response){
    //             var data = JSON.parse(response);
    //         }
    //     });
    // });


JS;
$this->registerJS($script);
?>
