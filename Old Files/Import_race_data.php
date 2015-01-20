<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Import A Race</title>
</head>

<body>
<?php

ini_set('max_execution_time', 600); //300 seconds = 5 minutes - 600 = 10 minutes. Over 4000 GPS points on 5 minutes the import fails

$db = mysql_connect("localhost", "root", "") or die("Could Not Connect.");

if (mysql_select_db("gps_tracker",$db))
 	
     $handle = fopen("samplefile.csv", "r");
	 
     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)//$data is the array
     			{
				//#######################################################################################
				echo "Point: " . $data[0] . "<br/>";
				echo "Latitude: " . $data[1] . "<br/>";
				echo "Longitude: " . $data[2] . "<br/>";
				echo "Bearing: " . $data[3] . "<br/>";
				echo "Speed: " . $data[4] . "<br/>";
				echo "Time: " . $data[5] . "<br/>";
				echo "<hr>";
				
				// Now lets convert Speed (Meters per Second to Knots per Second)	
				//$speedknots = $data[7] * 1.9438444924574;
				//echo "Knots: " . $speedknots ."<br/>";
				
				// We now have to split up Date and Time so that we can feed it into 2 database fields
				//$date_time = $data[8];
				//list($date, $time) = explode('T', $date_time); //We split the first part of the string with the letter T
				//echo "Date: $date <br/>";
				
				//echo "Time:" . substr($time, 0, -7) ."<br/>"; //We then remove the last 7 characters from the time
				//echo "<hr>";
				
				$import= "INSERT INTO race_recording(Point,Latitude,Longitude,Bearing,Speed,Time) 
				VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
		
		       	mysql_query($import) or die(mysql_error());
				//########################################################################################
				}
				
?>
</body>
</html>