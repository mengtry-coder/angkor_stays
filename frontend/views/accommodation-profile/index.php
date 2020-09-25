<?php

use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal; 
use yii\grid\GridView;
use app\models\Promotion;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AccommodationProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Accommodation Profiles';
$this->params['breadcrumbs'][] = $this->title;
if (empty($guest)) {
   $guest = 5;
}
?>
<div class="page_accommodation_type">
    <div class="container">
        <div class="title">
            <span><?= $accommodation_count; ?>+ Accommodations Available</span>
            <h1>Stays in Cambodia</h1>
        </div>
        <div class="fiiter">
            <?php echo $this->render('_search', [
                'model' => $searchModel, 
                'f_from_date' => $f_from_date, 
                'f_to_date' => $f_to_date,
            ]); ?>
        </div>
        <div class="row no-gutters">
            <?=
                ListView::widget([
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                        // 'nextPageLabel' => 'next',
                        // 'prevPageLabel' => 'previous',
                        'maxButtonCount' => 3,
                    ],
                    'itemView' => function ($model, $key, $index, $widget) use ($f_from_date, $f_to_date, $guest) {
            ?>

            <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                <a href="<?= Url::toRoute(['site/single-acc-type', 'id' => $model->id, 'f_from_date' => $f_from_date, 'f_to_date' => $f_to_date, 'guest' => $guest]) ?>">
                    <div class="item">
                        <div class="image" style="position: relative;">
                            <img src="<?= $model->feature_image ;?>" alt="">
                        </div>
                        <div class="name">
                            <h2><?= $model->name ;?></h2>
                            <p><i class="fa fa-map-marker"></i>Siem Reap</p>
                            <p><?= $model->number_of_rooms ? $model->number_of_rooms." Rooms" : ""; ?><?= $model->accommodation_size ? ",Size: ".$model->accommodation_size : ""; ?></p>
                            <p><span><?= $model->price; ?></span>$ / night</p>
                            <?php
                                if (empty($f_from_date)) {
                                    $pro_mo = Yii::$app->db->createCommand("SELECT promotion_type, max(promotion) AS max_pro FROM promotion WHERE accommodation_id = $model->id AND status = 1 AND to_date >= CURDATE()")->queryOne();
                                }else{
                                    $pro_mo = Yii::$app->db->createCommand("SELECT promotion_type, max(promotion) AS max_pro FROM promotion WHERE accommodation_id = $model->id AND status = 1 AND '$f_from_date' BETWEEN from_date AND to_date OR '$f_to_date' BETWEEN from_date AND to_date")->queryOne();
                                }
                                
                                if (!empty($pro_mo['max_pro'])) {
                                    ?>
                                    <div class="discount">
                                        <p>
                                            <?= $pro_mo['promotion_type'] == 0 ? "Promotion: ".$pro_mo['max_pro']." %" : "Promotion: ".$pro_mo['max_pro']. "$" ?>
                                        </p>
                                    </div>
                                    <?php
                                }
                             ?>
                                 
                        </div>
                    </div>
                </a>
            </div>
            <?php
                    }
                ]);
            ?>

        </div>
    </div>
</div>
<!-- map section -->
<div id="map-canvas" style="width: 100%; height: 500px;"></div>
<?php 
$base_url = Yii::getAlias('@web');
$type_id = $searchModel->accommodation_type;
$script = <<<JS
        var base_url = "$base_url";
        var f_from_date = "$f_from_date";
        var f_to_date = "$f_to_date";
        var type_id = "$type_id";
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
                    type_id: type_id,
                    f_from_date: f_from_date,
                    f_to_date: f_to_date,
                    action: 'get_acc_profile',
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
                        "<a style= 'color: black; text-decoration: none; display: inline-flex; text-align: center;' href= 'single-acc-type?id="+people["id"]+"&f_from_date="+f_from_date+"&f_to_date="+f_to_date+"&guest="+guest+"'>"+people["name"] + 
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
JS;
$this->registerJs($script);
?>
<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIWgIKTIfzr7s5zoeBYZjIBKodEFiRJDM&libraries=places" type="text/javascript"></script>
<!-- end map section -->
<style type="text/css">
    .gm-style-iw.gm-style-iw-c {
        max-width: 400px !important;
        max-height: 326px !important;
        min-width: 0px !important;
    }
.list-view .summary,
.pagination li a {
    font-size: 13px;
    font-weight: 200;
}

.list-view .pagination {
    margin: 7px auto;
}

.list-view .pagination li a {
    color: #a7a7a7;
    padding: 3px 8px;
}

.list-view .pagination>.active>a,
.pagination>.active>span,
.pagination>.active>a:hover,
.pagination>.active>span:hover,
.pagination>.active>a:focus,
.pagination>.active>span:focus {
    background-color: #7BB990 !important;
    border-color: #7BB990 !important;
    color: white !important;
    font-size: 13px;
    font-weight: 200;
}

.pagination>.disabled>a,
.pagination>.disabled>a :focus,
.pagination>.disabled>a:hover,
.pagination>.disabled>span,
.pagination>.disabled>span:focus,
.pagination>.disabled>s pan:hover {
    color: #ccc7c7;
    cursor: not-allowed;
    background-color: #fff;
    border-color: #ddd;
    font-size: 13px;
    font-weight: 200;
    padding: 3px 8px;
}

.list-view {
    display: inline-block;
    width: 100%;
}
</style>