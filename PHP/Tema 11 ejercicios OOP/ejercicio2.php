<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <?php include 'metadata.php'; ?>
    <?php include 'menu.php'; ?>
    <style>
      td{
        padding-left: 15px;
        padding-bottom: 8px;
      }
      h3{
        margin-bottom: 1px;
      }
    </style>
  <body>
    <?php include 'header2.php'; ?>
    <div class="contenedorCentral">
      <?php include 'nav.php'; ?>
      <main>
        <?php
if (isset($_SESSION["menu"])) {
    $menu = unserialize($_SESSION["menu"]);
}
if(!isset($menu) && isset($_REQUEST['diseMenu'])) {
    $menu = new Menu($_REQUEST["diaSemana"], $_REQUEST["fecha"]);
}
?>
<?php
if(!isset($menu)) {
    ?>
  <form action="ejercicio2.php" method="get">
  <h2 class="ejercicioX">Configuración del menú del día</h2>
  <br>
<table>
  <tr>
    <td>
      Día de la semana:
    </td>
    <td>
      <input type="text" name="diaSemana" id="diSem" required>
    </td>
  </tr>
  <tr>
    <td>Fecha:</td>
    <td><input type="date" name="fecha" id="fech" required></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" value="Diseñar menú" name="diseMenu"></td>
  </tr>
</table>
</form>
  <?php
} elseif(isset($menu) && !isset($_REQUEST["carta"])) {

    if(isset($_REQUEST['primerPlato'])) {
        $menu->agregarPrimerPlato($_REQUEST['primerPlato']);
    }
    if(isset($_REQUEST['segundoPlato'])) {
        $menu->agregarSegundoPlato($_REQUEST['segundoPlato']);
    }
    if(isset($_REQUEST['postre'])) {
        $menu->agregarPostre($_REQUEST['postre']);
    }
    $_SESSION["menu"] = serialize($menu);
    print '<h2 class="ejercicioX">Menú del ' . $menu->getDia() . ', ' . $menu->getFecha() . '</h2>';
    ?>

    <form action="ejercicio2.php" method="get">
      <h3>Primeros platos:</h3>
      <?php
    if($menu->getPrimerosplatos()) {
        for($i = 0; $i < count($menu->getPrimerosplatos()); $i++) {
            print $menu->getPrimerosplatos()[$i] . '<br>';
        }
    }
    ?>
  <input type="text" name="primerPlato" style="width: 400px;" required>
  <input type="submit" value="Añadir" name="btnPrimerPlato">
</form>

<form action="ejercicio2.php" method="get">
      <h3>Segundos platos:</h3>
      <?php
    if($menu->getSegundosplatos()) {
        for($i = 0; $i < count($menu->getSegundosplatos()); $i++) {
            print $menu->getSegundosplatos()[$i] . '<br>';
        }
    }
    ?>
  <input type="text" name="segundoPlato" style="width: 400px;" required>
  <input type="submit" value="Añadir" name="btnSegundoPlato">
</form>
  <form action="ejercicio2.php" method="get">
    <h3>Postres:</h3>
    <?php
    if($menu->getPostres()) {
        for($i = 0; $i < count($menu->getPostres()); $i++) {
            print $menu->getPostres()[$i] . '<br>';
        }
    }
    ?>
  <input type="text" name="postre" style="width: 400px;" required>
  <input type="submit" value="Añadir" name="btnPostre">
  <br>
</form>
  <form action="ejercicio2.php" method="get">
    <br>
  <input type="submit" value="Confeccionar carta" name="carta">
</form>

  <?php
} else {
    ?>
    <center>
  <img src="parteDeArriba.jpg" width="350px">
  <h2 class="ejercicioX">Menú del día</h2>
  <?php
    print '<h2 class="ejercicioX">' . $menu->getDia() . ', ' . $menu->getFecha() . '</h2>';
    ?>
    <h3>Primeros platos</h3>
    <?php
    if($menu->getPrimerosplatos()) {
        for($i = 0; $i < count($menu->getPrimerosplatos()); $i++) {
            print $menu->getPrimerosplatos()[$i] . '<br>';
        }
    }
    ?>
    <h3>Segundos platos</h3>
    <?php
    if($menu->getSegundosplatos()) {
        for($i = 0; $i < count($menu->getSegundosplatos()); $i++) {
            print $menu->getSegundosplatos()[$i] . '<br>';
        }
    }
    ?>
    <h3>Postres</h3>    <?php
    if($menu->getPostres()) {
        for($i = 0; $i < count($menu->getPostres()); $i++) {
            print $menu->getPostres()[$i] . '<br>';
        }
    }
    ?>
  <img src="parteDeAbajo.jpg" width="350px">
    </center>
  <?php
  session_destroy();
}
?>

      </main>
      <?php include 'aside.php'; ?>
      </div>
      <?php include 'footer.php'; ?>
    </body>
</html>