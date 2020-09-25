<?php 
    use yii\helpers\Url;
    use yii\helpers\Html;
    use backend\models\AccommodationGalleryImage;
    use yii\widgets\ActiveForm;
    use backend\models\AccommodationGalleryTitle;    
    use yii\helpers\ArrayHelper;
    use kartik\select2\Select2;
    use backend\models\RatePlan;
    use backend\models\CompanyProfile;
    use backend\models\CustomField;
    use app\models\Promotion;


    $this->title = $model->name;
    
if (!$model->isNewRecord){
    $validationUrl['id'] = $model->id;
}

$validationUrl = ['reservation/validation'];
$date_template = '{label}</br><div class="input-group">
            <span style="width: 50px;line-height: 0rem;padding: 9px;" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
?>
<style>
    .modal-header {
        background: #d05454;
        color: white;
    }
    button.btn.btn-dark.close {
        background: none;
    }
    .modal-header .close {
        margin: -1rem 0rem -1rem auto;
        font-size: 20px;
        padding: none;
        color: white;
        background-color: none;
    }
    button.btn.btn-danger {
        background: #b1303c;
        width: 100%;
        font-size: 14px;
        border-radius: 32px;
    }
    button.btn.btn-success.book {
        width: 40%;
        font-size: 14px;
        border-radius: 32px;
        margin: 0px 0px 20px;
    }
    .gm-style-iw-d {
        text-align: center;
        padding-left: 13px;
    }
    .gm-style-iw.gm-style-iw-c {
        padding: 5px;
    }
    select#number_of_guest {
        width: 100%;
        padding: 7px;
        margin: 10px 0px;
        border: 1px solid #8080806b;
    }
    .fa {
        display: inline-block;
        margin: 0px 10px;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: 15px;
        -webkit-font-smoothing: antialiased;
    }

    p#check_av {
        text-align: center;
        background: red;
        padding: 5px;
        color: white;
        cursor: pointer;
    }
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #aaa;
        border-radius: 0px;
        height: 38px;
        padding: 5px 0px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 1px;
        right: 3px;
        margin: 5px 0px;
        width: 20px;
    }
</style>
<div class="book_on_mobile">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <p class="price">From <span>USD <?= $model->price; ?></span></p>
            </div>
            <div class="col-6">
                <p><a class="btn_book_mobile">Book Now</a></p>
            </div>
        </div>
    </div>
