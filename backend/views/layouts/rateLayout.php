<?php 
	use yii\helpers\Url;
	use yii\bootstrap\NavBar;
    use yii\helpers\Html;
	use yii\bootstrap\Nav;
	use yii\widgets\ActiveForm;
	use kartik\select2\Select2;
	use yii\helpers\ArrayHelper;
    use backend\models\AccommodationProfile;

	$this->beginContent('@app/views/layouts/main.php');
    $request = Yii::$app->request;
    $smMenu = 1;
    $controllerName = Yii::$app->controller->id;
    $actionName = Yii::$app->controller->action->id;
    $active = $controllerName."/".$actionName;

    $base_color = Yii::$app->params['baseColor'];
 ?>
 <div class="row">
    <div class="col-md-12 col-sm-9" style="background: #FFF;border-left: 10px solid #f5f8fa;"> 
        <div class="panel" style="padding: 10px; margin: 0px">
            <div class="btn-group mar-rgt">
                <?= Html::a('Allotment <i class="sort-amount-up-alt"></i>', ['allotment/index'], ['id' => $active == 'allotment/index' ? 'as_active' : '', 'class' => 'btn btn-default btn-active-red']) ?>
                <?= Html::a('Rate <i class="dollar-sign"></i>', ['rate/index'], ['id' => $active == 'rate/index' ? 'as_active' : '', 'class' => 'btn btn-default']) ?>
                <?= Html::a('Promotion <i class="dollar-sign"></i>', ['promotion/index'], ['id' => $active == 'promotion/index' ? 'as_active' : '', 'class' => 'btn btn-default']) ?>
            </div>
        </div>
        <div class="col-md-12">
        <hr>
        </div>
        <div class="panel-body" style="padding: 10px !important;">
            <?= $content;?>
        </div>  
    </div>
</div>
<?php $this->endContent(); ?> 
<style>
hr {
    margin: 0px 0px;
    border-top: 1px solid rgb(124, 184, 143);
}
a#as_active {
    color: <?= $base_color ;?>;
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
