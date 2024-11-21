
<?php
include_once 'backend.php';
global $doclines;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sant'ADEM</title>
    <script src="script.js"></script>
    <style>
        body{
            background: cornflowerblue;
            font-family: sans-serif;
            text-align: center;
        }
        input[type="submit"]{
            font-size: inherit;
            background: #82a7e8;
            padding: 4px;
            border-radius: 8px;
            cursor: pointer;
            border: solid 2px #517cc8;
        }
        option, select{
            background: #82a7e8;
            font-size: inherit;
            outline: none;
            border-radius: 8px;
            border: solid 2px #517cc8;
        }
    </style>
</head>
<body>
    <h1>Sant'ADEM 2024</h1>
    <form method="get" action="/">
        <h2><label for="profile">T'es qui? </label></h2>
        <h2><select name="profile" id="profile">
            <?php
                shuffle($doclines);
                foreach ($doclines as $line){
                    $line = explode(',', $line);
                    echo '<option value="'.$line[1].'">'.$line[1].'</option>';
                }
            ?>
        </select></h2>
        <h2><input type="submit" value="Ouvrir"></h2>
    </form>
</body>
</html>