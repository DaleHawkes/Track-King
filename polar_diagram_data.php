<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width-device-width, initial-scale=1" />

<title>Polar Diagram - Track King Index</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet">
<link href="css/sidebar.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function () {
$( "#navbar li" ).hover(function() {
        $(this).find('.activebox').fadeToggle();
});
});
</script>

</head>

<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!-- Site Navigation -->
<?php include 'Includes/Sidebar.php'; ?>
<?php include 'Includes/Navigation.php'; ?>

<div class="container">
<!-- START OF MAIN CONTENT AREA -->

<!-- Site banner -->       	
    <div class="banner">
        <div class="container">
 
            <h1>Polar Diagram</h1>
            <p>Use this page to pull back all data for a certain wind strength. Use the info bar on the left for more information.</p>
        </div>
    </div>
<br />

<!-- ENTER OUR CONTENT HERE -->

<?php

$windspeed = $_GET["windspeed"];

echo " Wind Speed Selected Is: $windspeed Knots<br>";

require_once('connect.php');

$bearing = 0;

$sql_race_information = "SELECT * FROM race_information WHERE WindSpeedStart AND WindSpeedEnd = '$windspeed'"; //we will need to amend this query to be more flexible
$result_race_information = mysql_query($sql_race_information)or die(mysql_error());

$race_info = mysql_fetch_array($result_race_information);

## HERE WE START OUR FOR LOOP TO CREATE THE POLAR DIAGRAM #################################################################################################################################################
for ($for_loop_counter = 0; $for_loop_counter <= 360; $for_loop_counter++)
{
    $average_wind_direction = ($race_info[3] + $race_info[4])/2;

        $sql = "SELECT race_information.*, race_recording.* FROM race_information LEFT JOIN race_recording ON race_information.date = race_recording.date WHERE WindSpeedStart = '$windspeed' AND WindSpeedEnd = '$windspeed' AND Bearing = '$for_loop_counter'";

		$result = mysql_query($sql)or die(mysql_error());

    ?>

		<div class="table table-responsive">
   			<table class="table table-condensed table-striped">
      			<thead>
         			<tr>
            			<!--<th>Point</th>-->
            			<th width=100>Latitude</th>
            			<th width=100>Longitude</th>
                        <!--<th>Wind Speed<br>At Start</th>-->
            			<!--<th>Wind Speed<br>At End</th>-->
                        <th width=100>Date</th>
            			<th>Bearing</th>
            			<th>Speed</th>
            			<!--<th>Time</th>-->
            			<th>Angle of Sail</th>
            			<th>Point of Sail</th>
         			</tr>
      			</thead>
      	<tbody>

	<?php

        while($row = mysql_fetch_array($result))
  		{



  		// Before we close out of PHP, lets define all of our variables so they are easier to remember and work with,
  		// you can skip this though if you just want to directly reference each row.
 
  //$point           = $row['Point'];
  $latitude        = $row['Latitude'];
  $longitude       = $row['Longitude'];
  $date            = $row['Date'];
  $bearing         = $row['Bearing'];
  $speed           = $row['Speed'];
  //$time            = $row['Time'];
  //$WindSpeedStart  = $row['WindSpeedStart'];
  //$WindSpeedEnd    = $row['WindSpeedEnd'];
  
  $actualspeed = $speed * 1.94384449; //Lets work out our speed in knots
 
  // Modify ActualSpeed to two decimal places
  $actualspeeddecimal = number_format($actualspeed, 2, '.', '');

  // Lets now work out the actual bearing. What point of sail are we on?

  $true_bearing = 360 - ($average_wind_direction - $bearing);

  //Work out point of sail function
    include 'Functions/pointofsail.php';

  // Now for each looped row
     
echo "<tr><td>".$latitude."</td><td>".$longitude."</td><td>".$date."</td><td>".$bearing."</td><td>".$actualspeeddecimal."</td><td>".$true_bearing."</td><td>".$pointofsail."</td></tr>";

## WE NEED TO USE THIS SPACE TO ADD UP OUR SPEED AND THEN DEVIDE BY THE TOTAL NUMBER OF ROWS ###################################################################################################################

$averagespeed = $actualspeeddecimal / mysql_affected_rows();

$runningtotal += $averagespeed;

// Modify $runningtotal to two decimal places (This value will get rounded up/down)
  	$runningtotal = number_format($runningtotal, 2, '.', '');

	} // End our WHILE loop

	// We print the average speed here so that we only get one value per table/bearing
	echo "<hr>";
  	echo "<b>Compass Bearing is ".@$bearing."</b><br>";
	echo "Average Speed = ".@$runningtotal." Knots<br>";

	$runningtotal = 0;  // We have to zero runningtotal for the next table to be made
    $bearing = 0;

	} // End our FOR loop


## THIS MARK THE END OF THE FOR LOOP THAT CREATES THE POLAR DIAGRAM TABLE #######################################################################################################################################


?>
</tbody>
</table>
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
