<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "tabla de multiplicar de ", $_GET["numero1"], "<br>";
    print "echo con for<br>";
    for($val = 1; $val <= 10; $val++) {
        echo $_GET["numero1"] * $val, "<br>";
    }
    print "<br>echo con while<br>";
    $val = 1;
    while($val <= 10) {
        echo $_GET["numero1"] * $val, "<br>";
        $val++;
    }
    $val = 1;
    print "<br>echo con do while<br>";
    do {
        echo $_GET["numero1"] * $val, "<br>";
        $val++;
    } while($val <= 10);
    ?>
</body>
</html>