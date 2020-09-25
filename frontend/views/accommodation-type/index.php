<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal; 
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AccommodationTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accommodation Types';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page_accommodation_type">
    <div class="container">
        <div class="title">
            <span><?= $accommodation_count; ?>+ Accommodations Available</span>
            <h1>Stays in Cambodia</h1>
        </div>
        <div class="fiiter">
            <?php echo $this->render('_accommodation_filter'); ?>
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
                    'itemView' => function ($model, $key, $index, $widget){
            ?>
            
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <a href="<?= Url::toRoute(['site/single-acc-type', 'id' => $model->id]) ?>">
                        <div class="item">
                            <div class="image">
                                <img src="<?= $model->feature_image ;?>" alt="">
                            </div>
                            <div class="name">
                                <h2><?= $model->name ;?></h2>
                                <p><i class="fa fa-map-marker"></i>Siem Reap</p>
                                <p><?= $model->number_of_rooms; ?> Rooms, Size: <?= $model->accommodation_size; ?></p>
                                <p><span><?= $model->price; ?></span>$ / night</p>
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

