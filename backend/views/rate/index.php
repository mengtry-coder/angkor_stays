<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal; 
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\AccommodationProfile;
use yii\widgets\ActiveForm;
use backend\models\Rate;
use backend\models\MonthList;
use backend\models\YearList;
use backend\models\RatePlan;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerJsFile(
    '@web/plugins/ckeditor/ckeditor.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
$base_url = Yii::getAlias('@web');
$base_color = Yii::$app->params['baseColor'];;
if (!$model->isNewRecord){
$validationUrl['id'] = $model->id;
}
$validationUrl = ['rate/validation'];
$date_template = '{label}</br><div class="input-group">
            <span style="width: 50px;line-height: 0rem;padding: 9px;" class="input-group-addon"><i class="fa fa-calendar"></i></span> {input} </div>{error}{hint}';
$this->title = 'Rate';
$this->params['breadcrumbs'][] = $this->title;

 $monthly_active = "";
 $yearly_active = "active";
?>


<style>
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
#myDIV {
  height: auto;
  width: 100%;
  overflow: auto;
}
button.btn.btn-success.save-btn {
    margin-top: 0px;
    background-color: red;
}
input#rate-from_date {
    border: 1px solid #80808040;
    width: 100%
}
input#rate-to_date {
    border: 1px solid #80808040;
    width: 100%;
}
input#promotion_from_date {
    border: 1px solid #80808047;
    width: 100%
}
input#promotion_to_date {
    border: 1px solid #80808047;
    width: 100%
}
.data-table thead tr th{
    white-space: nowrap;
}
</style>
<head>
<link rel="stylesheet" type="text/css" href="rate_style.css">
</head>
<div class="rate-index">
    <?php echo $this->render('_search', ['model' => $searchModel, 'filter_year' => $filter_year, 'month_value' => $month_value]); ?>

        <div>
            <?php $form = ActiveForm::begin([
                'id' => $model->formName(),
                'enableAjaxValidation' => false,
                'action' => ['rate/create', 'month'=>$month, 'year'=>$year->id],
                'enableClientValidation' => true,
                'options' => ['enctype' => 'multipart/form-data'],
                'validationUrl' => $validationUrl
            ]); ?>

            <div class="main_input">
                <div class="row">
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
                        <?= $form->field($model, 'rate_plan_id')->widget(Select2::classname(), [
                                'data' => "",
                                'theme' => Select2::THEME_DEFAULT,
                                'language' => 'eg',
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                        ?> 
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'from_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important;', 'class'=>'yearly_from_date']) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'to_date', ['template'=>$date_template])->textInput(['readonly' => true, 'style'=>'background: #fff !important;', 'class'=>'yearly_to_date']) ?>
                    </div>
                    <div class="col-md-2">
                        <?= $form->field($model, 'price') ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success save-btn']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
         <div class="data-table" id="myDIV" onscroll="myFunction()">
                <div class="panel"> 
                    <div class="panel-body">
                        <div class="data-table" id="myDIV">
                            <br>
                            <table>
                                    <?php 
                                        foreach ($accommodation_arr as $accommodation) {
                                            ?>
                                            <thead>
                                                <th><?= $accommodation->name; ?></th>
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
                                                    $rate_plan_array = RatePlan::find()->where(['accommodation_id' => $accommodation->id])->all();
                                                    foreach ($rate_plan_array as $row_rate_plan) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $row_rate_plan ? $row_rate_plan->name : "Empty" ;?></td>
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
                                                                            $sql = "SELECT price from rate where date= '$date' and accommodation_id = $accommodation->id and rate_plan_id = $row_rate_plan->id ";
                                                                            $price = Yii::$app->db->createCommand($sql)->queryScalar();
                                                                            $get_price = empty($price) ? "0" : $price;
                                                                            $day = substr(date( 'l', strtotime( $month . '/' . $i ) ), 0, 3);
                                                                            echo "<td class= '<?= $day ;?>'>".$get_price."</td>";
                                                                        }
                                                                     ?>
                                                            </tr>
                                                        <?php
                                                        }
                                                 ?>
                                            </tbody>
                                            <?php
                                        }
                                     ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
     </div>
 </div>
    </div>
