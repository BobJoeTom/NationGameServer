<?php
/**
 * Returns whether or not the nation requested exists, as a boolean.
 */
include '../authorize.php';

if(!authorize()){
    exit();
}

if(isset($_GET['name'])){

    $name = $_GET['name'];

    if(file_exists('../../nations/'.$name.'/')){
        echo 'true';
    }else{
        echo 'false';
    }

}

?>