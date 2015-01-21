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

echo "<h4>Ultra Violet Racing Dates</h4>";
echo "<table border='0'><tr><th style='width: 200px;'>Single Race Analysis</th><th style='width: 200px;'>Single Race Polar Diagram</th></tr>"; 
 
  while($row = mysql_fetch_array($result)){
  // Before we close out of PHP, lets define all of our variables so they are easier to remember and work with,
  // you can skip this though if you just want to directly reference each row.
 
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

0 to 2 Knots
<br />
2 to 4 Knots
<br />
4 to 6 Knots
<br />
6 to 8 Knots
<br />
8 to 10 Knots
<br />
10 to 12 Knots
<br />
12 to 14 Knots
<br />
14 to 16 Knots
<br />
16 to 18 Knots
<br />
18 to 20 Knots
<br />
20 to 22 Knots
<br />
22 to 24 Knots
<br />
<br />
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porta et justo sit amet mollis. Morbi congue consequat mauris, in vehicula tortor imperdiet imperdiet. Fusce vel lacinia felis. Vestibulum accumsan fringilla dui sit amet pellentesque. Fusce neque nulla, ullamcorper in accumsan in, fermentum quis nibh. Duis posuere libero eu luctus euismod. Maecenas vehicula erat eu justo sodales, vel dignissim nulla tempor. Duis in nisl hendrerit metus tristique varius vel ac risus. Praesent elementum eros quis dui molestie, fringilla rutrum sapien posuere. Mauris fringilla urna quis urna facilisis vestibulum.
<br /><br />
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse suscipit a tellus id lacinia. In nec placerat est. Pellentesque commodo quam ornare odio maximus sodales. Quisque lacus urna, malesuada at risus eu, dictum semper nisi. Suspendisse commodo dui tortor, sit amet aliquet dolor aliquam nec. Praesent eget elit vel magna vestibulum bibendum sed ut nulla. Curabitur at venenatis nulla. Curabitur varius augue leo, sed vehicula nulla mollis a. Vestibulum volutpat auctor ipsum, interdum malesuada odio dictum in. Suspendisse sit amet risus at urna fringilla feugiat sit amet id tortor.
<br /><br />
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse suscipit a tellus id lacinia. In nec placerat est. Pellentesque commodo quam ornare odio maximus sodales. Quisque lacus urna, malesuada at risus eu, dictum semper nisi. Suspendisse commodo dui tortor, sit amet aliquet dolor aliquam nec. Praesent eget elit vel magna vestibulum bibendum sed ut nulla. Curabitur at venenatis nulla. Curabitur varius augue leo, sed vehicula nulla mollis a. Vestibulum volutpat auctor ipsum, interdum malesuada odio dictum in. Suspendisse sit amet risus at urna fringilla feugiat sit amet id tortor.

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
