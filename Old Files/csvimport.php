<?php  

//database connection details 

$connect = mysql_connect('localhost','root',''); 



if (!$connect) { 

 die('Could not connect to MySQL: ' . mysql_error()); 

 } 



//your database name 

$cid =mysql_select_db('gps_tracker',$connect); 



// path where your CSV file is located 

define('CSV_PATH',''); 



// Name of your CSV file 

$csv_file = CSV_PATH . "samplefile.csv"; 



if (($getfile = fopen($csv_file, "r")) !== FALSE) {  

        $data = fgetcsv($getfile, 1000, ","); 

        while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) { 

         $num = count($data);  

         for ($c=0; $c < $num; $c++) { 

             $result = $data;  

             $str = implode(",", $result);  

             $slice = explode(",", $str); 

             $col1 = $slice[0];  

             $col2 = $slice[1]; 

             $col3 = $slice[2];  
			 
			 $col4 = $slice[3];  
			 
			 $col5 = $slice[4];  
			 
			 $col6 = $slice[5];  
			  

// SQL Query to insert data into DataBase 

$query = "INSERT INTO race_recording(Point,Latitude,Longitude,Bearing,Speed,Time) 

VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."','".$col6."')"; 



$s=mysql_query($query, $connect );  

     } 

   }  

  } 

echo "File data successfully imported to database!!";  

mysql_close($connect);  

?>