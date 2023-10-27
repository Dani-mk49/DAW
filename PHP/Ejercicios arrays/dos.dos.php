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

    .centro {
      background-color: white;
      width: 650px;
      padding: 5px;
      padding-left: 100px;
      padding-top: 5px;
      padding-bottom: 10px;
      margin: 0 auto;

      justify-content: center;
    }
    table{
      border: 1px solid black;
    }
    td{
      border: 1px solid black;
      padding: 25px 25px 25px 25px;
    }
  </style>
</head>

<body>
  <div class="arriba">
    <h1>ARRAYS ASOCIATIVOS</h1>
  </div>
  <div class="centro">
    <?php
    $localidades = ["Palencia" => 80000, "Valladolid" => 350000, "Oviedo" => 120000, "Madrid" => 3320000, "Barcelona" => 1620000, "Zaragoza" => 666880, "Soria" => 39112, "Huesca" => 52463, "Teruel" => 35691];

    hacerTabla("DATOS DEL ARRAY RECIBIDO", $localidades);
    print '<br>';
    asort($localidades);
    hacerTabla("DATOS DEL ARRAY ORDENADOS POR VALOR", $localidades);
    function hacerTabla($titulo, $array)
    {
        print '<p align="center">' . $titulo . '</p>';
        print '<table align="center">';
        print '<tr>';
        print '<th>INDICE</th>';
        print '<th>VALOR</th>';
        print '</tr>';
        foreach($array as $i=>$v) {
            print '<tr>';
            print '<td>'. $i . '</td>';
            print '<td>'. $v .'</td>';
            print '</tr>';
        }
        print '<t/able>';
    }
    ?>
  </div>
</body>
</html>
