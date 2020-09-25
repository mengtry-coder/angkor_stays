<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\AccommodationGalleryImage;
use backend\models\Facility;
use backend\models\AccommodationFacility;
use backend\models\Transportation;
use backend\models\AccommodationTransportation;
use backend\models\AccommodationService;
use backend\models\Service;
use backend\models\AccommodationMeal;
use backend\models\Meal;
use backend\models\Sport;
use backend\models\AccommodationSport;

/* @var $this yii\web\View */
/* @var $model backend\models\AccommodationProfile */
/* @var $form yii\widgets\ActiveForm */
$base_url = Yii::getAlias('@web');
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
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
$validationUrl = ['accommodation-profile/validation'];
if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}

$facility = Facility::find()->where(['status' => 1])->all();
$service = Service::find()->where(['status' => 1])->all();
$transportation = Transportation::find()->where(['status' => 1])->all();
$sport = Sport::find()->where(['status' => 1])->all();
$meal = Meal::find()->where(['status' => 1])->all();
?>
<style>
    input#accommodationprofile-check_in_time {
        border: 1px solid #eaeaea;
    }
    input#accommodationprofile-check_out_time {
        border: 1px solid #eaeaea;
    }
    .amenity_title {
        margin: 20px;
    }
    
</style>

<div class="accommodation-profile-form">

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
                            <label for = 'accommodationprofile-file'>
                                <img id ='feature_images' src="<?php $base_url?>images/default-image.png" class='img-responsive'>
                            </label>
                        <?php } else {?>
                            <label for="accommodationprofile-file">
                                <img id="feature_images" src="<?= $model->feature_image;?>" class="img-responsive" onError="this.onerror=null;this.src='<?= $base_url.'/backend/uploads/empty-avatar.png' ?>';">
                            </label>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-md-4">
                                <?=$form->field($model, 'number_of_rooms')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-md-4">
                                <?=$form->field($model, 'max_guest')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-md-4">
                                <?php
                                    $star_rating_name = ArrayHelper::map(\backend\models\StarRating::find()
                                    ->where(['status'=>1])
                                    ->all(), 'id', 'name');
                                ?>
                                <?= $form->field($model, 'star_rating')->widget(Select2::classname(), [
                                        'data' => $star_rating_name,
                                        'theme' => Select2::THEME_DEFAULT,
                                        'language' => 'eg',
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]);
                                ?> 
                            </div>
                            <div class= "col-md-4">
                                <?php
                                    $model->status = $model->isNewRecord ? 1 : $model->status;
                                    echo $form->field($model, 'status')->radioList(['1' => 'Active', '0' => 'Inactive'], ['unselect' => false, 'default' => 1]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 10px;" class= "col-md-12">
                <br><br>
                <ul class="nav nav-tabs">
                    <li class= "active"><a data-toggle="tab" href="#facility">Facility</a></li>
                    <li><a data-toggle="tab" href="#amenity"> Amenity</a></li>
                    <li><a data-toggle="tab" href="#description"> Description</a></li>
                    <li><a data-toggle="tab" href="#contact">Contact</a></li>
                    <li><a data-toggle="tab" href="#location_map">Location & Map</a></li>
                    <li><a data-toggle="tab" href="#detail">Detail</a></li>
                    <li><a data-toggle="tab" href="#term">Term & Condition</a></li>
                </ul>   
                <!-- content -->
                <div class="tab-content">
                    <!-- ==========tap 1======== -->
                    <div id="description" class="tab-pane fade in"><br>
                        <?= $form->field($model, 'description')->textArea(['class'=>"editor_area"]) ?>
                    </div>
                    <!-- ==========End tap 1======== -->
                    <div id="facility" class="tab-pane fade in active"><br>
                        <div class="row">
                        <?php 
                            foreach ($facility as $key => $value) {
                                $facility_name = strtolower(str_replace(" ","_",$value->name));
                                ?>
                                    <div class="col-md-3">
                                        <?php
                                            if ($model->isNewRecord) {
                                               echo Html::checkbox($facility_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                            }else{
                                                $added_fac = AccommodationFacility::find()->where(['facility_id' => $value->id, 'accommodation_id' => $model->id])->one();
                                                if ($added_fac) {
                                                    echo Html::checkbox($facility_name, false, ['label' => $value->name, 'checked' => 'checked']);
                                                }else{
                                                    echo Html::checkbox($facility_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                }
                                                
                                            }

                                        ?>
                                    </div>
                                <?php
                            }
                         ?>
                        </div>
                    </div>
                    <div id="amenity" class="tab-pane fade in"><br>
                        <div class="row">

                            <!-- Service Section -->
                            <h4 class= "amenity_title">Service</h4>
                            <div class="col-md-12">
                                <?php 
                                    foreach ($service as $key => $value) {
                                        $service_name = strtolower(str_replace(" ","_",$value->name));
                                        ?>
                                            <div class="col-md-3">
                                                <?php
                                                    if ($model->isNewRecord) {
                                                       echo Html::checkbox($service_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                    }else{
                                                        $added_fac = AccommodationService::find()->where(['service_id' => $value->id, 'accommodation_id' => $model->id])->one();
                                                        if ($added_fac) {
                                                            echo Html::checkbox($service_name, false, ['label' => $value->name, 'checked' => 'checked']);
                                                        }else{
                                                            echo Html::checkbox($service_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                        }
                                                        
                                                    }

                                                ?>
                                            </div>
                                        <?php
                                    }
                                 ?>
                            </div>

                            <!-- Transportation Section -->
                            <h4 class= "amenity_title">Transportation</h4>
                            <div class="col-md-12">
                                <?php 
                                    foreach ($transportation as $key => $value) {
                                        $transportation_name = strtolower(str_replace(" ","_",$value->name));
                                        ?>
                                            <div class="col-md-3">
                                                <?php
                                                    if ($model->isNewRecord) {
                                                       echo Html::checkbox($transportation_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                    }else{
                                                        $added_fac = AccommodationTransportation::find()->where(['transportation_id' => $value->id, 'accommodation_id' => $model->id])->one();
                                                        if ($added_fac) {
                                                            echo Html::checkbox($transportation_name, false, ['label' => $value->name, 'checked' => 'checked']);
                                                        }else{
                                                            echo Html::checkbox($transportation_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                        }
                                                        
                                                    }

                                                ?>
                                            </div>
                                        <?php
                                    }
                                 ?>
                            </div>

                            <!-- Sport Section -->
                            <h4 class= "amenity_title">Sport</h4>
                            <div class="col-md-12">
                                <?php 
                                    foreach ($sport as $key => $value) {
                                        $sport_name = strtolower(str_replace(" ","_",$value->name));
                                        ?>
                                            <div class="col-md-3">
                                                <?php
                                                    if ($model->isNewRecord) {
                                                       echo Html::checkbox($sport_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                    }else{
                                                        $added_fac = AccommodationSport::find()->where(['sport_id' => $value->id, 'accommodation_id' => $model->id])->one();
                                                        if ($added_fac) {
                                                            echo Html::checkbox($sport_name, false, ['label' => $value->name, 'checked' => 'checked']);
                                                        }else{
                                                            echo Html::checkbox($sport_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                        }
                                                        
                                                    }

                                                ?>
                                            </div>
                                        <?php
                                    }
                                 ?>
                            </div>

                            <!-- Meal Section -->
                            <h4 class= "amenity_title">Meal</h4>
                            <div class="col-md-12">
                                <?php 
                                    foreach ($meal as $key => $value) {
                                        $meal_name = strtolower(str_replace(" ","_",$value->name));
                                        ?>
                                            <div class="col-md-3">
                                                <?php
                                                    if ($model->isNewRecord) {
                                                       echo Html::checkbox($meal_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                    }else{
                                                        $added_fac = AccommodationMeal::find()->where(['meal_id' => $value->id, 'accommodation_id' => $model->id])->one();
                                                        if ($added_fac) {
                                                            echo Html::checkbox($meal_name, false, ['label' => $value->name, 'checked' => 'checked']);
                                                        }else{
                                                            echo Html::checkbox($meal_name, false, ['label' => $value->name, 'uncheck' => 0]);
                                                        }
                                                        
                                                    }

                                                ?>
                                            </div>
                                        <?php
                                    }
                                 ?>
                            </div>
                        </div>
                    </div>

                    <!-- ==========start map======== -->
                    <div id="location_map" class="tab-pane fade in "><br>
                        <?php echo $form->field($model, 'address')->textInput(['placeholder' => 'Location', 'id' => 'pac-input'])->label(false); ?>
                        <div style="height: 400px" id="map" class="tab-pane fade in "><br>
                            <div class= "row">
                                <div id="map"></div>
                                    <?php 
                                        if (!$model->isNewRecord) {
                                            $model_la_lo = $model->LatitudeLongitude;
                                        }else{
                                            $model_la_lo = "13.3570894,103.8646296";
                                        }
                                     ?>
                                    <script>
                                        var latitudelongtitude = "<?php echo $model_la_lo; ?>"
                                        var latlngStr = latitudelongtitude.split(",");
                                        var latitude = parseFloat(latlngStr[0]);
                                        var longtitude = parseFloat(latlngStr[1]);
                                      // This example adds a search box to a map, using the Google Place Autocomplete
                                      // feature. People can enter geographical searches. The search box will return a
                                      // pick list containing a mix of places and predicted search terms.

                                      // This example requires the Places library. Include the libraries=places
                                      // parameter when you first load the API. For example:
                                      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                                      function initAutocomplete() {
                                        var map = new google.maps.Map(document.getElementById('map'), {
                                          center: {lat: latitude, lng: longtitude},
                                          zoom: 18,
                                          mapTypeId: 'roadmap'
                                        });

                                        // Create the search box and link it to the UI element.
                                        var input = document.getElementById('pac-input');
                                        var searchBox = new google.maps.places.SearchBox(input);
                                        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                                        // Bias the SearchBox results towards current map's viewport.
                                        map.addListener('bounds_changed', function() {
                                          searchBox.setBounds(map.getBounds());
                                        });

                                        var markers = [];
                                        // Listen for the event fired when the user selects a prediction and retrieve
                                        // more details for that place.
                                        searchBox.addListener('places_changed', function() {
                                          var places = searchBox.getPlaces();

                                          if (places.length == 0) {
                                            return;
                                          }

                                          // Clear out the old markers.
                                          markers.forEach(function(marker) {
                                            marker.setMap(null);
                                          });
                                          markers = [];

                                          // For each place, get the icon, name and location.
                                          var bounds = new google.maps.LatLngBounds();
                                          places.forEach(function(place) {
                                            if (!place.geometry) {
                                              console.log("Returned place contains no geometry");
                                              return;
                                            }
                                            var icon = {
                                              url: place.icon,
                                              size: new google.maps.Size(71, 71),
                                              origin: new google.maps.Point(0, 0),
                                              anchor: new google.maps.Point(17, 34),
                                              scaledSize: new google.maps.Size(25, 25)
                                            };

                                            // Create a marker for each place.
                                            markers.push(new google.maps.Marker({
                                              map: map,
                                              // icon: ""+base_url+"/img/pin_map.png"
                                              title: place.name,
                                              position: place.geometry.location
                                            }));

                                            if (place.geometry.viewport) {
                                              // Only geocodes have viewport.
                                              bounds.union(place.geometry.viewport);
                                            } else {
                                              bounds.extend(place.geometry.location);
                                            }
                                          });
                                          map.fitBounds(bounds);
                                        });
                                      }

                                    </script>
                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIWgIKTIfzr7s5zoeBYZjIBKodEFiRJDM&libraries=places&callback=initAutocomplete"
                                         async defer></script>
                            </div>
                        </div>
                    </div>
                    <!-- ==========end map======== -->

                    <div id="contact" class="tab-pane fade in "><br>
                        <div class= "row">
                            <div class= "col-md-12">
                                <div class="col-md-4">
                                    <?=$form->field($model, 'phone_number')->textInput(['maxlength' => true])?>
                                </div>
                                <div class="col-md-4">
                                    <?=$form->field($model, 'email_address')->textInput(['maxlength' => true])?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->field($model, 'website_url')->textInput(['maxlength' => true]) ?>
                                </div>
                            </div>
                            <div class= "col-md-12">
                                <div class="col-md-4">
                                    <?php
                                        $country_name = ArrayHelper::map(\backend\models\Country::find()
                                        ->where(['status'=>1, 'id' => 56])
                                        ->all(), 'id', 'name');
                                    ?>
                                    <?= $form->field($model, 'country_id')->widget(Select2::classname(), [
                                            'data' => $country_name,
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
                                        $city_name = ArrayHelper::map(\backend\models\City::find()
                                        ->where(['status'=>1, 'id' => 3])
                                        ->all(), 'id', function($model){return $model->name;});
                                    ?>
                                    <?= $form->field($model, 'city_id')->widget(Select2::classname(), [
                                            'data' => $city_name,
                                            'theme' => Select2::THEME_DEFAULT,
                                            'language' => 'eg',
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]);
                                    ?>
                                </div>
                                <div class= "col-md-4">
                                    <?=$form->field($model, 'reservation_email')->textInput(['maxlength' => true])?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- ==========End tap 2======== -->
                    <!-- ==========tap 3======== -->
                    <div id="term" class="tab-pane fade in"><br>
                        <div class= "row">
                            <div class= "col-md-12">
                                <?= $form->field($model, 'term_condition')->textArea(['class'=>"editor_area"]) ?>
                            </div>
                            <div class= "col-md-12">
                                <?= $form->field($model, 'privacy_policy')->textArea(['class'=>"editor_area"]) ?>
                            </div>
                        </div>
                    </div>
                    <!-- ==========End tap 3======== -->
                     <!-- ==========tap 3======== -->
                    <div id="detail" class="tab-pane fade in"><br>
                        <div class= "row">
                            <div class="col-md-3">
                                <?=$form->field($model, 'accommodation_size')->textInput(['maxlength' => true])?>
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($model, 'check_in_time', [
                                    'template'=>$time_template, 
                                    'inputOptions' => [
                                        'value' => \Yii::$app->formatter->asTime($model->isNewRecord ? '08:00' : $model->check_in_time, 'php:H:i')]])->textInput([
                                            'class'=>'date_picker'
                                        ])
                                    
                                ?>  
                            </div>
                            <div class="col-md-3">
                                <?= $form->field($model, 'check_out_time', [
                                    'template'=>$time_template, 
                                    'inputOptions' => [
                                        'value' => \Yii::$app->formatter->asTime($model->isNewRecord ? '05:00' : $model->check_out_time, 'php:H:i')]])->textInput([
                                            'class'=>'date_picker'
                                        ])
                                    
                                ?>  
                            </div>
                            <div class="col-md-3">
                                <?=$form->field($model, 'map_link')->textInput(['maxlength' => true])?>
                            </div>

                        </div>
                    </div>
                    <!-- ==========End tap 3======== -->

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

    $(function () {
        $("#accommodationprofile-file").change(function () {
            readURL(this);
        });
        $("#accommodationprofile-file").hide();
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

    $('#accommodationprofile-check_in_time, #accommodationprofile-check_out_time').datetimepicker({
        timepicker: true,
        datepicker: false,
        format: 'H:i',
        // value: '',
        hours24: true,
    });
    $('#taskaccommodationlist-check_out_time').datetimepicker({
        // value: '',
    });

JS;
$this->registerJS($script);
?>
<style type="text/css">
    input#pac-input {
        width: 50%;
        margin: 12px 200px;
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
