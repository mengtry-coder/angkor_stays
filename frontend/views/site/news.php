<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\models\CustomField;


$this->title = CustomField::findOne(6)->name;

?>
<div class="banner" style="background: url('<?= CustomField::findOne(6)->feature_image; ?>')">
    <div class="item-center overlay">
        <div class="title">
            <h2><?= Html::encode($this->title) ?></h2>
            <a href="<?= Url::toRoute(['site/index']) ?>">Home </a>/
                <span><?= Html::encode($this->title) ?></span>
        </div>
    </div>
</div>
<br><br>
<div class="blog_post">
    <div class="container">
        <div class="row">
            <?php foreach ($news as $value) {
                
            ?>
            <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                <a href="<?= Url::toRoute(['site/single-post', 'id' => $value->id]) ?>">
                    <div class="item">
                        <div class="image">
                            <img src="<?= $value->feature_image?>" alt="">
                        </div>
                        <div class="name">
                            <span><?= $value->created_date; ?></span>
                            <h2><?= $value->name?></h2>
                            <p><?= $value->description?></p>
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