<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\AccommodationProfile;
use backend\models\MonthList;
use backend\models\YearList;

/* @var $this yii\web\View */
/* @var $model app\models\RateSearch */
/* @var $form yii\widgets\ActiveForm */

if (!$model->isNewRecord) {
    $validationUrl['id'] = $model->id;
}
?>

<div class="rate-search">
    <div class="col-md-12 search-bd"> 

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-2">
            <select name="RateSearch[month]" id="month_id">
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
          <input type="text" id="year_id" name="RateSearch[year]" value="<?= YearList::find()->where(['name' => date("Y")])->one()->id ; ?>" hidden>
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
    $("#month_id").change(function(){
        var year = $(this).find(':selected').data("year");
       $("#year_id").val(year);
    });
JS;
$this->registerJs($script);
?>