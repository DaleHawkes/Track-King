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
 
            <h1>Import Race Recording</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
<br />

<!-- ENTER OUR CONTENT HERE -->

		<?php
		
			//If we have received a submission.
			if ($_POST['submitted'] == "yes"){
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
						 //$handle = fopen($_FILES['csvfile']['name'], "r", "/Uploads/")
	 
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
					
					//Display the new image.
					//<img src="uploads/<?php echo $_FILES['image']['name'] . ".jpg";/>
				}
				?><br /><a href="import_race_recording.php">Try Again</a><?php
			}
			//Only show the form if there is no submission.
			if ($_POST['submitted'] != "yes"){
				?>
					<form action="import_race_recording.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="submitted" value="yes" />
					<label for="csvfile">File Upload:</label>
                    <br />
                    <input name="csvfile" type="file" id="csvfile" class="btn btn-default"/>
                    <br />
                    <label for="password">Password:</label>
    				<input type="password" class="form-control" id="password" placeholder="Enter Password">
                    <br />
					<input type="submit" value="Submit" style="margin-top: 10px;" class="btn btn-primary">
					</form>
				<?php
			}
		?>

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
