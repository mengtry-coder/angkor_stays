<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\GalleryImage;
use backend\models\CustomField;

$this->title = 'Gallery';

?>

<div class="banner" style="background: url('<?= CustomField::findOne(7)->feature_image; ?>')">
    <div class="item-center overlay">
        <div class="title">
            <h2><?= Html::encode($this->title) ?></h2>
            <a href="<?= Url::toRoute(['site/index']) ?>">Home </a>/
                <span><?= Html::encode($this->title) ?></span>
        </div>
    </div>
</div>
<div class="page_gallery">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">View All</a>
            </li>
            <?php
                foreach ($gallery as $value) { 
            ?>
                <li class="nav-item">
                    <a href="#<?=$value->id."-".$value->status;?>" class="nav-link" id = "<?= $value->id?>" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" value= "<?=$value->id ;?>" ><?= $value->name?></a>
                </li>
            <?php
                }
            ?>
        </ul>

        <div class="tab-content">
            <div id="all" class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                <div class="row no-gutters">
                    <?php 
                        $image = GalleryImage::find()->limit(18)->all();
                        foreach ($image as $value) {
                    ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                        <div class="image">
                            <a class="fancybox-thumb" data-type="image" href="<?= $value->file_path.$value->file_name ;?>" data-fancybox="images">
                                <img src="<?= $value->file_path.$value->file_name ;?>" alt="">
                            </a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <?php
                foreach ($gallery as $tab) { 
            ?>
                <div id="<?=$tab->id."-".$tab->status;?>" class="tab-pane fade" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row no-gutters">
                        <?php
                            $image = GalleryImage::find()->where(['gallery_id'=>$tab->id])->limit(18)->all();
                            foreach ($image as $value) {
                        ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="image">
                                <a class="fancybox-thumb" data-type="image" href="<?= $value->file_path.$value->file_name ;?>" data-fancybox="images">
                                    <img src="<?= $value->file_path.$value->file_name ;?>" alt="">
                                </a>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>