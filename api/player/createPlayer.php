<?php
/**
 * Used to create a player by putting their information into a MySQL database as well as creating a json file
 * representing that player.
 */
include '../authorize.php';
include '../connect.php';
global $db;

if(!authorize()){
	exit();
}

if(isset($_GET['name']) && isset($_GET['email'])){
	$username = $_GET['name'];
	$email = $_GET['email'];
	
	//Player file
	copy('../../example/players/example.json', '../../players/'.$username.'.json');
	$jsonString = file_get_contents('../../players/'.$username.'.json');
	$data = json_decode($jsonString, true);
	$data['username'] = $username;
	$data['email'] = $email;
	$updatedJson = json_encode($data);
	file_put_contents('../../players/'.$username.'.json', $updatedJson);
	
	//Database entry
	
	$sql = "INSERT INTO `players`(`username`, `email`) VALUES ('".$username."','".$email."')";
	if(mysqli_query($db, $sql)){
		echo 'success';
	}
}

?>