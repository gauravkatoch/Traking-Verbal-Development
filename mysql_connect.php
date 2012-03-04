<?php 

// This file contains the database access information. 
// This file also establishes a connection to MySQL 
// and selects the database.

// Set the database access information as constants:
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');


// Make the connection:
$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
	trigger_error ('Could not connect to MySQL: ');
}
$db=mysql_select_db("library")
or die (mysql_error());

?>