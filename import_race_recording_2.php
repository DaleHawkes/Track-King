<?php

require_once('connect.php');

$errHuman ="";

$result ="";

	if ($_POST["submit"]) 
	{
		
		//$human = intval($_POST['human']);
	
		//Check if simple anti-bot test is correct
		//if ($human !== 5) {
		//	$errHuman = 'Your anti-spam is incorrect';
		//}

// If there are no errors, submit the data
//if (!$errHuman) 
//{
	//If we have received a submission.
				$goodtogo = true;
				//Check for a blank submission.
				try {
					if ($_FILES['csvfile']['size'] == 0){
						$goodtogo = false;
						throw new exception ("Sorry, you must upload an CSV file.");
					}
				} catch (exception $e) {
					echo $e->getmessage();
				}
				//Check for the file size.
				try {
					if ($_FILES['csvfile']['size'] > 1000000){
						$goodtogo = false;
						//Echo an error message.
						throw new exception ("Sorry, the file is too big at approx: " . intval ($_FILES['csvfile']['size'] / 1000) . "KB");
					}
				} catch (exception $e) {
					echo $e->getmessage();
				}
				//Ensure that we have a valid mime type.
				$allowedmimes = array ("text/csv", "text/comma-separated-values", "application/vnd.ms-excel");
				try {
					if (!in_array ($_FILES['csvfile']['type'],$allowedmimes)){
						$goodtogo = false;
						throw new exception ("Sorry, the file must be of type .csv.  Yours is: " . $_FILES['csvfile']['type'] . "");
					}
				} catch (exception $e) {
					echo $e->getmessage ();
				}
				//If we have a valid submission, move it, then show it.
								
				if ($goodtogo){
					try {
						if (!move_uploaded_file ($_FILES['csvfile']['tmp_name'],"H:/EasyPHP-12.1/www/my portable files/Track-King/".$_FILES['csvfile']['name'].".csv"))
						// Taken out /Uploads from file path
						{
							$goodtogo = false;
							throw new exception ("There was an error moving the file.");
						}
					} catch (exception $e) {
						echo $e->getmessage ();
					}
				}
				if ($goodtogo)
				{
					//Display the new csvfile.
					echo "<b>File Uploaded </b>";
                    echo $_FILES['csvfile']['name'];
					echo "<br><br>";
					
					ini_set('max_execution_time', 600); //300 seconds = 5 minutes - 600 = 10 minutes. Over 4000 GPS points on 5 minutes the import fails

					require_once ('connect.php');

						//if (mysql_select_db("gps_tracker",$db))
 	
					     $handle = fopen($_FILES['csvfile']['name'] . '.csv', "r");
	 
						     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) // $data is the array
     						{
							//#######################################################################################
							echo "Point: " . $data[0] . "<br/>";
							echo "Latitude: " . $data[1] . "<br/>";
							echo "Longitude: " . $data[2] . "<br/>";
							echo "Bearing: " . $data[3] . "<br/>";
							echo "Speed: " . $data[4] . "<br/>";
							echo "Time: " . $data[5] . "<br/>";
							echo "<hr>";
				
							$import= "INSERT INTO race_recording(Point,Latitude,Longitude,Bearing,Speed,Time) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
		
		       				mysql_query($import) or die(mysql_error());
							//########################################################################################
							} // End of while loop
						}
					}
	
					if (mysql_query ($import))		
					{
						$result='<div class="alert alert-success">All data has been inputted!</div>';
					} 
					else 
					{
						$result='<div class="alert alert-danger">Sorry there was an error. Please try again.</div>';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width-device-width, initial-scale=1" />

<title>Import Race Data - Track King</title>
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

<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Submit Your Race Data</h1>
				<form class="form-horizontal" role="form" method="post" action="import_race_recording_2.php">
                
                <?php echo $result; ?>
                
                	<div class="form-group">
						<label for="csvfile" class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
                        	<input type="file" class="form-control" id="csvfile" name="csvfile"/>
						</div>
					</div>
 
					<div class="form-group">
						<label for="human" class="col-sm-4 control-label">2 + 3 = ?</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-2">	
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
