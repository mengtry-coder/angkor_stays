<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\AccommodationProfile;
use backend\models\MonthList;
use backend\models\YearList;

/* @var $this yii\web\View */
/* @var $model backend\models\AllotmentSearch */
/* @var $form yii\widgets\ActiveForm */
$base_url = Yii::getAlias('@web');
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$validationUrl = ['allotment/validation'];
if (!$model->isNewRecord) {
    $validationUrl['id'] = $model->id;
}
$date_template = '{label}</br><div class="input-group">
            <span style="width: 50px;line-height: 0rem;padding: 9px;" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
?>

<div class="allotment-search">
    <div class="col-md-12 search-bd"> 

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">

        <div class="col-md-2">
            <select name="AllotmentSearch[month]" id="month_id">
            <?php
                for ($i=date("Y"); $i <= date("Y")+1; $i++) { 
                    if ($i == date("Y")) {
                        $month_list = MonthList::find()->where(['>=', 'value', date('m')])->all();
                    }else{
                         $month_list = MonthList::find()->all();
                    }
                    foreach ($month_list as $key => $value) {
                        $yearid = YearList::find()->where(['name' => $i])->one()->id;
                        ?>
                            <option <?= $i == $filter_year && $value->value == $month_value ? "selected" : "" ;?> data-year= "<?= $yearid ;?>" value="<?= $value->value;?>"><?= $value->name."-".$i?></option>
                        <?php
                    }
                }
             ?>
          </select>
          <input type="text" id="year_id" name="AllotmentSearch[year]" value="<?= YearList::find()->where(['name' => date("Y")])->one()->id ; ?>" hidden>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?=Html::submitButton('Filter', ['class' => 'btn btn-primary'])?>
                    <?= Html::a('Reset',['index'],['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>

</div>
<style>
.search-bd{
    background: whitesmoke;
    height: 100px; 
    padding: 15px;  
}
.btn-primary {
    color: #fff;
    background-color: #3f5773;
    border-color: #3f5773; 
    margin-top: 30px;
}
select#month_id {
    margin: 31px 0px;
    border-radius: 4px;
    border: 1px solid #dad6d6;
    width: 100%;
}
</style>
<?php
$script = <<< JS

    var base_url = "$base_url";

    $('.editor_area').each(function(e){
        CKEDITOR.replace( this.id, { customConfig: base_url + '/plugins/ckeditor/config.js' });
    });

    $("#month_id").change(function(){
            var year = $(this).find(':selected').data("year");
           $("#year_id").val(year);
        });


    $('#allotmentsearch-month').datepicker({
        format: "MM",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
    });
    $('#allotmentsearch-year').datepicker({
        format: "yy",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
    });

JS;
$this->registerJs($script);
?>
