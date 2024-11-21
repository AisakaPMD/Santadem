<?php

if(empty($_GET['profile'])){
    header('HTTP/1.1 302 Found');
    header('Location: browse.php');
    die(0);
}
$profile = $_GET["profile"];

include_once "backend.php";

$target = cepourki($profile);
if($target === -1){
    header('HTTP/1.1 302 Found');
    header('Location: browse.php');
    die(0);
}
$lst = explode(";", $target[5]);


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sant'ADEM</title>
    <style>
        body{
            background: cornflowerblue;
            font-family: sans-serif;
            text-align: center;
        }
        #kdos{
            display: inline-flex;
            flex-direction: column;
            border-radius: 8px;
            border: solid 2px #517cc8;
            overflow: clip;
        }
        h3{
            margin-block: 0;
            background: #82a7e8;
            padding: 5px;
        }
        h3:nth-child(2n){
            background: #6c99ea;
        }
        em{
            cursor: help;
        }
    </style>
</head>
<body>
    <h1>Sant'ADEM 2024</h1>
    <h2>Coucou <?php echo $profile; ?> !<br>Cette année, on te propose d'offrir un cadeau à <em title="<?php echo $target[1] . ' ' . $target[0]; ?>"><?php echo $target[1]; ?></em>, voici ses préférences :</h2>
<div id="kdos">
    <?php
    foreach ($lst as $kdo){
        echo '<h3>'.$kdo.'</h3>';
    }
    ?>
</div>
</body>
</html>