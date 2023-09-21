<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        switch($_GET["numero1"]) {
            case 1:
                print "lunes";
                break;
            case 2:
                print "martes";
                break;
            case 3:
                print "miercoles";
                break;
            case 4:
                print "jueves";
                break;
            case 5:
                print "viernes";
                break;
            case 6:
                print "sabado";
                break;
            case 7:
                print "domingo";
                break;
            default:
                print "el numero tiene que estar entre 1 y 7";
                break;
        }

    switch ($_GET["numero1"]) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:

            echo "<br>es dia laborable";
            break;
        case 6:
        case 7:
            echo "<br>es dia festivo";
        default:
            break;
    }
    ?>
    <br>
    <a href="ejercicio3.html">volver</a>
</body>
</html>