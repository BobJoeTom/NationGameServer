<?php
/**
 * Returns whether or not the player requested exists, as a boolean.
 */
include '../authorize.php';
include '../connect.php';
global $db;

if(!authorize()){
	exit();
}

if(isset($_GET['email'])){
	
	$email = $_GET['email'];
	
	$sql = "SELECT * FROM `players` WHERE `email` = '".$email."'";
	
	$result = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		echo $row["username"];
	}
}
	
?>