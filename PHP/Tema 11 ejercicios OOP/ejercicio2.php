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
    </style>
  <body>
    <?php include 'header2.php'; ?>
    <div class="contenedorCentral">
      <?php include 'nav.php'; ?>
      <main>
        <?php
        $menu;
        if (!isset($_SESSION["menu"])) {
          $menu = unserialize($_SESSION["menu"]);
        }
?>
      <h2 class="ejercicioX">Configuración del menú del día</h2>
      <br>
      <h3></h3>
<?php
if(!$_REQUEST) {
    ?>
<form action="ejercicio2.php" method="get">
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
<?php
}else{
  $menu = new Menu($_REQUEST["diaSemana"], $_REQUEST["fecha"]);
  echo $menu->getDia();
  $_SESSION["menu"] = serialize($menu);
}
?>
</form>

      </main>
      <?php include 'aside.php'; ?>
      </div>
      <?php include 'footer.php'; ?>
    </body>
</html>