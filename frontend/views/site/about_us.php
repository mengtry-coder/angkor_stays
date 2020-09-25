<?php 
    use backend\models\CustomField;

    $this->title = "About Us";
 ?>
<div class="banner" style="background: url('<?= CustomField::findOne(5)->feature_image; ?>')">
    <div class="item-center overlay">
        <div class="title">
            <h2>About us</h2>
            <a href="http://localhost/dropbox/srhs_system/frontend/web/index.php">Home </a>/
                <span><?= CustomField::findOne(5)->name; ?></span>
        </div>
    </div>
</div>
<div class="page_about">
    <div class="container">
        <?php 
        $i = 1;
            foreach ($model as $key => $value) {
                $i++;
                if ($i % 2) {
                ?>
                <div class="our_story">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="image">
                                 <a class="fancybox-thumb" data-type="image" href="<?= $value->feature_image; ?>" data-fancybox="images">
                                        <img src="<?= $value->feature_image; ?>" alt="">
                                    </a>

                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="content item-center">
                                <h1><?= $value->name; ?></h1>
                                <p><?= $value->long_description; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }else{
                    ?>
                    <div class="our_story">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="content item-center">
                                    <h1><?= $value->name; ?></h1>
                                    <p><?= $value->long_description; ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="image">
                                    <a class="fancybox-thumb" data-type="image" href="<?= $value->feature_image; ?>" data-fancybox="images">
                                        <img src="<?= $value->feature_image; ?>" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                }
            }
         ?>
    </div>
</div>
<div class="our_values">
    <div class="container">
        <div class="title text-center">
            <h1>Our values</h1>
        </div>
        <div class="row no-gutters">
            <?php 
                foreach ($our_value as $key => $value) {
                   ?>
                    <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                        <div class="item">
                            <div class="icon">
                                <img src="<?= $value->feature_image; ?>" alt="">
                            </div>
                            <div class="title">
                                <h2><?= $value->name; ?></h2>
                            </div>
                            <div class="short_detial">
                                <p><?= $value->long_description; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
             ?>
        </div>
    </div>
</div>