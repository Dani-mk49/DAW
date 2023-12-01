<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_basicos.php'; ?>
      <main>
        <a href="index.php">Inicio - Ejercicios Base</a><br>
        <div>
        <?php
        $cantidad = $_REQUEST['cantidad'];
    $moneda       = $_REQUEST['tipo'];
    $dolar        = 1.0563;
    $libra        = 0.8678;
    if ($moneda == 'dolar') {
        $cambio = $cantidad * $dolar;
        print "$cantidad euros equivalen a $cambio dólares estadounidenses.<br>";
    } else {
        $cambio = $cantidad * $libra;
        print "$cantidad euros equivalen a $cambio libras esterlinas.<br>";
    }
    ?>
        <br><a href="ejer2form.php">Volver a pedir nueva conversión</a>
        </div>
    </main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>