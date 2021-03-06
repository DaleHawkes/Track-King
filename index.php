<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width-device-width, initial-scale=1" />

<title>Track King Index</title>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link href="CSS/style.css" rel="stylesheet">

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

<br />
<h3>Import Data</h3>
<br />
<a href="import_race_recording.php">NEW Import Race Recording - File Upload Version</a><br />
<a href="import_race_information.php">NEW Import Race Information (Actual race info like wind speed, mast rake etc)</a><br />
<h3>Single Race Analysis</h3>
<br />
<?php

require_once('connect.php');

$sql = "SELECT Date FROM race_information WHERE Boat = 'Ultra Violet'";
$result = mysql_query($sql)or die(mysql_error());

echo "<table border='0'><tr><th style='width: 200px;'>Single Race Analysis</th><th style='width: 200px;'>Single Race Polar Diagram</th></tr>";

  while($row = mysql_fetch_array($result))
  {

  $date = $row['Date'];

  $selecteddate = $date;

// Now for each looped row

echo "<td><a href='single_race_analysis_data.php?selecteddate=$selecteddate'>".$date."</a></td>";
echo "<td><a href='single_race_polar_diagram_data.php?selecteddate=$selecteddate'>".$date."</a></td>";
echo "</tr>";

    } // End our while loop
echo "</table>";

mysql_close($dbc);

?>
<h3>Polar Diagrams For Multiple Races</h3>

<!--
<a href='polar_diagram_data.php?windspeed=0 to 2'>0 to 2 knots</a><br />
<a href='polar_diagram_data.php?windspeed=2 to 4'>2 to 4 knots</a><br />
<a href='polar_diagram_data.php?windspeed=4 to 6'>4 to 6 knots</a><br />
<a href='polar_diagram_data.php?windspeed=6 to 8'>6 to 8 knots</a><br />
<a href='polar_diagram_data.php?windspeed=8 to 10'>8 to 10 knots</a><br />
<a href='polar_diagram_data.php?windspeed=10 to 12'>10 to 12 knots</a><br />
<a href='polar_diagram_data.php?windspeed=12 to 14'>12 to 14 knots</a><br />
<a href='polar_diagram_data.php?windspeed=14 to 16'>14 to 16 knots</a><br />
<a href='polar_diagram_data.php?windspeed=16 to 18'>16 to 18 knots</a><br />
<a href='polar_diagram_data.php?windspeed=18 to 20'>18 to 20 knots</a>
-->
<h3>The Upload Process</h3>
<ul>
<li>Open the CSV MyTracks file</li>
<li>Delete the following columns, Segment, Altitude, Accuracy, Power, Cadence and Heart Rate</li>
<li>Delete the first 4 rows in the file</li>
<li>Also delete any rows that have no data in the speed column</li>

</ul>
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
