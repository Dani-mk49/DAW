<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
    <style>
td {
    width: auto;
  height: auto;
}
        table, th, td {
  box-sizing: border-box;
}

    </style>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_bbdd.php'; ?>
      <main>
		  <a href="index.php">Inicio - Ejercicios BBDD</a>
	  <?php
    $conexion = mysqli_connect("127.0.0.1", "root", "", "jardineria") or exit("No se puede conectar con el servidor");
    mysqli_select_db($conexion, "jardineria")                         or exit("No se puede seleccionarc la BD");
    $consulta = mysqli_query($conexion, "SELECT * from clientes")     or exit("Fallo en la consulta");

    print '<table border=1>';
    //PARA SACAR LA CABECERA CON LOS NOMBRES DE LOS CAMPOS:
    //Con funciones de mysqli: mysqli_fetch_field
    //Con funciones mysql se haría con: mysql_field_name;
    print "<tr>";
    while ($finfo = mysqli_fetch_field($consulta)) {
        $nombrecampo = $finfo->name; // Obtenemos el nombre de cada campo;
        echo "<th bgcolor='cyan'>",$nombrecampo,"</th>";
    }
    print "</tr>";
    //PARA SACAR LOS DATOS DE CADA FILA DE CLIENTES
    $nfilas = mysqli_num_rows($consulta);
    for($f = 1; $f <= $nfilas; $f++) {
        print "<tr>";
        //$fila = mysqli_fetch_row ($consulta);
        $fila = mysqli_fetch_assoc($consulta);
        //$fila = mysqli_fetch_array ($consulta);//!OJO!, este así lo devuelve y enseña las columnas duplicadas (flag MYSQL_BOTH por defecto)
        foreach($fila as $columna) {
            if($columna) {
                print "<td style='background:orange'>$columna</td>";
            } else {
                print "<td style='background:red'>$columna</td>";
            }
        }
        print "</tr>";
    }
    print "</table>";
    mysqli_close($conexion);
    ?>
      </main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>