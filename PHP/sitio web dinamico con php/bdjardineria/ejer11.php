<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_bbdd.php'; ?>
	  <main>
		  <a href="index.php">Inicio - Ejercicios BBDD</a>
<?php
//Mostrar formulario pidiendo usuario y clave
if (!isset($_REQUEST['enviar'])) {
    ?>
	<h1>Identificación de usuario</h1><br>
	<h2>Esta zona tiene el acceso restringido. Para entrar debe identificarse:</h2><br>

	<form action='ejer11.php' method='get'>
		<p>Usuario:<input type='text' name='usuario' size='15' required></p>
		<p>Clave:&nbsp;&nbsp;&nbsp;<input type='text' name='password' size='15' required></p>
		<p><input type='submit' name='enviar' VALUE='Entrar'></p>
	</form>
	<br>
	<p>NOTA: si no dispone de identificación o tiene problemas para entrar<br/>
	póngase en contacto con el <a href='mailto:admin@localhost'>administrador</a> del sitio.</p>
<?php
} else {
    // Comprobar que el usuario está autorizado a consultar la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "jardineria") or exit("No se puede conectar con el servidor");
    mysqli_select_db($conexion, "jardineria")                         or exit("No se puede seleccionarc la BD");

    $user = $_REQUEST['usuario'];
    $pass = $_REQUEST['password'];

    $sqlcomprobarusuario = "SELECT clave from usuarios where nombre='$user'";
    $resulcomprobacion   = mysqli_query($conexion, $sqlcomprobarusuario) or exit("Fallo en acceso a comprobación");

    if(mysqli_num_rows($resulcomprobacion) > 0) {
        $array_consulta   = mysqli_fetch_array($resulcomprobacion);
        $clave_encriptada = $array_consulta[0];
    } else {
        $clave_encriptada = 0;
    }

    if (password_verify($pass, $clave_encriptada)) {	//Comprobación satisfactoria: usuario y contraseña correctos
        $resulconsulta = mysqli_query($conexion, "SELECT * from clientes") or exit("Fallo en la consulta");
        $nfilas        = mysqli_num_rows($resulconsulta);

        print '<table border=1>';
        print '<tr><th>CÓDIGO</th><th>NOMBRE CLIENTE</th><th>NOMBRE CONTACTO</th></tr>';
        for($f = 0; $f < $nfilas; $f++) {
            print '<tr>';
            $fila = mysqli_fetch_array($resulconsulta);
            echo '<td>',$fila[0],'</td><td>',$fila[1],'</td><td>',$fila[2],'</td>';
            print '</tr>';
        }
        print '</table>';
    } else { //Intento de entrada fallido
        print "<br/><br/>";
        print "<h2>Acceso no autorizado</h2><br>";
        print "<p>[ <a href='ejer11.php'>Volver a intentar identificarse</a> ]</p>";
    }
    mysqli_close($conexion);
}
    ?>
		</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>