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
 
            <h1>Track King</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
<br />

<!-- ENTER OUR CONTENT HERE -->

<div style="width: 500px; text-align: left;">
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
					if ($_FILES['csvfile']['size'] > 500000){
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
						if (!move_uploaded_file ($_FILES['csvfile']['tmp_name'],"H:/EasyPHP-12.1/www/my portable files/Track-King/Uploads/".$_FILES['csvfile']['name'].".csv")){
							$goodtogo = false;
							throw new exception ("There was an error moving the file.");
						}
					} catch (exception $e) {
						echo $e->getmessage ();
					}
				}
				if ($goodtogo){
					//Display the new csvfile.
					?>File Uploaded <?php echo $_FILES['csvfile']['name']; ?>
					<?php
				}
				?><br /><a href="import_race_recording.php">Try Again</a><?php
			}
			//Only show the form if there is no submission.
			if ($_POST['submitted'] != "yes"){
				?>
<form action="import_race_recording.php" method="post" enctype="multipart/form-data">
					<p>Example:</p>
					<input type="hidden" name="submitted" value="yes" />
					File Upload (.csv only, 500KB Max):<br /> <input name="csvfile" type="file" id="csvfile" /><br />
					<input type="submit" value="Submit" style="margin-top: 10px;" />
				</form>
				<?php
			}
		?>
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
