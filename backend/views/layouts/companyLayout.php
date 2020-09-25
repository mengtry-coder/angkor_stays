<?php 
	use yii\helpers\Url;
	use yii\bootstrap\NavBar;
	use yii\bootstrap\Nav;
	use yii\widgets\ActiveForm;
	use kartik\select2\Select2;
	use yii\helpers\ArrayHelper;
	$this->beginContent('@app/views/layouts/main.php');
	 $request = Yii::$app->request;
    $smMenu = 1;
    $id_company_profile = $request->get('id',0);
    if($id_company_profile !=0){
        $id_customer_profile = $id_company_profile;
    }else{
        $id_company_profile = $request->get('id');
    }
    $controllerName = Yii::$app->controller->id;
    $actionName = Yii::$app->controller->action->id; 
 ?>
 <div class="row"> 
    <div class="col-md-2 col-sm-3">
        <div class="panel">
            <div class="panel-heading panel-eo">
            <h3 class="panel-title" style="font-weight: 500;padding: 10px;">Menu </h3>
            </div>
            <hr>
            <div class="panel-body" style="padding: 20px !important;min-height: 500px;">
                <!--Link Items-->
                <!--===================================================-->
                <div class="list-group"> 
                    <a class="list-group-item emNavActiveOnAction_company-profile" href="<?= Url::toRoute(['company-profile/update', 'id' => 1]) ?>"> Company Detail</a>  
                    <a class="list-group-item emNavActiveOnAction_gallery" href="<?= Url::toRoute('gallery/index') ?>">Gallery</a>
                    <a class="list-group-item emNavActiveOnAction_about-us" href="<?= Url::toRoute('about-us/index') ?>">About Us</a> 
                    <a class="list-group-item emNavActiveOnAction_blog" href="<?= Url::toRoute('blog/index') ?>">Blog</a>
                    <a class="list-group-item emNavActiveOnAction_our-service" href="<?= Url::toRoute('our-service/index') ?>">Our Service</a>
                    <a class="list-group-item emNavActiveOnAction_experience" href="<?= Url::toRoute('experience/index') ?>">Experience</a>
                    
                </div>
                <!--===================================================-->

            </div>
        </div>
    </div>
    <div class="col-md-10 col-sm-9" style="background: #FFF;border-left: 10px solid #f5f8fa;"> 
        <div class="panel">
            <div class="panel-heading panel-eo">
                <h3 class="panel-title" style="font-weight: 500;"><?=$this->title;?></h3>
            </div>
            <hr>
            <div class="panel-body" style="padding: 10px !important;">
                <?= $content;?>
            </div>
        </div>   
    </div>
</div>
<?php $this->endContent(); ?> 
<style>
hr {
    margin: 0px 0px;
    border-top: 1px solid rgb(124, 184, 143);
}
.wrapper {
    padding-top: 120px;
    background: #f5f5f5 !important;
    padding-bottom: 20px;
}
.wrapper .container {
    /* background: #f5f5f5 !important; */
    padding: 0px;
}
</style>  
<style media="screen">
 a.list-group-item.emNavActiveOnAction_<?=$controllerName;?>{
    color: #f87232 !important;
    font-weight: 500;
 }
 a.list-group-item.emNavActive_<?=$controllerName;?>{
    color: #f87232 !important;
    font-weight: 500;
 }
 .panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
    padding: 10px;
}
.search-bd {
    background: #f5f8fa;
    height: 100px;
    padding: 15px;
    margin-top: 20px;
}
.footer .container {
  background: #fff !important;
}
 </style>
