<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Race Recording Import - Take The GPS File and Import</title>
</head>

<body>
<?php

// Find the file
$commafile = "samplefile.csv";

$db = mysql_connect("localhost", "root", "") or die("Could not connect.");

mysql_select_db("gps_tracker",$db);

	$rows = file($commafile);
	for ($i = 0; $i < count ($rows); $i++)
		{
			// We now break the file into its parts
			$exprow = explode (",", $rows[$i]);
				{
				// Now we could import into Database
				
				echo "Point: " . $exprow[1] . "<br/>";
				echo "Latitude: " . $exprow[2] . "<br/>";
				echo "Longitude: " . $exprow[3] . "<br/>";
				echo "Bearing: " . $exprow[5] . "<br/>";
				echo "Speed: " . $exprow[7] . "<br/>";
				
				// Now lets convert Speed (Meters per Second to Knots)	
				$speedknots = $exprow[7] * 1.9438444924574;
				echo "Knots: " . $speedknots ."<br/>";
				
				// We now have to split up Date and Time so that we can feed it into 2 database fields
				$date_time = $exprow[8];
				list($date, $time) = explode('T', $date_time); //We split the first part of the string with the letter T
				echo "Date: $date <br/>";
				
				echo "Time:" . substr($time, 0, -7) ."<br/>"; //We then remove the last 7 characters from the time
				echo "<hr>";
				
					while(! feof($commafile))
  						{
						$import= "INSERT IGNORE INTO race_recording
						(Point,Latitude,Longitude,Bearing,Speed,Date,Time) 
						VALUES
						('$exprow[1]','$exprow[2]','$exprow[3]','$exprow[5]','$exprow[7]','$date','$time')";
		
		       			mysql_query($import) or die(mysql_error());
						}
				}

			}
fclose($file);
			
?>
</body>
</html>