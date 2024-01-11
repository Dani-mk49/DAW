<!DOCTYPE html>
<html lang="es">
    <?php include 'metadata.php'; ?>
    <?php include 'empleado.php'; ?>
    <style>
    </style>
  <body>
    <?php include 'header.php'; ?>
    <div class="contenedorCentral">
      <?php include 'nav.php'; ?>
      <main>
<?php
//falta de hacer los objetos y hacer el to string dentro del constructor
$empleado1     = new Empleado('Sebastián', 'Arriaga López', 'masculino', '03-11-2000', 'Administrativo', 2000);
    $empleado2 = new Empleado('Amalia', 'Gutierrez Blanco', 'femenino', '03-11-2000', 'Gerente', 2100);
    echo $empleado1;
    echo '<br>';
    echo '<br>';
    echo $empleado2;
    ?>
      </main>
      <?php include 'aside.php'; ?>
      </div>
      <?php include 'footer.php'; ?>
    </body>
</html>
