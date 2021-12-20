<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'anniashields607');
	define('DB_DATABASE', 'cics-port');
	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	 if(mysqli_connect_errno()){
	 	die("Could not connect ". mysqli_error());
	 }
?>