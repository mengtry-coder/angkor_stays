<?php 
    use backend\models\CompanyProfile;
    use backend\models\CustomField;
    use yii\bootstrap\ActiveForm;

 ?>
<div class="banner" style="background: url('<?= CustomField::findOne(3)->feature_image; ?>')">
    <div class="item-center overlay">
        <div class="title">
            <h2>Contact Us</h2>
            <a href="http://localhost/dropbox/srhs_system/frontend/web/index.php">Home </a>/
                <span>Contact Us</span>
        </div>
    </div>
</div>
<div class="page_contact_us">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7 col-cl-7">
                <div class="contact_from">
                    <p><?= CustomField::findOne(3)->description; ?></p>

                    <?php $form = ActiveForm::begin([
                        'action' => ['send-email-contact-us'],
                    ]); ?>
                        <div class="form-group">
                            <label for="name" class="required">Full Name </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" required="">
                        </div>
                        <div class="form-group">
                            <label for="email" class="required">Email Address</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="example@gmail.com" required="">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="required">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" required="">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="required">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required="">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn_send">Send</button>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5 col-cl-5">
               <?= CompanyProfile::findOne(1)->map_link; ?>
                <div class="contact_info">
                    <h2>Contact Info</h2>
                    <p><?= CompanyProfile::findOne(1)->address; ?></p>
                    <p><?= CompanyProfile::findOne(1)->main_phone_1; ?> | <?= CompanyProfile::findOne(1)->main_phone_2; ?></p>
                    <p>Email : <?= CompanyProfile::findOne(1)->general_email; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .form-group .required:after {
        font-family: FontAwesome;
        content: " \f2dc ";
        content: " * ";
        color: red;
        font-size: 15px;
        vertical-align: top;
    }
</style>