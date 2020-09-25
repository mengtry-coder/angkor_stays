<?php 

	use yii\helpers\Url;
	use yii\helpers\Html;
	$base_url = Yii::getAlias('@web');
	
$f_from_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 7 days'));;
    $f_to_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 14 days'));
    $guest = 4;
 ?>
<!DOCTYPE html>
<html>
<style>
	.jumbotron.text-center {
	    margin-top: 100px;
	}
</style>
<div class="jumbotron text-center">
	<h1 class="display-3 thank-you" >Booking Successful! <br>Thank You!</h1>
	<div class="wrap_sent_email">
		<img src="https://static.thenounproject.com/png/417902-200.png" alt="">
	</div>
	<p>
		Please feel free to <a href="<?= $base_url;?>/index.php?r=site/contact-us">Contact us</a>
	</p>
	<p class="lead">
		<a class="btn btn-default btn-sm btn-service" href="<?= Url::toRoute(['accommodation-profile/index', 'AccommodationProfileSearch[from_date]'=>$f_from_date, 'AccommodationProfileSearch[to_date]'=>$f_to_date, 'AccommodationProfileSearch[max_guest]'=>$guest]) ?>" role="button">Other Accommodation</a>
	</p>
	
</div>
</html>
<style type="text/css">
	.thank-you{
		font-family: inherit!important;
	    font-weight: 600;
	    text-transform: uppercase;
	    margin-bottom: 20px;
	}
	.jumbotron p{
		font-size: 17px;
	}
	.btn-service{
		padding: 9px 19px!important;
    	font-size: 17px!important;
    	border-radius: 25px;
	}
	.wrap_sent_email{
		width: 160px;
	    height: 135px;
	    margin: auto;
	    margin-top: -25px;
	}
	.wrap_sent_email img{
		object-fit: cover;
    	width: 100%;
    	height: 100%;
	}
</style>