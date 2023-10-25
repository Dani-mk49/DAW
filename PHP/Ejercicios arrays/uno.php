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
    <?php
if($_REQUEST) {
    $cont = $_POST['contenido'];
    print '<p style="font-weight: bold;">Resultado</p>';
    print '<p>El número introducido ha sido el '. $cont . ' <br>
  y el resto de su division por 12 es '. $cont%12 .'</p>';
}
    ?>
    <form action="uno.php" method="post">
      <p style="font-weight: bold;">Formulario</p>
      <p>Escribe un numero entero positivo</p>
      <input type="number" name="contenido" min="0" required>
      <br>
      <br>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </form>
  </div>
</body>
</html>
