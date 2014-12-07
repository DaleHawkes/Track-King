<?php  

//connect to the database 
$connect = mysql_connect("localhost","root",""); 
mysql_select_db("gps_tracker",$connect); //select the table 
// 

if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) 
			{ 
				echo "Point: " . $data[1] . "<br/>";
				echo "Latitude: " . $data[2] . "<br/>";
				echo "Longitude: " . $data[3] . "<br/>";
				echo "Bearing: " . $data[5] . "<br/>";
				echo "Speed: " . $data[7] . "<br/>";
				
				// Now lets convert Speed (Meters per Second to Knots per Second)	
				$speedknots = $data[7] * 1.9438444924574;
				echo "Knots: " . $speedknots ."<br/>";
				
				// We now have to split up Date and Time so that we can feed it into 2 database fields
				$date_time = $data[8];
				list($date, $time) = explode('T', $date_time); //We split the first part of the string with the letter T
				echo "Date: $date <br/>";
				
				echo "Time:" . substr($time, 0, -7) ."<br/>"; //We then remove the last 7 characters from the time
				echo "<hr>";
				
				$import= "INSERT IGNORE INTO race_recording(Point,Latitude,Longitude,Bearing,Speed) 
				VALUES ('$data[1]','$data[2]','$data[3]','$data[5]','$data[7]')";
		
		       	mysql_query($import) or die(mysql_error());

        	} 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

    //redirect 
    header('Location: import.php?success=1'); die; 

} 

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import a CSV File with PHP & MySQL</title> 
</head> 

<body> 

<?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html>