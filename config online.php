<?php   
	$dbhost = "sql212.epizy.com"; //server name localhost or 127.0.0.1
	$dbuser = "epiz_31674227";      //User name default root 
	$dbpass = "hTtabFPRGEN";  //Password reset at start of uniserver yours is "root"
	$dbname = "epiz_31674227_taxiCabPlymouth";      //Database name

	$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname); 		//database connection
	if(!$db) {die("Error connecting to Database");}
?>