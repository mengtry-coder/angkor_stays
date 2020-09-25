<?php 
    use yii\helpers\Url;
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
            <?php 
                foreach ($accommodation_arr as $key => $value) {
                    ?>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                            <a href="<?= Url::toRoute(['site/single-acc-type', 'id' => $value->id]) ?>">
                                <div class="item">
                                    <div class="image">
                                        <img src="<?= $value->feature_image ;?>" alt="">
                                    </div>
                                    <div class="name">
                                        <h2><?= $value->name ;?></h2>
                                        <p><i class="fa fa-map-marker"></i>Siem Reap</p>
                                        <p><?= $value->number_of_rooms; ?> Rooms, Size: <?= $value->accommodation_size; ?></p>
                                        <p><span><?= $value->price; ?></span>$ / night</p>
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
