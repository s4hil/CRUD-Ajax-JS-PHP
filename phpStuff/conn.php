<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "ajaxCrud";


	$conn  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if(mysqli_connect_errno()){

		die ("Connection Failed!". 
		"(".mysqli_connect_error().")"
	);
	}

?>