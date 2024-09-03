<?php

	$host		=	"localhost"; 			// Host name
	$username	=	"root"; 		// Mysql username
	$password	=	""; 				// Mysql password
	$db_name	=	"sms"; 	// Database name

	$site_url			= "https://localhost/sms";
	$dashboard_url		= "https://localhost/sms/dashboard";
	$site_sms 			= "01711626539";
	$sms_sender_number 	= "8809610991236";
	


// Connect to the database server and select databse.
	$con = mysqli_connect("$host", "$username", "$password","$db_name");
	if (mysqli_connect_errno()){
	  die ("Failed to connect to mysqli: " . mysqli_connect_error());
	}

mysqli_query($con,"SET CHARACTER SET utf8");
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");
date_default_timezone_set('Asia/Dhaka');
?>