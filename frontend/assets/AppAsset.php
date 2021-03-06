<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'css/bootstrap.min.css',
        'css/bootstrap_modal_center.min.css',
        'css/font-awesome.css',
        'css/bootstrap-datepicker.min.css',
        'framework/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css',
        'framework/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
        'css/aos.css',
        'css/daterangepicker.css',
        'css/fancybox.min.css'
    ];
    public $js = [
        // 'js/jquery.min.js',
        // 'js/jquery-1.12.4.js',
        'framework/OwlCarousel2-2.3.4/dist/owl.carousel.js',
        'framework/OwlCarousel2-2.3.4/dist/owl.carousel.min.js',
        'js/bootstrap-datepicker.min.js',
        'js/aos.js',
        'js/main.js',
        'js/moment.min.js',
        'js/daterangepicker.js',
        'js/bootstrap.min.js',
        'js/fancybox.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
