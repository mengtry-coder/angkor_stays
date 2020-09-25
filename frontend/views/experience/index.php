<?php
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal; 
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\OurServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Experience';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experience-index">
    <h5><?= Html::encode($this->title) ?></h5>

    <div class="page_accommodation_type">
        <div class="container">
                <?=
                    ListView::widget([
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                        // 'nextPageLabel' => 'next',
                        // 'prevPageLabel' => 'previous',
                        'maxButtonCount' => 3,
                    ],
                    'itemView' => function ($model, $key, $index, $widget) {
                ?>
                    <div class="row no-gutters">
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                            <a href="<?= Url::toRoute(['experience/single-experience', 'id' => $model->id]) ?>">
                                <div class="item">
                                    <div class="image">
                                        <img src="<?= $model->feature_image ;?>" alt="">
                                    </div>
                                    <div class="name">
                                        <h2><?= $model->name ;?></h2>
                                        <p><i class="fa fa-map-marker"></i>Siem Reap</p>
                                        <p><?= $model->description ;?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php
                        }
                    ]);
                ?>
        </div>
    </div>
</div>

<?php
 
$this->registerJs('
var controller_id = "experience";
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
