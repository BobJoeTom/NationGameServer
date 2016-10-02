<?php
/**
 * Used to create a nation.
 */
include '../authorize.php';

if(!authorize()){
    exit();
}

if(isset($_GET['name'])){
    $name = $_GET['name'];

    if(!file_exists('../../nations/'.$name.'/')) {
        mkdir('../../nations/' . $name . '/');
        copy('../../example/nations/Example/nation.json', '../../nations/' . $name . '/nation.json');
        $jsonString = file_get_contents('../../nations/' . $name . '/nation.json');
        $data = json_decode($jsonString, true);
        $data['name'] = $name;
        $updatedJson = json_encode($data);
        file_put_contents('../../nations/' . $name . '/nation.json', $updatedJson);
        echo 'success';
    }
}

?>