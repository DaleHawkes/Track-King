<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Track King</title>
</head>

<body>
<h1>Track King</h1>
<h3>Import</h3>
<br />
<a href="import_race_data.php">Import Race Recording (File must be called samplefile.csv)</a>
<p><a href="import_race_information_form.php">Import Race Information (Actual race info like wind speed, mast rake etc)</a></p>
<h3>Single Race Analysis</h3>
<br />
<?php

require_once('connect.php');

$sql = "SELECT Date FROM race_information WHERE Boat = 'Ultra Violet'";
$result = mysql_query($sql)or die(mysql_error());

echo "<table border='1'>";
echo "<tr><th>Ultra Violet Racing Dates</th></tr>";
 
  while($row = mysql_fetch_array($result)){
  // Before we close out of PHP, lets define all of our variables so they are easier to remember and work with,
  // you can skip this though if you just want to directly reference each row.
 
  $date = $row['Date'];
  
  $selecteddate = $date;
 
// Now for each looped row
 
echo "<tr><td style='width: 200px;'><a href='analysis.php?selecteddate=$selecteddate'>".$date."</a></td></tr>";
 
} // End our while loop
echo "</table>";

?>
  <br />
  <br />
  <br />
  Polar Diagrams 
<br />
  <br />
</h3>
<p>&nbsp;</p>
</body>
</html>