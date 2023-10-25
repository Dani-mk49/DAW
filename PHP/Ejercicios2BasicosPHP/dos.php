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

  </style>
</head>
<?php

$moneda = $_POST["moneda"];
$cambio;
$tipo_moneda;
if ($moneda == "dolares"){
    $cambio = 1.0543;
    $tipo_moneda = "dolares estadounidenses";
}else{
    $cambio = 0.8678;
    $tipo_moneda = "libras esterlinas";
}
$resultado = $_POST["cantidad"] * $cambio;
?>
<body>
  <div class="arriba">
    <h1>CUESTIONARIO</h1>
  </div>
  <form action="dos.php" method="post">
    <p id="result"><?php echo $_POST["cantidad"]; ?> euros equivalen a <?php echo $resultado, " ", $tipo_moneda;?> </p>
    <input type="button" name="volver" onclick="window.location.href='dos.html'" value="Volver">
  </form>
</body>
</html>

