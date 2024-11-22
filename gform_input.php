<?php

include_once 'backend.php';
global $doclines;

$_POST = json_decode(file_get_contents('php://input'), true);

// Body is a JSON Object containing email => answer pairs

foreach ($_POST as $key => $value) {
    $ui = ckicetemail($key);
    if($ui !== -1){
        $monid = explode(',', $doclines[$ui])[6];
        file_put_contents($monid . '.lst', $value);
    }
}
header('HTTP/1.1 200 OK');
die(0);