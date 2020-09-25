<?php
use yii\widgets\ListView;
use common\models\GlobalFunction;
use yii\helpers\Url;
use yii\bootstrap\Modal; 
use yii\bootstrap\ActiveForm;
use backend\models\CustomField;
use frontend\models\AccommodationProfile;

$base_url = Yii::getAlias('@web');
/* @var $this yii\web\View */
 $this->title="Angkor Stays"; 

    $f_from_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 days'));;
    $f_to_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 14 days'));
    $guest = 4;
?>

<div class="site-index">
    <div class="slider_home">
        <img src="<?= CustomField::findOne(1)->feature_image; ?>" alt="">
        <div class="fiiter">
            <div class="container">
                <div class="title_banner">
                    <span><?= CustomField::findOne(1)->short_description; ?></span>
                    <h3><?= CustomField::findOne(1)->name; ?></h3>
                    <p><?= CustomField::findOne(1)->description; ?></p>
                </div>
                <?php echo $this->render('../accommodation-profile/_search', ['model' => $searchModel]); ?>
            </div>
        </div>
    </div>
    <div class="list_type">
        <div class="container">
            <div class="title">
                <h1><?= CustomField::findOne(8)->name ?></h1>
            </div>
            <div class="row no-gutters">
                <?php 
                    foreach ($accommodation_type as $key => $value) {
                        ?>
                            <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                <a href="<?= Url::toRoute(['accommodation-profile/index', 'AccommodationProfileSearch[from_date]'=>$f_from_date, 'AccommodationProfileSearch[to_date]'=>$f_to_date, 'AccommodationProfileSearch[accommodation_type]'=>$value->id]) ?>">
                                    <div class="item">
                                        <div class="image">
                                            <img src="<?= $value->feature_image ;?>" alt="">
                                        </div>
                                        <div class="name">
                                            <h2><?= $value->name; ?></h2>
                                            <p><?= substr($value->description, 3, 80); ?>...</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                    }
                 ?>
                
            </div>
            <div class="more">
                <a href="<?= Url::toRoute(['accommodation-profile/index']) ?>">Show All<i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <div class="villa_list">
        <div class="container">
            <div class="title">
                <h1>Promotion</h1>
            </div>
            <div class="owl-carousel slider_villa owl-theme">
                <?php
                    foreach ($acc_promotion as $key => $value) {
                       ?>
                          <a href="<?= Url::toRoute(['site/single-acc-type', 'id' => $value['id'], 'f_from_date' => $f_from_date, 'f_to_date' => $f_to_date, 'guest' => $guest]) ?>">
                            <div class="item">
                                <div class="image">
                                    <img src="<?= $value['feature_image']; ?>" alt="">
                                </div>
                                <div class="name">
                                    <h2><?= $value['name']; ?></h2>
                                    <p><i class="fa fa-map-marker"></i>Siem Reap</p>
                                    <p><?= $value['number_of_rooms']; ?> Rooms, Size: <?= $value['accommodation_size']; ?></p>
                                    <p><span><?= $value['price']; ?></span>$ / night</p>
                                    <div class="discount">
                                        <p>Discount: <?= $value['promotion'];?> <?= $value['promotion_type'] == 0 ? "%" : "$";?></p>
                                    </div>
                                </div>
                            </div>
                        </a>  
                       <?php
                    }
                 ?>
            </div>
            
            <div class="more">
                <a href="<?= Url::toRoute(['accommodation-profile/index']) ?>">Show All<i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <div class="contact_us" style="background:url('<?= CustomField::findOne(2)->feature_image; ?>')">
        <div class="contaienr">     
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-8 col-lg-7 col-xl-6">
                    <div class="content text-center">
                        <h1><?= CustomField::findOne(2)->name; ?></h1>
                        <p><?= CustomField::findOne(2)->description; ?></h2>
                        <p><a class="btn_contact" href="<?= Url::toRoute(['site/contact-us']) ?>"><?= CustomField::findOne(2)->short_description; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="villa_list">
        <div class="container">
            <div class="title">
                <h1><?= CustomField::findOne(9)->name ?></h1>
            </div>
            <div class="owl-carousel slider_villa owl-theme">
                <?php
                    foreach ($accommodation_list_arr as $key => $value) {
                       ?>
                          <a href="<?= Url::toRoute(['site/single-acc-type', 'id' => $value->id, 'f_from_date' => $f_from_date, 'f_to_date' => $f_to_date, 'guest' => $guest]) ?>">
                            <div class="item">
                                <div class="image">
                                    <img src="<?= $value->feature_image; ?>" alt="">
                                </div>
                                <div class="name">
                                    <h2><?= $value->name; ?></h2>
                                    <p><i class="fa fa-map-marker"></i>Siem Reap</p>
                                    <p><?= $value->number_of_rooms; ?> Rooms, Size: <?= $value->accommodation_size; ?></p>
                                    <p><span><?= $value->price; ?></span>$ / night</p>
                                </div>
                            </div>
                        </a>  
                       <?php
                    }
                 ?>
            </div>
            
            <div class="more">
                <a href="<?= Url::toRoute(['accommodation-profile/index']) ?>">Show All<i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <div class="blog_post">
        <div class="container">
            <div class="title text-center">
                <h1><?= CustomField::findOne(4)->name; ?></h1>
                <p><?= CustomField::findOne(4)->short_description; ?></p>
            </div>
            <div class="row">
                <?php 
                    foreach ($blog_post as $key => $value) {
                        ?>
                            <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                <a href="<?= Url::toRoute(['site/single-post', 'id' => $value->id]) ?>">
                                    <div class="item">
                                        <div class="image">
                                            <img src="<?= $value->feature_image; ?>" alt="">
                                        </div>
                                        <div class="name">
                                            <span><?= $value->created_date ?></span>
                                            <h2><?= $value->name; ?></h2>
                                            <p><?= substr($value->description, 3, 100); ?>...</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php
                    }
                 ?>
            </div>
        </div>
    </div>
</div>

<?php 
$base_url = Yii::getAlias('@web');
$section_param =   Yii::$app->getRequest()->getQueryParam('section_id');
$script = <<<JS
        var base_url = "$base_url";
        var section_param = "$section_param";
        var map;
        var acc_curr_id = 1;
        var guest = 4;
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
        $("#location_map").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#map-canvas").offset().top
            }, 2000);
        });
        if(section_param = "stay"){
            $(document).ready(function(){
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(".villa_list").offset().top
                }, 2000);
            });
        }
        if(section_param = "map"){
            $(document).ready(function(){
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#map-canvas").offset().top
                }, 2000);
            });
        }
JS;
$this->registerJs($script);
 ?>
 <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIWgIKTIfzr7s5zoeBYZjIBKodEFiRJDM&libraries=places" type="text/javascript"></script>

    <div id="scroll"></div>
    <div id="map-canvas" style="width: 100%; height: 500px;">
    </div>