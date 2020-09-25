<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reservation */

$this->title = 'Detail Information';
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title.' '.$model->first_name.' '.$model->last_name;
\yii\web\YiiAsset::register($this);
$base_color = "#2b3d50c4";
?>
    <?= Html::a('Export to PDF <i class="fa fa-print"></i>', ['reservation/print-pdf', 'id' => $model->id], ['class'=>'export', 'target'=>'_blank']) ?>
    <style>
        a.export {
            padding: 10px;
            border: 1px solid black;
            border-radius: 42px;
        }
        p.tex-tab {
            text-align: left;
            padding: 0px 10px;
        }
        .reservation-view {
            background: #efefef;
            padding: 20px;
            margin: 20px 0px;
        }
        .summary {
            background: #efefef;
            margin: 20px 0px;
            padding: 20px;
        }
    </style>
<div class="row">
    <div class="col-md-8">
        <div class="reservation-view">
            <p><b>Property Name: </b><?= $model->accName->name?></p>
            <p><b>Check In: </b><?= $model->check_in?></p>
            <p><b>Check Out: </b><?= $model->check_out?></p>
            <p><b>Book Date: </b><?= $model->created_date?></p>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2"><h4 style="text-align: left; padding: 5px;">Guest Detail</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p class="tex-tab">FIRST NAME</p>
                            <p class="tex-tab"><b><?= $model->first_name ?></b></p>
                        </td>
                        <td>
                            <p class="tex-tab">LAST NAME</p>
                            <p class="tex-tab"><b><?= $model->last_name ?></b></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="tex-tab">PHONE NUMBER</p>
                            <p class="tex-tab"><b><?= $model->contact_phone ?></b></p>
                        </td>
                        <td>
                            <p class="tex-tab">E-MAIL ADDRESS</p>
                            <p class="tex-tab"><b><?= $model->email ?></b></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="summary">
            <h4>Summary</h4>
            <br>
            <p>SUB TOTAL</p>
            <p><b>$ <?= $model->sub_total ?></b></p>
            <hr>
            <p>PROMOTION</p>
            <p><b><?= $model->promotion ?> %</b></p>
            <hr>
            <p>GRAND TOTAL</p>
            <p><b>$ <?= $model->total ?></b></p>
        </div>
    </div>
</div>
<style type="text/css">
    .list-group{
        margin: 10px;
    }
</style>
