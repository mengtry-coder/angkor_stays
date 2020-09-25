<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal; 
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-index">
<h5><?= Html::encode($this->title) ?></h5>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="panel"> 
        <div class="panel-body">  
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <?= Html::a('label', ['/reservation/create'], ['class'=>'btn btn-primary']) ?>
                        </button> 
                    </div>
                </div>
            </div>
            <br>
    
        <?php
            Modal::begin([
                'header' => ' <h4 class="modal-title">'.'Reservations'.'</h4>',
                'id' => 'modal',
                'class' => 'modal fade',
                'size' => 'modal-md',
            ]);
            echo "<div id='modalContent'></div>";
            Modal::end();
        
        ?>
        <div class="table-responsive">
                <?= GridView::widget([
                'dataProvider' => $dataProvider,
                 
                // 'layout'=>"
                //     {items}
                //         <div class='col-md-5 '>
                //             <label class='form-inline'>
                //                 Show ".
                //             Html::dropDownList('page_size',
                //             $page_size,
                //             Yii::$app->params['page_size'],
                //             array('class' => 'form-control', 'id' => 'select_page_size'))."
                //             </label>
                //         </div>
                //         <div class='col-md-2' style='padding-top: 5px;'>
                //             {summary}
                //         </div>
                //         <div class='col-md-5' style='text-align: right;'>
                //             {pager}
                //         </div>
                //         ",
                // 'pager' => [
                //     'firstPageLabel' => 'First',
                //     'lastPageLabel' => 'Last',
                //     'maxButtonCount' => 5,
                // ],
                
                //'filterModel' => $searchModel,
        
                'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'title',
            'check_in',
            'check_out',
            'number_of_bed',
            //'agree_term_condition',
            //'number_of_guest',
            //'first_name',
            //'last_name',
            //'email:email',
            //'confirm_email:email',
            //'contact_phone',
            //'address:ntext',
            //'description:ntext',
            //'total',
            //'created_by',
            //'status',
            //'updated_by',
            //'updated_date',
            //'created_date',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width:260px;'],
                    'header'=>'Actions',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                                return Html::button('<i class ="fa fa-search"></i>',
                                [
                                    'value'=> $url,
                                    'id'=> 'modalButtonView',
                                    'data-pjax'=>'0',
                                    'class' => 'padding-10',
                                ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::button('<i class ="fa fa-wrench"></i>',
                            [
                                'value'=> $url,
                                'id'=> 'modalButtonUpdate',
                                'data-pjax'=>'0',
                                'class' => 'padding-10',
                            ]);
                        }, 



                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fa fa-trash"></span>', $url, [
                                'title' => Yii::t('app', 'lead-delete'),
                                'class' => 'padding-10',
                                'data' => [
                                    'confirm' => 'Are you sure want to delete it?',
                                    'method' => 'post',
                                ],
                            ]);
                        }

                    ],

                ],
                ],
            ]); ?>
                                
            </div>
        </div>
    </div>
</div>

<?php
 
$this->registerJs('
var controller_id = "reservation";
        // $("#select_page_size").change(function(){
        //     var page_size = $("#select_page_size").val();
        //     var url = window.location.pathname;
        //         window.location.replace(url+"?r="+controller_id+"/index&page_size="+page_size);
        // });


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
