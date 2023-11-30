<!DOCTYPE html>
<html lang="es">
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

    #container {
      background-color: white;
      width: 80%;
      padding: 5px;
      margin: 0 auto;
      height: 100vh;
      text-align: center;
    }

  </style>
</head>
<body>
  <div class="arriba">
    <h1>REPASO 1ª EVALUACION</h1>
  </div>
  <div id="container">
    <h2>DNI</h2>
    <?php
      if (!$_REQUEST) {?>
        <form action="ejercicio 1.php" method="GET">
        <input type="text" name="DNI" pattern="[0-9]{8}[[A-H][J-N][P-T][V-Z]]{1}" required="required">
        <input type="submit" value="Enviar">
</form>
      <?php
      } else {
          if(comprobar($_REQUEST['DNI'])) {
              print '<h1>EL DNI ES CORRECTO</h1>';
          } else {
              print '<h1>EL DNI NO ES CORRECTO :(</h1>';
          }
          print '<br><a href="ejercicio 1.php">VOLVER</a>';
      }
    ?>
    <br>
    <br>
    <br>
    <a href="index.html">Volver Al inicio</a>
  </div>
</body>
<?php
function comprobar($DNI)
{
    $letras    = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    $DNINumero = substr($DNI, 0, 8);
    $DNILetra  = substr($DNI, 8, 1);
    return ($letras[$DNINumero % 23] == $DNILetra);
}
?>
</html>
