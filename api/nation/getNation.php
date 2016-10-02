<?php
/**
 * Returns the whole json object representing the nation, or returns specific properties based on the payload.
 */

include '../authorize.php';

if(!authorize()){
    exit();
}

if(isset($_GET['name'])){
    $name = $_GET['name'];
    if(file_exists('../../nations/'.$name.'/')) {
        if (isset($_GET['property'])) {
            //Return specific property
            $property = $_GET['property'];
            $file = file_get_contents('../../nations/' . $name . '/nation.json');
            $json = json_decode($file, true);
            if (isset($json[$property])) {
                echo $property . ':' . $json[$property];
            }
        } else {
            //Return full json object
            echo file_get_contents('../../nations/' . $name . '/nation.json');
        }
    }
}

?>