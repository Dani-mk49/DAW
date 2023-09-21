<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $val = rand(0, 500);
    echo $val;
    switch ($val) {
        case $val <= 100:
            print "<br>está entre 0 y 100";
            break;
        case $val <= 200:
            print "<br>está entre 100 y 200";
            break;
        case $val <= 300:
            print "<br>está entre 200 y 300";
            break;
        case $val <= 400:
            print "<br>está entre 300 y 400";
            break;
        case $val <= 500:
            print "<br>está entre 400 y 500";
            break;
    }
    ?>
</body>
</html>