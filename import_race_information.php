<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width-device-width, initial-scale=1" />

<title>Track King Index</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet">

</head>

<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- Site Navigation -->
<?php include 'Includes/Navigation.php'; ?>

<div class="container"> 
<!-- START OF MAIN CONTENT AREA -->

<!-- Site banner -->       	
    <div class="banner">
        <div class="container">
 
            <h1>Import Race Information</h1>
            <p>Lets import all the data about the race.</p>
        </div>
    </div>
<br />

<!-- ENTER OUR CONTENT HERE -->

<?php

require_once('connect.php');

$boat = "Ultra Violet";

	if ($_POST["submit"]) {
		$date = $_POST['date'];
		$winddirectionstart = $_POST['winddirectionstart'];
		$winddirectionend = $_POST['winddirectionend'];
		$windspeedstart = $_POST['windspeedstart'];
		$windspeedend = $_POST['windspeedend'];
		$rake = $_POST['rake'];
		$waveconditions = $_POST['waveconditions'];
		$comments = $_POST['comments'];
		$human = intval($_POST['human']);
	
		// Check if name has been entered
		if (!$_POST['date']) {
			$errDate = 'Please enter the date';
		}
		
		// Check if wind direction start has been entered
		if (!$_POST['winddirectionstart']) {
			$errWindDirectionStart = 'Please enter the wind direction at the start of the race';
		}
		
		// Check if wind direction end has been entered
		if (!$_POST['winddirectionend']) {
			$errWindDirectionEnd = 'Please enter the wind direction at the end of the race';
		}
		
		// Check if wind speed start has been entered
		if (!$_POST['windspeedstart']) {
			$errWindSpeedStart = 'Please enter the wind speed at the start of the race';
		}
		
		// Check if wind speed end has been entered
		if (!$_POST['windspeedend']) {
			$errWindSpeedEnd = 'Please enter the wind speed at the end of the race';
		}
		
		// Check if rake has been entered
		if (!$_POST['rake']) {
			$errRake = 'Please enter the mast rake';
		}
		
		// Check if wave conditions has been entered
		if (!$_POST['waveconditions']) {
			$errWaveConditions = 'Please enter the wave conditions';
		}
		
		//Check if comments have been entered
		if (!$_POST['comments']) {
			$errComments = 'Please enter some comments';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// If there are no errors, submit the data
if (!$errDate && !$errWindDirectionStart && !$errWindDirectionEnd && !$errWindSpeedStart && !$errWindSpeedEnd && !$errRake && !$errWaveConditions && !$errComments && !$errHuman) 
{
	$Insert_entry = "INSERT INTO race_information VALUES('','$date','$boat','$winddirectionstart','$winddirectionend','$windspeedstart','$windspeedend','$rake','$waveconditions','$comments')";
	
	if (mysql_query ($Insert_entry))		
	{
		$result='<div class="alert alert-success">All data has been inputted!</div>';
	} 
	else 
	{
		$result='<div class="alert alert-danger">Sorry there was an error. Please try again.</div>';
	}
}
	}
?>

<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Contact Form Example</h1>
				<form class="form-horizontal" role="form" method="post" action="import_race_information.php">
                
					<div class="form-group">
						<label for="date" class="col-sm-2 control-label">Date</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($_POST['date']); ?>">
							<?php echo "<p class='text-danger'>$errDate</p>";?>
						</div>
					</div>
                    
					<div class="form-group">
						<label for="winddirectionstart" class="col-sm-2 control-label">Wind Direction At Start</label>
						<div class="col-sm-10">
							<input type="winddirectionstart" class="form-control" id="winddirectionstart" name="winddirectionstart" placeholder="000" value="<?php echo htmlspecialchars($_POST['winddirectionstart']); ?>">
							<?php echo "<p class='text-danger'>$errWindDirectionStart</p>";?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="winddirectionend" class="col-sm-2 control-label">Wind Direction At End</label>
						<div class="col-sm-10">
							<input type="winddirectionend" class="form-control" id="winddirectionend" name="winddirectionend" placeholder="000" value="<?php echo htmlspecialchars($_POST['winddirectionend']); ?>">
							<?php echo "<p class='text-danger'>$errWindDirectionEnd</p>";?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="windspeedstart" class="col-sm-2 control-label">Wind Speed At Start</label>
						<div class="col-sm-10">
							<input type="windspeedstart" class="form-control" id="windspeedstart" name="windspeedstart" placeholder="0 Knots" value="<?php echo htmlspecialchars($_POST['windspeedstart']); ?>">
							<?php echo "<p class='text-danger'>$errWindSpeedStart</p>";?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="windspeedend" class="col-sm-2 control-label">Wind Speed At End</label>
						<div class="col-sm-10">
							<input type="windspeedend" class="form-control" id="windspeedend" name="windspeedend" placeholder="0 Knots" value="<?php echo htmlspecialchars($_POST['windspeedend']); ?>">
							<?php echo "<p class='text-danger'>$errWindDirectionEnd</p>";?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="rake" class="col-sm-2 control-label">Rake</label>
						<div class="col-sm-10">
							<input type="rake" class="form-control" id="rake" name="rake" placeholder="" value="<?php echo htmlspecialchars($_POST['rake']); ?>">
							<?php echo "<p class='text-danger'>$errRake</p>";?>
						</div>
					</div>
                    
					<div class="form-group">
						<label for="waveconditions" class="col-sm-2 control-label">Wave Conditions</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="waveconditions"><?php echo htmlspecialchars($_POST['waveconditions']);?></textarea>
							<?php echo "<p class='text-danger'>$errWaveConditions</p>";?>
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="comments" class="col-sm-2 control-label">Comments</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="comments"><?php echo htmlspecialchars($_POST['comments']);?></textarea>
							<?php echo "<p class='text-danger'>$errComments</p>";?>
						</div>
					</div>
                    
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div> 

<!-- END OF CONTENT HERE -->

<br />
<br />

<!-- Back To Top -->
<?php include 'Includes/Back-To-Top.php'; ?>

<br />
<br />

<!-- Site footer -->
<?php include 'Includes/Footer.php'; ?>
      
</div> 
<!-- END OF MAIN CONTENT AREA -->

</body>
</html>
