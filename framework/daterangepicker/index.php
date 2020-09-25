<!DOCTYPE html>
<html>
<head>
	<title>Multi Select Datepicker</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="moment.min.js"></script>
	<script type="text/javascript" src="daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<body>
	<div class="container" style="width: 400px; margin-top: 20px;">
		<input type="text" id="demo" class="form-control">
	</div>
</body>
</html>
<script>
	$(function() {
		$("#demo").daterangepicker({
			autoApply: true,
			// showDropdowns: true,
			// timePicker: true,
			// timePickerSeconds: true,
			// timePicker24Hour: true,
			// opens: 'left',
			// drops: 'down',
			// startDate: '06/23/2020',
			// endDate: '06/24/2020',
			locale: {
	            format: 'DD/MMM/YYYY' 
	        }
		});
	});
 
	
</script>