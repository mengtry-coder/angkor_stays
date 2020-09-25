<?php 
	use backend\models\CompanyProfile;
 ?>
<div class="page_privacy">
    <div class="container">
    	<h2>Privacy & Policy</h2>
        <?= CompanyProfile::findOne(1)->privacy_policy; ?>
    </div>
</div>