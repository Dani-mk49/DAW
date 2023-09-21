<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $pi = PI();
    $area = $pi*$_GET["numero1"]**2;
    $longitud = 2*$pi*$_GET["numero1"];
    echo "la longitud es $longitud y el area es $area";
    ?>
</body>
</html>