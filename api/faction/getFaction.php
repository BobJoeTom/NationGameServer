<?php
/**
 * Returns the whole json object representing the faction, or returns specific properties based on the payload.
 */

include '../authorize.php';

if(!authorize()){
	exit();
}

if(isset($_GET['name']) && isset($_GET['nation'])){
	$name = $_GET['name'];
	$nation = $_GET['nation'];
	if(isset($_GET['property'])){
		//Return specific property
		$property = $_GET['property'];
		$file = file_get_contents('../../nations/'.$nation.'/factions/' .$name. '.json');
		$json = json_decode($file, true);
		if(isset($json[$property])){
			echo $property.':'.$json[$property];
		}
	}else{
		//Return full json object
		echo file_get_contents('../../nations/'.$nation.'/factions/' .$name. '.json');
	}
}

?>