</div>
<div class="single_acc_type">
    <div class="container">
        <div class="title">
            <h1><?= $model->name; ?></h1>
            <ul>
                <li>From <span>USD <?= $model->price; ?></span></li>
                <li><i class="fa fa-bed"></i> <?= $model->number_of_rooms; ?> Rooms</li>
                <li><i class="fa fa-bed"></i> <?= $model->max_guest; ?> Guest</li>
            </ul>
        </div>
        <div class="contact">
            <?php
                if ($model->phone_number) {
                    ?>
                        <i class="fa fa-phone"></i> <?= $model->phone_number ;?> <br>
                    <?php
                 } 
                 if ($model->address) {
                    ?>
                        <i class="fa fa-map-marker"></i> <?= $model->address ;?> <br>
                    <?php
                 }
                 if ($model->email_address) {
                    ?>
                        <i class="fa fa-envelope"></i> <?= $model->email_address ;?> <br>
                    <?php
                 }
                 if ($model->website_url) {
                    ?>
                        <i class="fa fa-globe"></i> <?= $model->website_url ;?> <br>
                    <?php
                 }
             ?>
        </div><br>
        <div class="image_group">
            <div class="row no-gutters">
                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="big_img">
                        <a href="<?= $model->feature_image ;?>" data-fancybox="images" data-caption="" >
                            <img src="<?= $model->feature_image ;?>" />
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="row no-gutters">
                        <?php
                            foreach ($gallery_image as $key => $value) {
                                ?>
                                    <div class="col-6">
                                        <div class="small_image">
                                            <a href="<?= $value->file_path.$value->file_name ;?>" data-fancybox="images"  data-caption="">
                                                <img src="<?= $value->file_path.$value->file_name ;?>" />
                                            </a>
                                        </div>
                                    </div>
                                <?php
                            }
                         ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="our_detail">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="description">
                        <div class="title_single">
                            <div class="line"></div>
                            <div class="b_title">
                                <h1>Description</h1>
                            </div>
                        </div>
                        <p><?= $model->description; ?></p>
                    </div>
                    <!-- Start Breaking Price -->
                    <!-- <div id="allotment_scroll"></div> -->
                    <button hidden type="button" class="btn btn-primary" id="<?= $guest == 0 ? "modal_button" : ""?>" data-toggle="modal" data-target="#myModal">
                    Open modal
                  </button>
                    <div style="padding: 0px;" class="modal fade" id="myModal">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 style="margin: 0px 15px;" class="modal-title">Property Detail</h4>
                          <button type="button" class="btn btn-dark close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <!-- =====Start Breakdown Price===== -->
                                <?php 
                                    // ========check available first=======
                                    $mysql = "SELECT * from 
                                    allotment 
                                    where date between '$f_from_date' AND '$f_to_date' AND date < '$f_to_date' AND accommodation_id = $model->id and number_of_guest > 0";
                                    $date_arr = Yii::$app->db->createCommand("$mysql")->queryAll();
                                    // exit(); 
                                    $date1 = new \DateTime($f_from_date, new \DateTimeZone('UTC'));
                                    $date2 = new \DateTime($f_to_date, new \DateTimeZone('UTC'));
                                    $numberOfNights= $date2->diff($date1)->format("%a");
                                    $numberOfNightsBySelect = sizeof($date_arr);
                                    $val_res = 0;
                                    if($numberOfNights > $numberOfNightsBySelect){
                                        $val_res = 0;
                                    }else{
                                        foreach ($date_arr as $row) {
                                            $available = $row['number_of_guest'];
                                            if ($available <= 0 ) {
                                                $val_res = 0;
                                            }else{
                                                $val_res = 1;
                                            }
                                        }
                                    }
                                    // exit();
                                  
                                    $rate_price_arr = Yii::$app->db->createCommand("
                                        SELECT rp.description as description, rp.name as name, rp.id as id, rp.guest as guest_number, SUM(r.price) as price, r.promotion as promotion, r.promotion_type as promotion_type
                                        from rate as r
                                        left join rate_plan as rp on rp.id = r.rate_plan_id
                                        where r.accommodation_id = $model->id
                                                AND r.date >= '$f_from_date'
                                                AND r.date < '$f_to_date'
                                                AND r.price > 0
                                                GROUP BY rate_plan_id
                                                ")
                                    ->queryAll();
                                    if ($rate_price_arr) {
                                        ?>
                                        <br>  
                                    <div class="container">
                                        <div class="breaking_price">
                                            <div class="date_check">
                                                <br>
                                                <div class="row" style="border: 1px solid #dddddd;
                                                border-radius: 8px;
                                                margin: 0px;
                                                padding: 10px;">
                                                    <div class="col-md-6" style="border-right: 1px solid #dddddd;">
                                                        <b>Check In</b><br>
                                                        <p><?= $f_from_date; ?></p>
                                                        <b>From Time Check In: </b><?= $model->check_in_time." To ".$model->check_out_time; ?>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <b>Check Out</b><br>
                                                        <p><?= $f_to_date; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <?php 
                                                $date1 = new \DateTime($f_from_date, new \DateTimeZone('UTC'));
                                                $date2 = new \DateTime($f_to_date, new \DateTimeZone('UTC'));
                                                $numberOfNights= $date2->diff($date1)->format("%a");
                                             ?>
                                            <h4>Breakdown Price</h4>
                                            <div class="row">
                                                <table id="w0" class="table table-bordered" width="100%" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Rate Plan</td>
                                                            <td>Max Guest</td>
                                                            <td style="width: 0px;">Price For <?= $numberOfNights; ?> Night</td>
                                                            <td>Description</td>
                                                            <td></td>
                                                        </tr>
                                                        <?php 
                                                            $i = 1;
                                                            foreach ($rate_price_arr as $rate) {
                                                                $rate_id = $rate['id'];
                                                                 // ================
                                                            $get_rate_list = Yii::$app->db->createCommand("
                                                            SELECT r.accommodation_id as accomodation_id, r.date,rp.name as name, rp.id as id, rp.guest as guest_number, r.price as price, r.promotion as promotion, r.promotion_type as promotion_type
                                                                from rate as r
                                                                left join rate_plan as rp on rp.id = r.rate_plan_id
                                                                where r.accommodation_id = $model->id
                                                                        AND r.date >= '$f_from_date'
                                                                        AND r.date < '$f_to_date'
                                                                        AND r.price > 0 
                                                                        AND rp.id = $rate_id
                                                                        Order By r.date
                                                            ")->queryAll(); 


                                                        // =============get sum==========
                                                        $total_amount = 0;
                                                        foreach($get_rate_list  as $n){ 
                                                            $num_night = sizeof($get_rate_list);
                                                            $date = $n['date'];
                                                            $property_id = $n['accomodation_id'];
                                                            $promotions = Yii::$app->db->createCommand("
                                                            SELECT COALESCE( MAX(promotion),0) as promotion 
                                                            from promotion WHERE accommodation_id = $model->id and from_date <= '$date' and to_date >= '$date' and status = 1 and min_stay <= $num_night
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
                                                        };
                                                            $total_amount = number_format((float)$total_amount, 2, '.', ''); 
                                                                ?>
                                                                <tr class="data_arr">
                                                                    <td><?= $rate['name'] ?></td>
                                                                    <td><?= $rate['guest_number'] ?></td>
                                                                    <td><?= $total_amount;?> $
                                                                    <input type="hidden" id="total_<?=$n['id']?>" name="rate_plan_id" value="<?=$total_amount;?>">
                                                                    </td>
                                                                    <td><?= $rate['description'] ?></td>
                                                                    <td style="text-align: center;"><input type="radio" class="rate_plan_id" name="rate_plan_id" <?= $i == 1 ? "checked" : ""?> value="<?= $rate['id'] ?>"></td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                         ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="price" style="text-align: right;">
                                            <?php $form = ActiveForm::begin([
                                                'id' => $model_reservation->formName(),
                                                'enableAjaxValidation' => false,
                                                'action' => ['reservation/booking'],
                                                'enableClientValidation' => true,
                                                'options' => ['enctype' => 'multipart/form-data'],
                                                'validationUrl' => $validationUrl
                                            ]); ?>

                                            <input hidden type="text" name="check_in" value="<?= $f_from_date?>">
                                            <input hidden type="text" name="check_out" value="<?= $f_to_date?>">
                                            <input hidden type="text" id="rate_plan_id" name="rate_plan_id" value="">
                                            <input hidden type="text" id="total_amount" name="total_amount" value="">
                                            <?= Html::submitButton('Book Now', ['class' => 'btn btn-success book']) ?>
                                            <?php ActiveForm::end(); ?>
                                        </div>
                                    </div>
                                        <?php
                                    }else{
                                        ?>
                                            <div class="container">
                                                <div class="check_date">
                                                    <h4><i class="fa fa-calendar-times-o"></i> Sorry your searching date is not available, Please try another date!</h4>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                     ?>

                                    <!-- end breaking price -->
                            <!-- =====End Breakdown Price===== -->
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button style="padding: 10px 20px; margin: 15px;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    <!-- start promotion listing -->
                     <?php
                        if ($rate_plan_arr) {
                            foreach ($rate_plan_arr as $rate_plan) {
                            $promotion_listing = Promotion::find()->where(['accommodation_id' => $id, 'status' => 1, 'rate_plan_id' => $rate_plan->id])->andWhere(['>=','to_date',date("Y-m-d")])->all();
                            if ($promotion_listing) {
                            ?>
                            <div class="promotion_listing">
                                <div class="title_single">
                                    <div class="line"></div>
                                    <div class="b_title">
                                        <h4>Promotion Info</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-hover table-vcenter">
                                    <thead style="background-color: #e9ecef; color: black;">
                                        <tr>
                                            <th>Rate Plan: <?= $rate_plan->name; ?></th>
                                            <th>Promotion Name</th>
                                            <th>Minimum Stay</th>
                                            <th>Discount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($promotion_listing as $key => $value) {
                                                ?>
                                                <tr>
                                                    <td><?= $value->from_date." - ".$value->to_date ;?></td>
                                                    <td><?= $value->name?></td>
                                                    <td><?= $value->min_stay?> Nights</td>
                                                    <td><?= $value->promotion_type == 0 ? $value->promotion." %" : $value->promotion. "$";?></td>
                                                </tr>
                                                <?php
                                                }
                                             ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <br>
                            <?php
                            }
                            }
                        }
                        ?>
                    <!-- end promotion listing -->
                    <!-- accommodation gallery -->
                    <?php 
                        foreach ($gallery_title as $key => $value) {
                    ?>
                        <div class="row">
                            <div class="col-md-3">
                                <?= $value->name ?>
                            </div>
                            <div class="col-md-9">
                                <div class="image_group">
                                    <div class="row no-gutters">
                                        <?php 
                                            $acc_title_image = AccommodationGalleryImage::find()->where(['accommodation_title_id' => $value->id])->limit(4)->all();
                                            foreach ($acc_title_image as $row) {
                                        ?>
                                            <div class="col-6">
                                                <div class="small_image">
                                                    <a href="<?= $row->file_path.$row->file_name ;?>" data-fancybox="images"  data-caption="">
                                                        <img src="<?= $row->file_path.$row->file_name ;?>" />
                                                    </a>
                                                </div>
                                            </div>          
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    <?php
                        }
                    ?>
                    <div class="sleeping_arrangements">
                        <div class="title_single">
                            <div class="line"></div>
                            <div class="b_title">
                                <h1><?= CustomField::findOne(11)->name; ?></h1>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <?php 
                                foreach ($room as $key => $value) {
                            ?>
                                <div class="col-6 col-md-6 col-lg-4 col-xl-3">
                                    <div class="item"  style="text-align: center;">
                                        <div class="icon">
                                            <i class="fa fa-bed" style="font-size: 30px; color: #828282;"></i>
                                        </div>
                                        <h3><?= $value->name; ?></h3>
                                        <p><?= $value->description; ?></p>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <?php 
                        if ($facility_arr) {
                            ?>
                                <div class="service">
                                    <div class="title_single">
                                        <div class="line"></div>
                                        <div class="b_title">
                                            <h4>Facilities</h4>
                                        </div>
                                    </div>
                                    <ul>
                                        <?php 
                                            foreach ($facility_arr as $key => $value) {
                                               echo "<li>".$value->facilityName->name."</li>";
                                            }
                                         ?>
                                    </ul>
                                </div>
                            <?php
                        }
                     ?>
                    <?php 
                        if ($transportation_arr) {
                            ?>
                            <div class="service">
                                <div class="title_single">
                                    <div class="line"></div>
                                    <div class="b_title">
                                        <h4>Transport</h4>
                                    </div>
                                </div>
                                <ul>
                                    <?php 
                                        foreach ($transportation_arr as $key => $value) {
                                           echo "<li>".$value->transportationName->name."</li>";
                                        }
                                     ?>
                                </ul>
                            </div>
                            <?php
                        }
                     ?>
                    <?php 
                        if ($service_arr) {
                            ?>
                            <div class="service">
                                <div class="title_single">
                                    <div class="line"></div>
                                    <div class="b_title">
                                        <h4>Services</h4>
                                    </div>
                                </div>
                                <ul>
                                    <?php 
                                        foreach ($service_arr as $key => $value) {
                                           echo "<li>".$value->serviceName->name."</li>";
                                        }
                                     ?>
                                </ul>
                            </div>
                            <?php
                        }
                     ?>
                    <?php 
                        if ($meal_arr) {
                            ?>
                            <div class="service">
                                <div class="title_single">
                                    <div class="line"></div>
                                    <div class="b_title">
                                        <h4>Meals</h4>
                                    </div>
                                </div>
                                <ul>
                                    <?php 
                                        foreach ($meal_arr as $key => $value) {
                                           echo "<li>".$value->mealName->name."</li>";
                                        }
                                     ?>
                                </ul>
                            </div>
                            <?php
                        }
                     ?>
                     <?php 
                        if ($model->accommodation_size) {
                            ?>
                                <div class="service">
                                    <div class="title_single">
                                        <div class="line"></div>
                                        <div class="b_title">
                                            <h4>More information</h4>
                                        </div>
                                    </div>
                                    <ul>
                                        <?= $model->accommodation_size ? "<li>".$model->accommodation_size."m²</li>" : "" ;?>
                                    </ul>
                                </div>
                            <?php
                        }
                      ?>
                      <?php 
                        if ($model->term_condition) {
                            ?>
                            <div class="service">
                                <div class="title_single">
                                    <div class="line"></div>
                                    <div class="b_title">
                                        <h4>Terms and Conditions</h4>
                                    </div>
                                </div>
                                <?= $model->term_condition; ?>
                            </div>
                            <?php
                        }
                       ?>
                       <?php 
                        if ($model->privacy_policy) {
                            ?>
                            <div class="service">
                                <div class="title_single">
                                    <div class="line"></div>
                                    <div class="b_title">
                                        <h4>Policy and Privacy</h4>
                                    </div>
                                </div>
                                <?= $model->privacy_policy; ?>
                            </div>
                            <?php
                        }
                       ?>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="sidebar">
                        <div class="btn_book_mobile">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="price">
                                <?php $form = ActiveForm::begin([
                                    'id' => $model_reservation->formName(),
                                    'enableAjaxValidation' => false,
                                    // 'action' => ['reservation/booking'],
                                    'action' => ['reservation/check-rate'],
                                    'enableClientValidation' => true,
                                    'options' => ['enctype' => 'multipart/form-data'],
                                    'validationUrl' => $validationUrl
                                ]); ?>
                                <div class="info">
                                    <div class="row no-gutters">
                                        <div class="col-md-12">
                                            <?= $form->field($model_reservation, 'check_in', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important; color: black; border: 1px solid #e4dfdf;']) ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?= $form->field($model_reservation, 'check_out', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important; color: black; border: 1px solid #e4dfdf;']) ?>
                                        </div>
                                        <input hidden type="text" name="accommodation_id" value="<?=$model->id;?>">
                                        <div class="col-md-12">
                                            <?= Html::submitButton('Check Availability', ['class' => 'btn btn-danger', 'id' => 'check_av']) ?>
                                            <div class="price_payment" style="color: red;"></div>
                                        <hr/>
                                        <?= CompanyProfile::findOne(1)->payment_term; ?>
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="relate">
    <div class="container">
        <div class="title">
            <h1><?= CustomField::findOne(10)->name; ?></h1>
        </div>
        <div class="row no-gutters">
            <div class="owl-carousel slider_villa owl-theme">

                <?php
                    foreach ($accommodation_list_arr as $key => $value) {
                       ?>
                          <a href="<?= Url::toRoute(['site/single-acc-type', 'id' => $value->id, 'f_from_date' => $f_from_date, 'f_to_date' => $f_to_date, 'guest' => 1]) ?>">
                            <div class="item">
                                <div class="image">
                                    <img src="<?= $value->feature_image; ?>" alt="">
                                </div>
                                <div class="name">
                                    <h2><?= $value->name; ?></h2>
                                    <p><i class="fa fa-map-marker"></i><?= $value->address; ?></p>
                                    <p><?= $value->number_of_rooms; ?> Rooms, Size: <?= $value->accommodation_size; ?></p>
                                    <p><span><?= $value->price; ?></span>$ / night</p>
                                </div>
                            </div>
                        </a>  
                       <?php
                    }
                 ?>
            </div>
        </div>
    </div>
</div>

<?php
$acc_curr_id = $model->id;
$base_url = Yii::getAlias('@web');
$script = <<< JS
        var f_from_date = "$f_from_date";
        var acc_curr_id = "$acc_curr_id";
        var f_to_date = "$f_to_date";
        var guest = "$guest";
        var acc_id = "$id";
        var base_url = "$base_url";
        $(document).ready(function(){
            setTimeout(function() {
                $("#modal_button").trigger('click');
            },10);
            var curr_rate_id = $('input[name="rate_plan_id"]:checked').val();
            $("#rate_plan_id").val(curr_rate_id);

            var total = $("#total_"+curr_rate_id).val();
            $("#total_amount").val(total);


        });
        $(".rate_plan_id").click(function(){
            var val_id = $(this).val();
            $("#rate_plan_id").val(val_id);
            var total = $("#total_"+val_id).val();
            $("#total_amount").val(total);
            
            
        });

        $(document).ready(function(){
            $("#reservation-check_in").datepicker("setDate", f_from_date);
            $("#reservation-check_in").datepicker("setStartDate", new Date());


            var get_start_date = $('#reservation-check_in').datepicker('getDate', '+1d');
            get_start_date.setDate(get_start_date.getDate()+1);
            $('#reservation-check_out').datepicker('setDate', f_to_date);
            // $("#reservation-number_of_guest").val(guest);
        });

        $("#reservation-check_in").change(function(){
            if($(this).val() >= $("#reservation-check_out").val()){
            $("#reservation-check_out").datepicker("setDate", $(this).val());
            var get_start_date = $('#reservation-check_in').datepicker('getDate', '+1d');
            get_start_date.setDate(get_start_date.getDate()+1);
            $("#reservation-check_out").datepicker("setStartDate", get_start_date);
            $('#reservation-check_out').datepicker('setDate', get_start_date);
            }else{
                var get_start_date = $('#reservation-check_in').datepicker('getDate', '+1d');
                get_start_date.setDate(get_start_date.getDate()+1);
                $("#reservation-check_out").datepicker("setStartDate", get_start_date);

            }
            

        });
    $('#reservation-check_in, #reservation-check_out').datepicker({
        format: 'yyyy-mm-dd',
        changeMonth: true,
        changeYear: true,
        autoclose: true,
        
    });

        var map;
        var geocoder;
        var marker;
        var people = new Array();
        var latlng;
        var infowindow;

        $(document).ready(function() {
            ViewCustInGoogleMap();
        });

        function ViewCustInGoogleMap() {

            var stylers = [{
              "stylers": [{ 
                 "hue": "#ff0022"
               }, {
                 "saturation": -16
               }, {
                 "lightness": -5
               }]
            }];

            var mapOptions = {
                center: new google.maps.LatLng(13.3579036,103.8641146,17),   // Coimbatore = (11.0168445, 76.9558321)
                zoom: 14,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: stylers
            };

            map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

            // Get data from database. It should be like below format or you can alter it.
            $.ajax({
                url: base_url+'/accommodation-profile/dependent',
                type: 'post',
                data: {
                    action: 'get_acc_profile'
                },
                success: function(response){     
                    people = JSON.parse(response); 
                    // console.log(people);

            for (var i = 0; i < people.length; i++) {
                setMarker(people[i]);
            }
                }
            });
        }

        function setMarker(people) {
            geocoder = new google.maps.Geocoder();
            infowindow = new google.maps.InfoWindow();
            if ((people["LatitudeLongitude"] == null) || (people["LatitudeLongitude"] == 'null') || (people["LatitudeLongitude"] == '')) {
                geocoder.geocode({ 'address': people["address"] }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                        marker = new google.maps.Marker({
                            position: latlng,
                            map: map,
                            draggable: false,
                            html: people["name"],
                            // icon: "https://image.flaticon.com/icons/png/512/235/235861.png"
                        });
                        //marker.setPosition(latlng);
                        //map.setCenter(latlng);
                        google.maps.event.addListener(marker, 'click', function(event) {
                            infowindow.setContent(this.html);
                            infowindow.setPosition(event.latLng);
                            infowindow.open(map, this);
                        });
                    }
                    else {
                        alert(people["name"] + " -- " + people["address"] + ". This address couldn't be found");
                    }
                });
            }
            else {
                if(people["id"] == acc_curr_id){
                    var latlngStr = people["LatitudeLongitude"].split(",");
                    var lat = parseFloat(latlngStr[0]);
                    var lng = parseFloat(latlngStr[1]);
                    latlng = new google.maps.LatLng(lat, lng);
                    marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        draggable: false,               // cant drag 
                            // Content display on marker click

                        html: "<img style= 'width: 100px; margin: 10px; height: 65px; object-fit: cover;' src='"+people["feature_image"]+"' alt=''>" +
                        "<a style= 'color: black; text-decoration: none;' href= 'single-acc-type?id="+people["id"]+"&f_from_date="+f_from_date+"&f_to_date="+f_to_date+"&guest="+guest+"'>"+people["name"] + 
                        "<br>" + "</a>",
                        icon: ""+base_url+"/img/pin_map.png"


                    });
                    //marker.setPosition(latlng);
                    //map.setCenter(latlng);
                    google.maps.event.addListener(marker, 'click', function(event) {
                        infowindow.setContent(this.html);
                        infowindow.setPosition(event.latLng);
                        infowindow.open(map, this);
                    });   
                }else{
                    var latlngStr = people["LatitudeLongitude"].split(",");
                    var lat = parseFloat(latlngStr[0]);
                    var lng = parseFloat(latlngStr[1]);
                    latlng = new google.maps.LatLng(lat, lng);
                    marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        draggable: false,               // cant drag 
                            // Content display on marker click


                        html: "<img style= 'width: 100px; margin: 10px; height: 65px; object-fit: cover;' src='"+people["feature_image"]+"' alt=''>" +
                        "<a style= 'color: black; text-decoration: none; display: inline-flex;' href= 'single-acc-type?id="+people["id"]+"&f_from_date="+f_from_date+"&f_to_date="+f_to_date+"&guest="+guest+"'>"+people["name"] + 
                        "<br>$"+people['price']+"</a>",

                    });
                    //marker.setPosition(latlng);
                    //map.setCenter(latlng);
                    google.maps.event.addListener(marker, 'click', function(event) {
                        infowindow.setContent(this.html);
                        infowindow.setPosition(event.latLng);
                        infowindow.open(map, this);
                    });  
                }
            }
        }
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#allotment_scroll").offset().top
        }, 2000);

JS;
$this->registerJS($script);
?>
   <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIWgIKTIfzr7s5zoeBYZjIBKodEFiRJDM&libraries=places" type="text/javascript"></script>

    <div id="map-canvas" style="width: 100%; height: 500px;">
    </div>
