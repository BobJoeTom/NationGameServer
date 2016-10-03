<?php

/**
 * Trickles power from trickle bank to regular bank of all nations. Should be ran on an interval.
 */

include 'authorize.php';

if(!authorize()){
    exit();
}

foreach(glob('../nations/*' , GLOB_ONLYDIR) as $path){
    $nationFile = $path.'/nation.json';
    $jsonString = file_get_contents($nationFile);
    $data = json_decode($jsonString, true);

    $trickleAmount = 1;

    $oldTrickle = $data['powerTrickle'];
    $oldPower = $data['powerBank'];

    if($oldTrickle < $trickleAmount){
        $newTrickle = 0;
        $newPower = $oldPower + $oldTrickle;
    }else{
        $newTrickle = $oldTrickle -= $trickleAmount;
        $newPower = $oldPower + $trickleAmount;
    }

    $data['powerTrickle'] = $newTrickle;
    $data['powerBank'] = $newPower;

    $updatedJson = json_encode($data);

    file_put_contents($nationFile, $updatedJson);
}

?>