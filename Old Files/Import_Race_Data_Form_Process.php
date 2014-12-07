<?php 
//DB Connection
require_once('Connect.php');

$varwaveconditions = mysql_real_escape_string($_POST['waveconditions']);
$varcomments = mysql_real_escape_string($_POST['comments']);

$Insert_entry = "INSERT INTO race_information VALUES
('','$_POST[date]','$_POST[boat]','$_POST[winddirectionstart]','$_POST[winddirectionend]','$_POST[windspeedstart]','$_POST[windspeedend]','$_POST[rake]','$varwaveconditions','$varcomments')";

mysql_query($Insert_entry) or die(mysql_error());

//if (!mysql_query($Insert_entry))
//  {
//  die('Error: ' . mysql_error());
//  }
//echo "1 record added";
 
//mysql_close($con)

?>