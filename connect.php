<?php

// Set the DB Access Information

//ONLINE
//Define('DB_User','db_user-username');
//Define('DB_Password','db_user_password');
//Define('DB_Host','db_host');
//Define('DB_Name','db_name');

//LOCALHOST
Define('DB_User','root');
Define('DB_Password','');
Define('DB_Host','localhost');
Define('DB_Name','gps_tracker');

//Make the connection

$dbc = mysql_connect(DB_Host, DB_User, DB_Password)OR die ('Could not connect to MySQL:'.mysql_error());

//Select the database

mysql_select_db(DB_Name) OR die ('Could no select the database:'.mysql_error());

?>
