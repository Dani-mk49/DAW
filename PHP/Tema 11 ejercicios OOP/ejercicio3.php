<!DOCTYPE html>
<html lang="es">
<?php include 'consultas.php'; ?>
<?php include 'metadata.php'; ?>
<style>
  table{
    border: 1px solid black;
    border-collapse: collapse;
    width: 100%;
    margin: 0 auto;
    text-align: center;
  }
  td{
    padding-top: 10px;
    padding-bottom: 10px;
    border: 1px solid black;
  }
  tr:hover {
    background-color: aqua;
  }

</style>

<body>
  <?php include 'header3.php'; ?>
  <div class="contenedorCentral">
    <?php include 'nav.php'; ?>
    <main>

      <h2 class="ejercicioX">EJERCICIO 3</h2>
      <br>
      <h3>Geografía española</h3>
      <p>Esta aplicación muestra las capitales de las Comunidades Autónomas y el número total de localidades por provincia en España.</p>
      <form action="ejercicio3.php" meth="get" align="center">
        <input type="submit" value="Capitales de Autonomías" name="enviar">
        &nbsp;
        &nbsp;
        &nbsp;
        <input type="submit" value="Localidades por Provincia" name="enviar">
      </form>
      <?php
if($_REQUEST) {
    print '<p>Consulta sobre la base de datos <i>"geografia"</i>:</p>';
    if($_REQUEST['enviar'] == 'Capitales de Autonomías') {
        print '<h3 align="center">Capitales por Comunidad Autónoma</h3>';
        conectar();
        $sql= 'SELECT comunidades.nombre AS "comunidad", localidades.nombre AS"capital" FROM comunidades INNER JOIN localidades ON comunidades.id_capital = localidades.id_localidad ORDER BY comunidades.nombre ASC';
        $resultadoConsulta = mysqli_query($GLOBALS['conexion'], $sql) or exit("Error al hacer la consulta");
        $nfilas    = mysqli_num_rows($resultadoConsulta);
        print '<table align="center">';
        print '<tr>';
        print '<td><b>Comunidad Autónoma</b></td>';
        print '<td><b>Capital</b></td>';
        print '</tr>';
        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($resultadoConsulta);
            print '<tr>';
            print '<td><b>' . $resultado['comunidad'] . '</b></td>';
            print '<td>' . $resultado['capital'] . '</td>';
            print '</tr>';
        }
        print '</table>';
        desconectar();
    } else {
        print '<h3 align="center">Número de localidades por Provincia</h3>';
        conectar();
        $sql= 'SELECT provincias.nombre, COUNT(*) FROM localidades INNER JOIN provincias ON localidades.n_provincia=provincias.n_provincia GROUP BY localidades.n_provincia';
        $resultadoConsulta = mysqli_query($GLOBALS['conexion'], $sql) or exit("Error al hacer la consulta");
        $nfilas    = mysqli_num_rows($resultadoConsulta);
        print '<table align="center">';
        print '<tr>';
        print '<td><b>Provincia</b></td>';
        print '<td><b>Nº de localidades</b></td>';
        print '</tr>';
        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($resultadoConsulta);
            print '<tr>';
            print '<td><b>' . $resultado['nombre'] . '</b></td>';
            print '<td>' . $resultado['COUNT(*)'] . '</td>';
            print '</tr>';
        }
        print '</table>';
        desconectar();
    }
}
?>
    </main>
    <?php include 'aside.php'; ?>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
<script>
  function reiniciar() {
    window.location.href = "ejercicio2.php";
  }
</script>
