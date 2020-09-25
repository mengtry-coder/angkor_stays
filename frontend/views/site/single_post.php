<?php 
    use backend\models\Blog;
    use yii\helpers\Url;
    use backend\models\CompanyProfile;
 ?>
<div class="single_post">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-12 col-lg-12 col-xl-10">
                <div class="title">
                    <h1><?= $model->name; ?></h1>
                    <p>Post At <?= $model->created_date; ?></p>
                </div>
                <div class="feature_image">
                    <img src="<?= $model->feature_image; ?>" alt="">
                </div>
                <div class="content">
                    <p><?= $model->description; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog_post">
    <div class="container">
        <div class="title">
            <h1>You might also like</h1>
        </div>
        <div class="row">
            <?php 
                $news_list = Blog::find()->where(['status' => 1])->limit(3)->all();
                foreach ($news_list as $key => $value) {
                    ?>
                    <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                        <a href="<?= Url::toRoute(['site/single-post', 'id' => $value->id]) ?>">
                            <div class="item">
                                <div class="image">
                                    <img src="<?= $value->feature_image; ?>" alt="">
                                </div>
                                <div class="name">
                                    <span><?= $value->created_date ;?></span>
                                    <h2><?= $value->name; ?></h2>
                                    <p><?= $value->description; ?></p>
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