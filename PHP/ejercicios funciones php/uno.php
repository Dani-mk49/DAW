<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      padding: 0;
      margin: 0;
      background-color: grey;
    }

    .arriba {
      display: flex;
      background-color: black;
      color: white;
      justify-content: center;
      align-items: center;
      align: center;
      height: 100px;
    }

    h1 {
      margin: 0;
    }

    form {
      background-color: white;
      width: 650px;
      padding: 5px;
      padding-left: 100px;
      margin: 0 auto;
      height: 100%;
    }
    table, td{
        border-collapse: collapse;
        border: 2px solid black;
    }
  </style>
</head>

<body>
  <div class="arriba">
    <h1>CUESTIONARIO</h1>
  </div>
  <form action="dos.php" method="post">
    <?php
    hacerTabla(5, 7, "TABLA HTML DE 5 X 7");
    hacerTabla(10, 10, "TABLA HTML DE 10 X 10");
    hacerTabla(6, 3, "TABLA HTML DE 6 X 3");
    hacerTabla(2, 15, "TABLA HTML DE 2 X 15");
    function hacerTabla($filas, $columnas, $titulo)
    {
        print "<div>";
        $autocount = 1;
        print "<p>$titulo</p>";
        print '<table>';
        for($i = 0; $i < $filas; $i++) {
            print "<tr>";
            for($x = 0; $x < $columnas; $x++) {
                print "<td>$autocount</td>";
                $autocount++;
            }
            print "</tr>";
        }
        print "</table>";
        print "</div>";
    }
    ?>
  </form>
</body>
</html>
