<?php
use backend\models\CompanyProfile;
use backend\models\AccommodationType;
 
Yii::$app->log->targets['debug'] = null;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use backend\models\CustomField;

$base_url = Yii::getAlias('@web');

$f_from_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 days'));;
    $f_to_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 14 days'));
    $guest = 4;
AppAsset::register($this);
$controller_name = Yii::$app->controller->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web')?>/img/fav.png" /> -->
    <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web')?>/img/fav.png" />
    <?=Html::tag('title', Html::encode($this->title))?>
    <meta name="description" content="<?= Html::encode(CustomField::findOne(12)->short_description) ;?>">
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="www.angkorstays.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= Html::encode(CustomField::findOne(13)->short_description) ;?>">
    <meta property="og:description" content="<?= Html::encode(CustomField::findOne(14)->short_description) ;?>">
    <meta property="og:image" content="<?= CustomField::findOne(15)->feature_image ;?>">
    

    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<div class="header">
    <div class="main_header">
        <div class="container">
            <div class="row">
                <div class="col-5 col-md-6 col-lg-2 col-xl-2">
                    <div class="main_header_left">
                        <a href="<?= Url::toRoute(['site/index']) ?>">
                            <img src="<?= CompanyProfile::findOne(1)->feature_image; ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-10 col-xl-10">
                    <div class="icon_mobile close_menu" style="display:none">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="main_header_right">
                        <ul>
                            <li id= "stay_id"><a class="<?= $controller_name == "site" ? "active_menu" : "" ;?>"
                                    href="<?= Url::toRoute(['site/index', 'section_id' => 'stay']) ?>">Stays</a></li>

                            <li><a class="<?= $controller_name == "our-service" ? "active_menu" : "" ;?>"
                                    href="<?= Url::toRoute(['our-service/index']) ?>">Services</a></li>

                            <li><a class="<?= $controller_name == "experience" ? "active_menu" : "" ;?>"
                                    href="<?= Url::toRoute(['experience/index']) ?>">Experiences</a></li>

                            <li style="text-align: center; color: red; border: 1px solid #80808029;border-top: none;border-bottom: none;border-right: none;padding: 0px 27px;display: flow-root; margin-left: 20px;"><a href="<?= Url::toRoute(['site/index', 'section_id' => 'map']) ?>"><i id="location_map" class="fa fa-map-marker"></i> <br>Map</a></li>
                            <li style="text-align: center; color: red;border: 1px solid #80808029;border-top: none;border-bottom: none;padding: 0px 27px;display: flow-root;"><a href="<?= Url::toRoute(['site/contact-us']) ?>"><i class="fa fa-phone"></i> <br>Contact</a></li>
                        </ul>

                        <!-- <a href=""><i id="location_map" class="fa fa-map-marker"></i> <br>Map</a> -->
                        <!-- <a href=""><i class="fa fa-phone"></i> <br>Contact <br>Map</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="menu_mobile">
    <div class="close_menu">
        <i class="fa fa-times"></i>
    </div>
    <div class="desktop-nav">
        <ul>
            <li><a class="<?= $controller_name == "site/news" ? "active_menu" : "" ;?>"
                    href="<?= Url::toRoute(['site/index', 'section_id' => 'stay']) ?>">Stays</a></li>
            <li><a class="<?= $controller_name == "site/gallery" ? "active_menu" : "" ;?>"
                    href="<?= Url::toRoute(['our-service/index']) ?>">Services</a></li>
            <li><a class="<?= $controller_name == "site/contact-us" ? "active_menu" : "" ;?>"
                    href="<?= Url::toRoute(['experience/index']) ?>">Experiences</a></li>
            <li><a class="<?= $controller_name == "site/contact-us" ? "active_menu" : "" ;?>"
            href="<?= Url::toRoute(['site/index', 'section_id' => 'map']) ?>"><i id="location_map" class="fa fa-map-marker"></i> Map</a></li>
            <li><a class="<?= $controller_name == "site/contact-us" ? "active_menu" : "" ;?>"
            href="<?= Url::toRoute(['site/contact-us']) ?>"><i class="fa fa-phone"></i> Contact</a></li>
        </ul>
    </div>
    <div class="contact_info">
        <h4>Contact Info</h4>
        <ul>
            <li>Tel: <?= CompanyProfile::findOne(1)->main_phone_1; ?></a></li>
            <li>Tel: <?= CompanyProfile::findOne(1)->main_phone_2; ?></a></li>
            <li>Email: <?= CompanyProfile::findOne(1)->general_email; ?></li>
        </ul>
        <div class="social_media">

            <a href=""></a>

        </div>
    </div>
</div>

<body>
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                <div class="address">
                    <div class="logo">
                        <img src="<?= CompanyProfile::findOne(1)->feature_image; ?>" alt="">
                    </div>
                    <p><?= CompanyProfile::findOne(1)->address; ?></p>
                    <p><?= substr(CompanyProfile::findOne(1)->description, 3, 150); ?>...</p>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                <div class="contact_info">
                    <h2>Contact Info</h2>
                    <ul>
                        <li><a href=""><?= CompanyProfile::findOne(1)->main_phone_1; ?></a></li>
                        <li><a href=""><?= CompanyProfile::findOne(1)->main_phone_2; ?></a></li>
                        <li><a href=""><?= CompanyProfile::findOne(1)->general_email; ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                <div class="about_us">
                    <h2>Useful Links</h2>
                    <ul>
                        <li><a href="<?= Url::toRoute(['site/news']) ?>">News</a></li>
                        <li><a href="<?= Url::toRoute(['site/about-us']) ?>">About Us</a></li>
                        <li><a href="<?= Url::toRoute(['site/gallery']) ?>">Gallery</a></li>
                        <li><a href="<?= Url::toRoute(['site/privacy']) ?>">Privacy Policy</a></li>
                        <li><a href="<?= Url::toRoute(['site/term-condition']) ?>">Term and Condition</a></li>
                        <li><a href="<?= Url::toRoute(['site/contact-us']) ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                <div class="type">
                    <h2>Accommodation Type</h2>
                    <ul>
                        <?php 
                            $accommodation_type = AccommodationType::find()->where(['status'=>1])->limit(5)->all();
                            foreach ($accommodation_type as $key => $value) {
                                echo "<li><a href='".Url::toRoute(['accommodation-profile/index', 'AccommodationProfileSearch[from_date]'=>$f_from_date, 'AccommodationProfileSearch[to_date]'=>$f_to_date, 'AccommodationProfileSearch[accommodation_type]'=>$value->id])."'>".$value->name."</a></li>";
                            }
                         ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <p>© Copyright <?php echo date('Y'); ?> <?= CompanyProfile::findOne(1)->name; ?></p>
            </div>
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <p style="text-align:right">Powered by: <a target="blank" href="http://eocambo.com/">eOcambo
                        Technology</a></p>
            </div>
        </div>
    </div>
</div>

</html>
<?php $this->endPage() ?>
<style type="text/css">
.logo img {
    object-fit: contain;
    height: auto;
    filter: brightness(10);
}
</style>