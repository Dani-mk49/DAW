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
      padding-top: 10px;
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
    <form action="#">
        <select name="selector" id="selector">
            <option value="F.C. Barcelona">F.C. Barcelona</option>
            <option value="Real Madrid">Real Madrid</option>
            <option value="Atletico Madrid">Atletico Madrid</option>
            <option value="Valencia">Valencia</option>
            <option value="Sevilla">Sevilla</option>
            <option value="Villarreal">Villarreal</option>
            <option value="Málaga">Málaga</option>
            <option value="Español">Español</option>
            <option value="Athletic Bilbao">Athletic Bilbao</option>
            <option value="Celta">Celta</option>
            <option value="Real Sociedad">Real Sociedad</option>
            <option value="Rayo Vallecano">Rayo Vallecano</option>
            <option value="Getafe">Getafe</option>
            <option value="Osasuna">Osasuna</option>
            <option value="Elche">Elche</option>
            <option value="Deportivo">Deportivo</option>
            <option value="Almeria">Almeria</option>
            <option value="Levante">Levante</option>
            <option value="Granada">Granada</option>
            <option value="Zaragoza">Zaragoza</option>
        </select>
        <button type="submit" value="enviar">Comprobar</button>
    </form>
    <?php
   $listaEquipos = ["F.C. Barcelona" => 82, "Real Madrid" => 84, "Atlético Madrid" => 78, "Valencia" => 75, "Sevilla" => 76, "Villarreal" => 60, "Málaga" => 50, "Espanyol" => 47, "Athletic Bilbao" => 55, "Celta" => 51, "Real Sociedad" => 46, "Rayo Vallecano" => 49, "Getafe" => 36, "Osasuna" => 33, "Elche" => 41, "Deportivo" => 38, "Almería" => 29, "Levante" => 37, "Granada" => 35, "Zaragoza" => 32];
    arsort($listaEquipos);
    hacerTabla("DATOS DEL ARRAY ORDENADOS POR VALOR", $listaEquipos);

    function hacerTabla($titulo, $array)
    {
        print '<p align="center">' . $titulo . '</p>';
        print '<table align="center">';
        print '<tr>';
        print '<th>INDICE</th>';
        print '<th>VALOR</th>';
        print '</tr>';
        foreach($array as $i => $v) {
            print '<tr>';
            print '<td>' . $i . '</td>';
            print '<td>' . $v . '</td>';
            print '</tr>';
        }
        print '</table>';
    }
    ?>
  </div>
</body>
</html>
