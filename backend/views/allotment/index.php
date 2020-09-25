<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal; 
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use backend\models\YearList;
use backend\models\MonthList;
use backend\models\AccommodationProfile;

$base_url = Yii::getAlias('@web');
$base_color = \Yii::$app->params['baseColor'];
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AllotmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Allotments';
$this->params['breadcrumbs'][] = $this->title;
$time_template = '
    {label}
    </br>
    <div class="input-group">
        <span style="width: 40px" class="input-group-addon">
            <i class="demo-pli-clock"></i>
        </span> 
        {input} 
    </div>
    {error}{hint}';

$validationUrl = ['allotment/validation'];
if (!$model->isNewRecord) {
    $validationUrl['id'] = $model->id;
}
$date_template = '{label}</br><div class="input-group">
            <span style="width: 50px;line-height: 0rem;padding: 9px;" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
?>
<style>
    td {
    padding: 7px;
}
    td, th { 
    border: solid black 1px;
    text-align: center;
}
button.btn.btn-success.btn-submit {
    float: left;
    margin-top: 15px;
}
th.Sat {
    background: <?= $base_color; ?>;
}
th.Sun {
    background: <?= $base_color; ?>;
}
td.Sat {
    background: #79ff585e;
}
td.Sun {
    background: #79ff585e;
}
    td {
    padding: 7px;
}
    td, th { 
    border: solid #0000000f 1px;
    text-align: center;
}
#content {
  height: 800px;
  width: 2000px;
  background-color: coral;
}
#myDIV {
  height: auto;
  width: 100%;
  overflow: auto;
}
.data-table tbody tr td{
    white-space: nowrap;
}
</style>
    <?php 
        $workdays = array();
        $type = CAL_GREGORIAN;
        $month_new = date('n'); // Month ID, 1 through to 12.
        $year_new = date('Y'); // Year in 4 digit 2009 format.
        $day_count = cal_days_in_month($type, $month_new, $year_new); // Get the amount of days
    ?>

<div class="allotment-index">
    <?php echo $this->render('_search', ['model' => $searchModel, 'filter_year' => $filter_year, 'month_value' => $month_value]); ?>
