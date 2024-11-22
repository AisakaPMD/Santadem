<?php

$docu = 'users.csv';
$doccontent = file_get_contents($docu);
$doclines = explode("\n", $doccontent);
array_shift($doclines); // Remove headers


function randomOffset($initial, $arrlen){
    return ($initial + 14 /*5678*/) % $arrlen;
}


function cepourki($mwa){
    global $doclines;
    $myind = jsuiski($mwa);
    if($myind == -1) return -1;
    else return explode(',', $doclines[randomOffset($myind, sizeof($doclines))]);
}
function jsuiski($mwa){
    global $doclines;
    $index = 0;
    foreach ($doclines as $line) {
        $lineelems = explode(",", $line);
        if(strtolower($lineelems[1]) == strtolower($mwa) ||
            preg_match("/^(.*)".$mwa."(.*)$/iu", $lineelems[1])){
            return $index;
        }
        $index++;
    }
    return -1;
}

function ckicetemail($mail){
    global $doclines;
    $index = 0;
    foreach ($doclines as $line) {
        $lineelems = explode(",", $line);
        if(strtolower($lineelems[2]) == strtolower($mail) ||
            preg_match("/^(.*)".$mail."(.*)$/iu", $lineelems[2])){
            return $index;
        }
        $index++;
    }
    return -1;
}
