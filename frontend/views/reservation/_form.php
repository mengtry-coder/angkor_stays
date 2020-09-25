<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\RatePlan;
use backend\models\AccommodationProfile;
use yii\helpers\ArrayHelper; 
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reservation */
/* @var $form yii\widgets\ActiveForm */
$base_url = Yii::getAlias('@web');
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

$validationUrl = ['reservation/validation'];
if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}
$ratePlan = RatePlan::find()->where(['id'=>$rate_plan])->one();
$accomodation = AccommodationProfile::find()->where(['id'=>$ratePlan->accommodation_id])->one()->name;

$get_rate_list = Yii::$app->db->createCommand("
SELECT r.accommodation_id as accomodation_id, r.date,rp.name as name, rp.id as id, rp.guest as guest_number, r.price as price, r.promotion as promotion, r.promotion_type as promotion_type
    from rate as r
    left join rate_plan as rp on rp.id = r.rate_plan_id
    where r.accommodation_id = $ratePlan->accommodation_id
            AND r.date >= '$check_in_date'
            AND r.date < '$check_out_date'
            AND r.price > 0 
            AND rp.id = $rate_plan
            Order By r.date
")->queryAll(); 
?>

<div class="reservation-form">

    <?php $form = ActiveForm::begin([
        'action' => ['reservation/create'],
        'method' => 'post',
        'options' => ['enctype' => 'multipart/form-data'],
        'validationUrl' => $validationUrl
    ]); ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
         <div class="row">
            <div class="col-md-9">
                <div class="col-md-12">
                    <div class="check">
                        <b>Check In</b> : <?= $check_in_date; ?><br>
                        <b>Check Out</b> : <?= $check_out_date; ?><br/>
                        <b>Rate Plan</b> : <?= $ratePlan->name; ?><br/>
                        <b>Max Guest</b> : <?= $ratePlan->guest; ?>
                    </div>
                    <br>
                    <h4>Breakdown Price</h4>
                    <table id="w0" class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>#</td>
                                <td>Date</td>
                                <td>Promotion</td>
                                <td class="text-right">Price</td>
                                <td class="text-right">Amount</td>
                            </tr>
                            <?php
                            $total_amount = 0;
                            $k = 1;
                            foreach($get_rate_list  as $n){ 
                                $num_night = sizeof($get_rate_list);
                                $date = $n['date'];
                                $property_id = $n['accomodation_id'];
                                $promotions = Yii::$app->db->createCommand("
                                SELECT COALESCE( MAX(promotion),0) as promotion 
                                from promotion WHERE accommodation_id = $property_id and from_date <= '$date' and to_date >= '$date' and status = 1 and min_stay <= $num_night
                                ")->queryOne(); 
                                if(sizeof($promotions) > 0){
                                    $promotion = $promotions['promotion'];
                                }else{
                                    $promotion = 0;
                                }
                                $promotion_in_dolla =  ($n['price'] * $promotion) / 100;
                                $amount = $n['price'] - $promotion_in_dolla;
                                $amount = round($amount, 2);
                                $total_amount = $total_amount + $amount;
                                $total_amount = number_format((float)$total_amount, 2, '.', ''); 
                            
                            ?>
                            <tr class="data_arr">
                                <td><?= $k;?></td> 
                                <td><?=$n['date'];?></td> 
                                <td><?=$promotion;?> %</td>
                                <td class="text-right"><?=number_format((float)$n['price'], 2, '.', '');?> $</td> 
                                <td class="text-right"><?=number_format((float)$amount, 2, '.', '');?> $</td>

                            </tr>
                            <?php 
                            $k++;
                            }
                         ?>
                            <tr class="data_arr">
                                
                                <td colspan='4'>Total</td>
                                <td class="text-right"><?=$total_amount;?> $</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-2">
                            <input hidden type="text" name="check_in" value="<?= $check_in_date?>">
                            <input hidden type="text" name="check_out" value="<?= $check_out_date ;?>">
                            <input hidden type="text" name="rate_plan_id" value="<?= $rate_plan ?>">
                            <input hidden type="text" name="accommodation_id" value="<?= $ratePlan->accommodation_id;?>">
                            <input hidden type="text" name="total_amount" value="<?= $total_amount;?>">
                            <?php
                                $title = ["Mr."=>"Mr.","Ms."=>"Ms."];
                            ?>
                            <?= $form->field($model, 'title')->widget(Select2::classname(), [
                                    'data' => $title,
                                    'theme' => Select2::THEME_DEFAULT,
                                    'language' => 'eg',
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]);
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?=$form->field($model, 'first_name')->textInput(['style'=>'font-size:14px','maxlength' => true])?>
                        </div>
                        <div class="col-md-6">
                            <?=$form->field($model, 'last_name')->textInput(['style'=>'font-size:14px','maxlength' => true])?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-3">
                            <?=$form->field($model, 'number_of_guest')->input('number', ['min' => 1, 'max' => $ratePlan->guest, 'step' => 1,'style'=>'font-size:14px']) ?>
                        </div>
                        <div class="col-md-3">
                            <?=$form->field($model, 'email')->textInput(['style'=>'font-size:14px','maxlength' => true])?>
                        </div>
                        <div class="col-md-6">
                            <?=$form->field($model, 'contact_phone')->textInput(['style'=>'font-size:14px','maxlength' => true])?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'description')->textArea(['style'=>'font-size:14px',]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha2::className(),[
                        'siteKey' => '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
                        ]
                    ) ?>

                </div>
            </div>
            <div class="col-md-3">
                <div class="detail">
                    <span><b>Property Name</b>: <?=$accomodation;?></span>
                    <p><b>Total Price</b>: <?=$total_amount;?> $</p>
                    <p><b>For</b>: <?=sizeof($get_rate_list);?> Nights</p>
                </div>
                <br>
                <div class="booking_policy">
                    <b>Term & Condtion</b>: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et ad ipsum facere iusto nulla. <br><br>
                    <b>Policy Privacy</b>: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consequatur officia quasi.
                </div>
            </div>
        </div>
        <div class="form-group">
            <?=Html::submitButton('Book Now', ['class' => 'btn btn-success'])?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <style>
        button.btn.btn-success {
            text-align: center;
            margin: 0px 30%;
            padding: 10px 50px;
            border-radius: 30px;
            font-size: 14px;
        }
        .has-success .form-control {
            border-color: #3c763d;
            font-size: 14px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }
        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 34px;
            user-select: none;
            -webkit-user-select: none;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 32px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            display: block;
            padding-left: 8px;
            padding-right: 20px;
            overflow: hidden;
            padding: 2px 17px 2px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
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
