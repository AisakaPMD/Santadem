<?php

include_once 'backend.php';
global $doclines;

$_POST = json_decode(file_get_contents('php://input'), true);

// Body is a JSON Object containing email => answer pairs

header('HTTP/1.1 200 OK');
header('Content-Type: text/plain');
foreach ($_POST as $key => $value) {
    // print("INFO: Inserting data of $key ...\n");
    $ui = ckicetemail($key);
    if($ui !== -1){
        $monid = explode(',', $doclines[$ui])[6];
        file_put_contents($monid . '.lst', $value);
        // print("INFO: Done\n");
    }else{
        // print("WARN: User $key not found!\n");
    }
}
// print("INFO: Finished inserting data.\n");
die(0);