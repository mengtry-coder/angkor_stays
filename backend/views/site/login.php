<?php
use backend\models\CompanyProfile;
$asset_path = Yii::$app->request->baseUrl;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    input#loginform-username {
        background: white !important;
    }
    input#loginform-password {
        background: white !important;
    }
</style>
<div class="site-login">
    <h1>  <img src="<?= CompanyProfile::findOne(1)->feature_image; ?>" alt="" class="img-response center" style="width: 200px; filter: brightness(10);">
</h1>
<hr/>
    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
