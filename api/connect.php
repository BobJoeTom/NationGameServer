<?php
/**
 * Used to connect to the database.
 */
	$servername = "localhost";
	$username = "root";
	$password = ")x~9@+FW3{Bu";
	$database = "game";
	
	$db = mysqli_connect($servername, $username, $password, $database);

	if(!$db){
		die("Connection failed: " . mysqli_connect_error());
	}

?>