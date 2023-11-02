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
      padding-top: 200px;
      margin: 0 auto;
      height: 85vh;
      justify-content: center;
    }

  </style>
</head>

<body>
  <div class="arriba">
    <h1>CUESTIONARIO</h1>
  </div>
  <div class="centro">
  </div>
</body>
<?php
$cont = [];
function generarArrayAleatorio($rango, $numMin, $numMax)
{
    print "Arrary aleatorio: ";
    for($i = 0; $i < $rango; $i++) {
        $cont[$i] = rand($numMin, $numMax);
    }
    print_r($cont);
}
function eliminarRepetidos($arrayALimpiar)
{
    return array_unique($arrayALimpiar);
}
function calcularMedia()
{
    $contador = 0;
    for($i = 0; $i < count($cont); $i++) {
        $contador = $contador + $cont[$i];
    }
    print $contador / count($cont);
}
function generarArrayAleatorio2()
{
    $aleatorioFull = [];
    print "Arrary aleatorio: ";
    for($i = 0; $i < 50; $i++) {
        $cont[$i] = rand(1, 100);
    }
}
?>
</html>