</div>
<div class="panel"> 
    <div class="panel-body">  
    <?php $form = ActiveForm::begin([
    'id' => $model->formName(),
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'action' =>['/allotment/create','id'=>$model->id, 'month'=>$month, 'year'=>$year->name],
    'options' => ['enctype' => 'multipart/form-data'],
    'validationUrl' => $validationUrl
]); ?>
<br>
        <div class="row" style="padding-top: 20px;">
            <div class="col-md-4">
                <?php
                    $acc_arr = ArrayHelper::map(AccommodationProfile::find()
                    ->where(['status'=>1])
                    ->all(), 'id', function($model){return $model->name;});
                ?>
                <?= $form->field($model, 'accommodation_id')->widget(Select2::classname(), [
                        'data' => $acc_arr,
                        'theme' => Select2::THEME_DEFAULT,
                        'language' => 'eg',
                        'options' => [
                            'name' => 'acc_name',
                            ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                ?> 
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'from_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important;']) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'to_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important;']) ?>
            </div>
            
            <div class="col-md-2">
                <?=$form->field($model, 'number_of_guest')->textInput(['maxlength' => true])?>
            </div>
            <div class="col-md-2">
                <!-- hidden default filter value -->
                <?=$form->field($model, 'month')->hiddenInput(['maxlength' => true, 'value'=>$searchModel->month])->label(false);?>
                <?=$form->field($model, 'year')->hiddenInput(['maxlength' => true, 'value'=>$searchModel->year])->label(false);?>
                <?=$form->field($model, 'accommodation_id')->hiddenInput(['maxlength' => true, 'value'=>$searchModel->accommodation_id])->label(false);?>
                
                <div class="form-group">
                    <?=Html::submitButton('Submit', ['class' => 'btn btn-success btn-submit'])?>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
        <br>
        <div class="data-table" id="myDIV" onscroll="myFunction()">
            <div class="panel"> 
                <div class="panel-body">

                    <div class="data-table" id="myDIV">
                        <br>
                        <table>
                            <thead>
                                <th>
                                    Days
                                </th>
                                <?php
                                $month_year = $year->name."-".$month;
                                $first_day = $month_year."-01";
                                $query = "SELECT * 
                                            from allotment
                                            where date BETWEEN '$first_day' AND LAST_DAY('$first_day')";
                                $get_allotment = Yii::$app->db->createCommand($query)->queryAll();
                                for ($i = 1; $i <= $total_days; $i++) 
                                    {
                                        $day = substr(date( 'l', strtotime( $month . '/' . $i ) ), 0, 3);
                                        echo "<th class= '<?= $day ;?>'>".$i."<br>".$day."</th>";
                                    }
                                 ?>
                            </thead>

                            <tbody>
                                <?php 
                                    foreach ($accommodation_arr as $accommodation) {
                                        ?>
                                            <tr>
                                                <td><?= $accommodation->name; ?></td>
                                                <?php
                                                    for ($i = 1; $i <= $total_days; $i++) 
                                                        {
                                                            switch ($i){
                                                                case 1: 
                                                                $day = "01";
                                                                break;

                                                                case 2: 
                                                                $day = "02";
                                                                break;

                                                                case 3: 
                                                                $day = "03";
                                                                break;

                                                                case 4: 
                                                                $day = "04";
                                                                break;

                                                                case 5: 
                                                                $day = "05";
                                                                break;

                                                                case 6: 
                                                                $day = "06";
                                                                break;

                                                                case 7: 
                                                                $day = "07";
                                                                break;

                                                                case 8: 
                                                                $day = "08";
                                                                break;

                                                                case 9: 
                                                                $day = "09";
                                                                break;

                                                                case $i: 
                                                                $day = $i;
                                                                break;

                                                            }
                                                            $date = $year->name."-".$month."-".$day;
                                                            $sql = "SELECT number_of_guest from allotment where date= '$date' and accommodation_id = $accommodation->id ";
                                                            $number = Yii::$app->db->createCommand($sql)->queryScalar();
                                                            $get_number = empty($number) ? "0" : $number;
                                                            $day = substr(date( 'l', strtotime( $month . '/' . $i ) ), 0, 3);
                                                            echo "<td class= '<?= $day ;?>'>".$get_number."</td>"; 
                                                        }
                                                     ?>
                                            </tr>
                                        <?php
                                    }
                                 ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->registerJs('
    var base_url = "$base_url";
    var total_day = "$total_days";
    var controller_id = "allotment";
    

        $("#select_page_size").change(function(){
            var page_size = $("#select_page_size").val();
            var url = window.location.pathname;
                window.location.replace(url+"?r="+controller_id+"/index&page_size="+page_size);
        });

        $(document).on("click","#modalButton",function () { 
            $("#overlay").css("display", "block");
            $("#res-result").load($(this).attr("value"), function(res){ 
                $(this).html("");
                $("#modal").modal("show")
                $("#modalContent").html(res)
                $("#overlay").css("display", "none");
            })

        });

        $(document).on("click","#modalButtonView",function () { 
            $("#overlay").css("display", "block");
            $("#res-result").load($(this).attr("value"), function(res){ 
                $(this).html("");
                $("#modal").modal("show")
                $("#modalContent").html(res)
                $("#overlay").css("display", "none");
            })
        });
        

        $(document).on("click","#modalButtonUpdate",function () { 
            $("#overlay").css("display", "block");
            $("#res-result").load($(this).attr("value"), function(res){ 
                $(this).html("");
                $("#modal").modal("show")
                $("#modalContent").html(res)
                $("#overlay").css("display", "none");
            })
        });

        $("#allotmentsearch-year").change(function(){
                var year = $(this).val();
                var month = $("#allotmentsearch-month").val();
            });

    $("#allotment-from_date, #allotment-to_date").datepicker({
        format: "yyyy-mm-dd",
        changeMonth: true,
        changeYear: true,
        autoclose: true,
    });

    $("#allotment-starting_time").datetimepicker({
        timepicker: true,
        datepicker: false,
        format: "H:i",
        hours24: false,
    });

    ')
;

?>
<script>
function myFunction() {
  var elmnt = document.getElementById("myDIV");
  var x = elmnt.scrollLeft;
  var y = elmnt.scrollTop;
}
</script>

<?php
$script = <<< JS
    var filter_year = "$filter_year";
    var month_value = "$month_value";
    $(document).ready(function(){

            var getDaysInMonth = function(month_value,filter_year) {
                return new Date(filter_year, month_value, 0).getDate();
            };
            var last_day = getDaysInMonth(month_value, filter_year);
            $("#allotment-from_date").datepicker("setDate", new Date(filter_year, month_value-1, 1));
            $("#allotment-from_date").datepicker("setStartDate", new Date(filter_year, month_value-1, 1));
            $("#allotment-to_date").datepicker("setDate", new Date(filter_year, month_value-1, last_day));
            $("#allotment-to_date").datepicker("setStartDate", new Date(filter_year, month_value-1, 1));

            $("#allotment-from_date").datepicker("setEndDate", new Date(filter_year, month_value-1, last_day));
            $("#allotment-to_date").datepicker("setEndDate", new Date(filter_year, month_value-1, last_day));


        });
        $("#allotment-from_date").change(function(){
            $("#allotment-to_date").datepicker("setDate", $(this).val());
            $("#allotment-to_date").datepicker("setStartDate", $(this).val());
        });
JS;
$this->registerJS($script);
?>