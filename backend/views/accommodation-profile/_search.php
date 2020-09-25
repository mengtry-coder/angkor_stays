<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model backend\models\AccommodationProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accommodation-profile-search">
    <div class="col-md-12 search-bd"> 

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class= "col-md-12">
            <div class="col-md-5r">
                <?=$form->field($model, 'globalSearch')->textInput(['placeholder' => 'Search']);?>
            </div>
            <div class="col-md-5r">
                <?php
                    $accommodation_type_name = ArrayHelper::map(\backend\models\AccommodationType::find()
                    ->where(['status'=>1])
                    ->all(), 'id', function($model){return $model->name;});
                ?>
                <?= $form->field($model, 'accommodation_type')->widget(Select2::classname(), [
                        'data' => $accommodation_type_name,
                        'theme' => Select2::THEME_DEFAULT,
                        'language' => 'eg',
                        'options' => ['placeholder' => 'Select accommodation type'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                ?> 
            </div>
            <div class="col-md-5r">
                <?php
                    $star_rating_name = ArrayHelper::map(\backend\models\StarRating::find()
                    ->where(['status'=>1])
                    ->all(), 'id', 'name');
                ?>
                <?= $form->field($model, 'star_rating')->widget(Select2::classname(), [
                        'data' => $star_rating_name,
                        'theme' => Select2::THEME_DEFAULT,
                        'language' => 'eg',
                        'options' => ['placeholder' => 'Select star rating'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                ?> 
            </div>
            <div class="col-md-5r">
                <?=$form->field($model, 'status')->dropDownList(['1' => 'Active', '0' => 'Inactive'], ['prompt' => 'Select status']);?>
            </div>
            <div class="col-md-5r">
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