<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width-device-width, initial-scale=1" />

<title>Single Race Analysis - Track King</title>
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
<?php //include 'Includes/Sidebar.php'; ?>
<?php include 'Includes/Navigation.php'; ?>

<div class="container"> 

<!-- START OF MAIN CONTENT AREA -->

<!-- Site banner -->       	
    <div class="banner">
        <div class="container">
 
            <h1>Single Race Analysis</h1>
            <p>Here we can look at a Single Race and see how we performed.</p>
        </div>
    </div>
<br />

<!-- ENTER OUR CONTENT HERE -->

<?php

$selecteddate = $_GET["selecteddate"];

require_once('connect.php');

$sql_race_information = "SELECT * FROM race_information WHERE Date = '$selecteddate'";
$result_race_information = mysql_query($sql_race_information)or die(mysql_error());

$race_info = mysql_fetch_array($result_race_information);

echo "Date: $race_info[1]<br>";
echo "Wind Direction at Start: $race_info[3]<br>";
echo "Wind Direction at End: $race_info[4]<br>";
echo "Wind Speed at Start: $race_info[5] knots<br>";
echo "Wind Speed at End: $race_info[6] knots<br>";
echo "Mast Rake: $race_info[7]<br>";
echo "Wave Conditions: $race_info[8]<br>";
echo "Comments: $race_info[9]<br>";

$average_wind_direction = ($race_info[3] + $race_info[4])/2;
echo "<br>Average Wind Direction = $average_wind_direction<br><br>";

$sql = "SELECT * FROM race_recording WHERE Date = '$selecteddate'";
$result = mysql_query($sql)or die(mysql_error());
?>

<div class="table table-responsive">
   <table class="table table-condensed table-striped">
      <thead>
         <tr>
            <th>Point</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Bearing</th>
            <th>Speed (Knots)</th>
            <th>Time</th>
            <th>True Bearing Angle</th>
            <th>Point of Sail</th>
         </tr>
      </thead>
      <tbody>

<?php 
  while($row = mysql_fetch_array($result))
  {
  // Before we close out of PHP, lets define all of our variables so they are easier to remember and work with,
  // you can skip this though if you just want to directly reference each row.
 
  $point     = $row['Point'];
  $latitude  = $row['Latitude'];
  $longitude = $row['Longitude'];
  $bearing   = $row['Bearing'];
  $speed     = $row['Speed'];
  $time      = $row['Time'];
  
  $actualspeed = $speed * 1.94384449; //Lets work out our speed in knots
 
  // Modify ActualSpeed to two decimal places
  $actualspeeddecimal = number_format($actualspeed, 2, '.', '');
  
  //$date_time = $time;
  //list($splitdate, $splittime) = explode('T', $date_time); //We split the first part of the string with the letter T

  // Using ASCII 46 we can remove the full stops from the time variable
  //$splittime = str_replace(chr(46), '', $splittime);
  
  // Lets now work out the actual bearing. What point of sail are we on?
  
  $true_bearing = 360 - ($average_wind_direction - $bearing);
  
	if ($true_bearing > 360)
  	{
	$true_bearing = $true_bearing - 360;    
	}
		
  //Work out point of sail function
  include 'Functions/pointofsail.php';
  
  // Now for each looped row
     
echo "<tr><td>".$point."</td><td>".$latitude."</td><td>".$longitude."</td><td>".$bearing."</td><td>".$actualspeeddecimal."</td><td>".$time."</td><td>".$true_bearing."</td><td>".$pointofsail."</td></tr>";
 
	} // End our while loop
?>
</tbody>
</table>

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
