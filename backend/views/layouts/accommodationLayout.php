<?php 
	use yii\helpers\Url;
	use yii\bootstrap\NavBar;
	use yii\bootstrap\Nav;
	use yii\widgets\ActiveForm;
	use kartik\select2\Select2;
	use yii\helpers\ArrayHelper;
    use backend\models\AccommodationProfile;

	$this->beginContent('@app/views/layouts/main.php');
    $request = Yii::$app->request;
    $smMenu = 1;
    $id_accommodation_profile = $request->get('id',0);
    if($id_accommodation_profile !=0){
        $id_customer_profile = $id_accommodation_profile;
    }else{
        $id_accommodation_profile = $request->get('id');
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
                    <a class="list-group-item emNavActiveOnAction_accommodation-profile" href="<?= Url::toRoute(['accommodation-profile/update', 'id'=>$id_accommodation_profile]) ?>">Accommodation Detail</a>  
                    <a class="list-group-item emNavActiveOnAction_accommodation-gallery-title" href="<?= Url::toRoute(['accommodation-gallery-title/index', 'id' => $id_accommodation_profile]) ?>">Gallery</a>
                    <a class="list-group-item emNavActiveOnAction_room" href="<?= Url::toRoute(['room/create', 'id' => $id_accommodation_profile]) ?>">Room</a>
                    <a class="list-group-item emNavActiveOnAction_rate-plan" href="<?= Url::toRoute(['rate-plan/index', 'id' => $id_accommodation_profile]) ?>">Rate Plan</a>
                </div>
                <!--===================================================-->

            </div>
        </div>
    </div>
    <div class="col-md-10 col-sm-9" style="background: #FFF;border-left: 10px solid #f5f8fa;"> 
        <div class="panel">
            <div class="panel-heading panel-eo">
                <h3 class="panel-title" style="font-weight: 500;"><?= AccommodationProfile::findOne($id_accommodation_profile)->name; ?> | <?= $this->title;?></h3>
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
