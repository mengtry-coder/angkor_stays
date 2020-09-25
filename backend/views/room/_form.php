<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Room;
use backend\models\AccommodationProfile;

/* @var $this yii\web\View */
/* @var $model backend\models\Room */
/* @var $form yii\widgets\ActiveForm */
$base_url = Yii::getAlias('@web');
$base_color = Yii::$app->params['baseColor'];
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$validationUrl = ['room/validation'];
if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}
$room = Room::find()->where(['accommodation_id' => $id])->all();
$count_room = count($room);
$max_room_arr = AccommodationProfile::findOne($id);
if ($max_room_arr) {
    $max_room = $max_room_arr->number_of_rooms;
}else{
   $max_room = ""; 
}
?>

<style>
    i#add_more {
        color: <?= $base_color; ?>;
        font-size: 40px;
        cursor: pointer;
        margin-top: 33px;
    }
    i#btn_remove {
        color: red;
        font-size: 40px;
        cursor: pointer;
    }
    i#btn_remove_update {
        color: red;
        font-size: 40px;
        cursor: pointer;
    }
</style>

<div class="room-form">

    <?php $form = ActiveForm::begin([
        'id' => $model->formName(),
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'action' => ['room/update', 'id' => $id],
        'options' => ['enctype' => 'multipart/form-data'],
        'validationUrl' => $validationUrl
    ]); ?>

    	<div class="row">
    		<div class="col-md-12">
    			<div class="add-range">
                    <?php
                        if (empty($room)) {
                            $count_room = 1;
                            ?>
                                <div class="row row_line" data-id= "1" id= "row_line_1">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                        					<?=$form->field($model, 'name')->textInput(['maxlength' => true, 'name' => 'room[]'])?>

                                        </div>
                                        <div class="col-md-7">
                        					<?=$form->field($model, 'description')->textInput(['maxlength' => true, 'name' => 'description_1'])?>
                                        </div>
                                        <div class="col-md-2">
                                            <i id=  "add_more" data-id= "1" style="margin-top: 27px; color: <?= $base_color; ?>; font-size: 40px; cursor: pointer;" class="ion-plus-circled add_more"></i>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>
                            <?php
                                }else{
                                    $k = 0;
                                    foreach ($room as $key => $value) {
                                        $k++;
                                        
                                        ?>
                                         <div class="row row_line" style="margin-top: 10px;" data-id= "<?= $k;?>" id= "row_line_<?= $k;?>">
                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                    <?= $k == 1 ? "<p>name</p>" : ""; ?>
                                                    <input type="text" name="room[]" value="<?= $value->name?>" class="form-control name" data-id="name_<?= $k;?>"
                                                                id="name_<?= $k;?>" required>
                                                </div>
                                                <div class="col-md-7">
                                                    <?= $k == 1 ? "<p>Description</p>" : ""; ?>
                                                    <input type="text" value="<?= $value->description?>" name="description_<?= $k;?>" class="form-control name" data-id="description_<?= $k;?>"
                                                                id="description_<?= $k;?>" required>
                                                </div>
                                                <div class="col-md-2">
                                                    <i id=  "<?= $k == 1 ? "add_more" : "btn_remove"; ?>" data-id= "<?= $k;?>" class="<?= $k == 1 ? "ion-plus-circled add_more" : "ion-minus-circled btn_remove"; ?>"></i>
                                                </div>
                                                <div class="col-md-6"></div>
                                            </div>
                                        </div>
                                        
                                    <?php 
                                    } // end foreach
                                } // end else
                             ?>
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
    var count_room = "$count_room";
    var max_room = "$max_room";


    $('.editor_area').each(function(e){
        CKEDITOR.replace( this.id, { customConfig: base_url + '/plugins/ckeditor/config.js' });
    });
    $('#rateplansetup-starting_time').datetimepicker({
        timepicker: true,
        datepicker: false,
        format: 'H:i',
        hours24: true,
    });
    // ===start append calculate room===
        var data_i = $(document).find('.amount[data-id]:last').attr('data-id');
        var i = count_room;

        var index = 1;
        $(".add_more").unbind('click');
        $(".add_more").bind('click', function(e){
            // var room = $('#name_['+i+']').val();
            var room = $('.name').val();
            var first_room = $('#room-name').val();
            if(first_room == ''){
                alert("Value can not null!");
                return false;
            }
            if(room == ''){
                alert("Value can not null!");
                return false;
            }
            if(i >= max_room){
                alert("Room Over Maximum");
                return false;
            }
            e.preventDefault();
            i++;
            index++;
            var string ="<div class='row row_line' style= 'margin-top: 10px;' data-id= '"+i+"' id= 'row_line_"+i+"'>" +
                            "<div class='col-md-12'>" +
                                "<div class='col-md-3'>" +
                                    "<input type='text' name='room[]' min='0' value= '' class='form-control name' data-id='description_"+i+"' id='name_"+i+"' required/>" +
                                "</div>" +
                                "<div class='col-md-7'>" +
                                    "<input type='text' name='description_"+i+"' min='0' value= '' class='form-control name' data-id='name_"+i+"' id='description_"+i+"' required/>" +
                                "</div>" +
                                "<div class='col-md-2'>" +
                                    "<i id=  'btn_remove_update' data-id= '"+i+"' class='ion-minus-circled btn_remove'></i>" +
                                "</div>" +
                                "<div class='col-md-6'>" +
                                "</div>" +
                            "</div>" +
                        "</div>"
                        ;

            $(".add-range").append(string);
            $(".ion-minus-circled").remove(string);

        });
        // ===end append calculate room====
        // ===Remove room row====
        $(document).on('click', '.btn_remove', function() {
            var id = $(this).attr('data-id');
            $('#row_line_'+ id).remove();
        });
        // ===end Remove room row====




    
JS;
$this->registerJS($script);
?>
