<?php
/**
 * Sets the specified property of the specified object.
 */
include '../authorize.php';

if(!authorize()){
    exit();
}

if(isset($_GET['name']) && isset($_GET['property']) && isset($_GET['value'])){
    $name = $_GET['name'];
    $property = $_GET['property'];
    $value = $_GET['value'];
    
    $jsonString = file_get_contents('../../nations/'.$name.'/nation.json');
	  $data = json_decode($jsonString, true);
	  if(isset($json[$property])){
	      $data[$property] = $value;
	      $updatedJson = json_encode($data);
	      file_put_contents('../../nations/'.$name.'/nation.json', $updatedJson);   
    }
}

?>