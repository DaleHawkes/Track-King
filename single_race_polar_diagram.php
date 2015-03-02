<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width-device-width, initial-scale=1" />

<title>Single Race Polar Diagram - Track King</title>
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
 
            <h1>Single Race Polar Diagram</h1>
            <p>Here we can look at a race by bearings and see how we did</p>
        </div>
    </div>
<br />

<?php

require_once('connect.php');

$sql = "SELECT Date FROM race_information WHERE Boat = 'Ultra Violet'";
$result = mysql_query($sql)or die(mysql_error());

echo "<table border='0'><tr><th style='width: 200px;'>Single Race Polar Diagram</th></tr>"; 
 
  while($row = mysql_fetch_array($result)){
  // Before we close out of PHP, lets define all of our variables so they are easier to remember and work with,
  // you can skip this though if you just want to directly reference each row.
 
  $date = $row['Date'];
  
  $selecteddate = $date;
 
// Now for each looped row

echo "<td><a href='single_race_polar_diagram_data.php?selecteddate=$selecteddate'>".$date."</a></td>";
echo "</tr>";

} // End our while loop
echo "</table>";

mysql_close($dbc);

?>

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
