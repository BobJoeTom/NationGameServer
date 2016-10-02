<?php
/**
 * Used to create a faction.
 */
include '../authorize.php';

if(!authorize()){
    exit();
}

if(isset($_GET['name']) && isset($_GET['nation'])){
    $name = $_GET['name'];
    $nation = $_GET['nation'];

    if(!file_exists('../../nations/'.$nation.'/factions/')) {
        mkdir('../../nations/'.$nation.'/factions/');
        copy('../../example/nations/Example/factions/example.json', '../../nations/' . $nation . '/factions/' . $name . '.json');
        $jsonString = file_get_contents('../../nations/' . $nation . '/factions/' . $name . '.json');
        $data = json_decode($jsonString, true);
        $data['name'] = $name;
        $updatedJson = json_encode($data);
        file_put_contents('../../nations/' . $nation . '/factions/' . $name . '.json', $updatedJson);
        echo 'success';
    }
}

?>