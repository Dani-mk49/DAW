<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (($_GET["numero1"]%2) === 0){
        echo "Es par";
    }else{
        echo "Es impar";
    }
    ?>
</body>
</html>