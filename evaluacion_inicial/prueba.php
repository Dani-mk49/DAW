<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $var1=$_GET["numero1"];
    $var2=$_GET["numero2"];
    $var3=$var1%$var2;
    echo "El resultado es ", $var3;
    ?>
</body>
</html>