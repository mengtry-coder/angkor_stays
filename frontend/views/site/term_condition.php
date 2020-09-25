<?php 
	use backend\models\CompanyProfile;
 ?>
<div class="term_condition">
    <div class="container">
        <h2>Term & Condition</h2>
        <?= CompanyProfile::findOne(1)->privacy_policy; ?>
    </div>
</div>