<?php
/**
 * Returns whether or not the faction requested exists, as a boolean.
 */
include '../authorize.php';

if(!authorize()){
    exit();
}

if(isset($_GET['name']) && isset($_GET['nation'])){

    $name = $_GET['name'];
    $nation = $_GET['nation'];

    if(file_exists('../../nations/'.$name.'/')){
        if(file_exists('../../nations/'.$nation.'/factions/'.$name.'.json'){
            echo 'true';
            exit();
        }
    }
    echo 'false';
}

?>