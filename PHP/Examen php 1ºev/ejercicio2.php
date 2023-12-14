<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <?php include 'metadata.php'; ?>
    <style>
      tr{
        border-left: 1px solid black;
        border-right: 1px solid black;
      }
    </style>
  <body>
    <?php include 'header.php'; ?>
    <div class="contenedorCentral">
      <?php include 'nav.php'; ?>
      <main>
        <?php
        if (!isset($_SESSION["aciertos"])) {
            $_SESSION["aciertos"] = 0;
        }
        if (!isset($_SESSION["fallos"])) {
            $_SESSION["fallos"] = 0;
        }

        $_SESSION['aciertos'];
$_SESSION['fallos'];
$comunidades = ["Andalucía", "Aragón", "Principado de Asturias",
    "Islas Baleares", "Canarias", "Cantabria", "Castilla y León",
    "Castilla La Mancha", "Cataluña", "Comunidad Valenciana",
    "Extremadura", "Galicia", "Comunidad de Madrid", "Región de
        Murcia", "Comunidad Foral de Navarra", "País Vasco", "La Rioja",
    "Ceuta", "Melilla"];
$capitales = ["Sevilla", "Zaragoza", "Oviedo", "Palma de
        Mallorca", "Santa Cruz de Tenerife y Las Palmas de Gran Canaria",
    "Santander", "Valladolid", "Toledo", "Barcelona", "Valencia",
    "Mérida", "Santiago de Compostela", "Madrid", "Murcia", "Pamplona",
    "Vitoria-Gasteiz", "Logroño", "Ceuta", "Melilla"];

for($i = 0; $i < count($comunidades); $i++) {
    $comunidadesYcapitales[$comunidades[$i]] = $capitales[$i];
}
sort($capitales);
?>
      <h2 class="ejercicioX">EJERCICIO 2</h2>
      <br>
      <h3>Autonomías y capitales</h3>
<p>Esta aplicación es un juego sobre conocimientos de geografia politica de España.</p>
<h3>Enlaza la ciudad con la región a la que pertenece</h3>
<form action="ejercicio2.php" method="get">
  <p>Elige la comunidad autónoma
    <select name="comunidadAutonoma" id="conAuto">
      <?php
  for($i = 0; $i < count($comunidades); $i++) {
      print '<option value="' . $comunidades[$i] . '">' . $comunidades[$i] . '</option>';
  }
?>
    </select>
  </p>
  <p>Elige su capital
    <select name="capital" id="cap">
      <?php
for($i = 0; $i < count($capitales); $i++) {
    print '<option value="' . $capitales[$i] . '">' . $capitales[$i] . '</option>';
}
?>
    </select>
    &nbsp;
    &nbsp;
    <input type="submit" value="Comprobar" name="comprobar">
  </p>
</form>
      <?php
if($_REQUEST) {
    if($comunidadesYcapitales[$_REQUEST['comunidadAutonoma']] == $_REQUEST['capital']) {
        print '<h3>Resultado de la consulta: Acierto</h3>';
        print $_REQUEST['capital'] . ' SI es la capital de la comunidad ' . $_REQUEST['comunidadAutonoma'];
        $_SESSION['aciertos']++;
    } else {
        print '<h3>Resultado de la consulta: Fallo</h3>';
        print $_REQUEST['capital'] . ' NO es la capital de la comunidad ' . $_REQUEST['comunidadAutonoma'];
        $_SESSION['fallos']++;
    }
    print '<p>Llevas ' . $_SESSION['aciertos'] . ' y ' . $_SESSION['fallos'] . ' fallos</p>';
    print '<br>
    <input type="button" value="Volver a empezar" onclick="reiniciar()">';
}
?>
      </main>
      <?php include 'aside.php'; ?>
      </div>
      <?php include 'footer.php'; ?>
    </body>
</html>
<script>
  function reiniciar(){
    window.location.href = "ejercicio2.php";
  }
</script>