</div>

<?php
 
$this->registerJs('
var controller_id = "rate";
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


    ');

?>

<!-- form -->

<?php

$script = <<< JS
    
      var base_url = "$base_url";
        var number_day = "$total_days";
        var month = "$month";
        var base_color = "$base_color";
        var filter_year = "$filter_year";
        var month_value = "$month_value";
        $("#rate-from_date, #rate-to_date").datepicker({
            format: "yyyy-mm-dd",
            changeMonth: true,
            changeYear: true,
            autoclose: true,
        });

        $("#rate-from_date").change(function(){
            $("#rate-to_date").datepicker("setStartDate", $(this).val());
        });

        $(document).ready(function(){
            var year = $("#ratesearch-year option:selected").text();
            var month = $("#ratesearch-month").val();
            $("#rate-to_date").datepicker("setDate", new Date(year, month-1, 1));

            var getDaysInMonth = function(month,year) {
             return new Date(year, month, 0).getDate();
            };
            var number_day = getDaysInMonth(month, year);

            $("#rate-from_date").datepicker("setDate", new Date(year, month-1, 1));
            $("#rate-from_date").datepicker("setEndDate", new Date(year, month-1, number_day));
            $("#rate-to_date").datepicker("setEndDate", new Date(year, month-1, number_day));
            $("#rate-to_date").datepicker("setDate", new Date(year, month-1, number_day));

            $("#promotion_from_date").datepicker("setDate", new Date(year, month-1, 1));
            $("#promotion_from_date").datepicker("setEndDate", new Date(year, month-1, number_day));
            $("#promotion_to_date").datepicker("setEndDate", new Date(year, month-1, number_day));
            $("#promotion_to_date").datepicker("setDate", new Date(year, month-1, number_day));

        });
        // =========city country===========

        $( document ).ready(function() {
            var id = $("#rate-accommodation_id").val();
            console.log(id);
            $.ajax({
                url: base_url+'/index.php?r=rate/dependent',
                type: 'post',
                data: {
                    id: id,
                    action: 'get_rate_plan'
                },
                success: function(response){ 
                    var data = JSON.parse(response);
                    var str = "";
                    $.each(data,function(key,value){
                        str = str + '<option value="'+value.id+'">'+value.name+'</option>';
                    });
                    $('#rate-rate_plan_id').html(str);
                }
            });
        });

        $("#rate-accommodation_id").change(function(){ 
            var id = $(this).val();
            $.ajax({
                url: base_url+'/index.php?r=rate/dependent',
                type: 'post',
                data: {
                    id: id,
                    action: 'get_rate_plan'
                },
                success: function(response){ 
                    var data = JSON.parse(response);
                    var str = "";
                    $.each(data,function(key,value){
                        str = str + '<option value="'+value.id+'">'+value.name+'</option>';
                    });
                    $('#rate-rate_plan_id').html(str);
                }
            });

        });

        $(document).ready(function(){

            var getDaysInMonth = function(month_value,filter_year) {
                return new Date(filter_year, month_value, 0).getDate();
            };
            var last_day = getDaysInMonth(month_value, filter_year);
            $("#rate-from_date").datepicker("setDate", new Date(filter_year, month_value-1, 1));
            $("#rate-from_date").datepicker("setStartDate", new Date(filter_year, month_value-1, 1));
            $("#rate-to_date").datepicker("setDate", new Date(filter_year, month_value-1, last_day));
            $("#rate-to_date").datepicker("setStartDate", new Date(filter_year, month_value-1, 1));

            $("#rate-from_date").datepicker("setEndDate", new Date(filter_year, month_value-1, last_day));
            $("#rate-to_date").datepicker("setEndDate", new Date(filter_year, month_value-1, last_day));


        });
        $("#rate-from_date").change(function(){
            $("#rate-to_date").datepicker("setDate", $(this).val());
            $("#rate-to_date").datepicker("setStartDate", $(this).val());
        });

JS;
$this->registerJS($script);
?>

