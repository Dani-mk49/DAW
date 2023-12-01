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
			<h1>Inserción de usuarios con clave encriptada</h1><br>
<?php
// Creación de array de usuarios y claves
    $usuarios = ["jardinero" => "jardinero", "cristina" => "cristina", "enrique" => "enrique", "marta" => "marta"];

    $conexion = mysqli_connect("localhost", "jardinero", "jardinero") or exit("No se puede conectar con el servidor");
    mysqli_select_db($conexion, "jardineria")                         or exit("No se puede seleccionar la base de datos");

    $sql = "CREATE TABLE usuarios(
		nombre varchar(50) NOT NULL,
		clave varchar(100) NOT NULL,
		PRIMARY KEY (nombre)
		) engine=innodb;";

    $consulta = mysqli_query($conexion, $sql) or exit("Fallo en creación tabla usuarios");

    foreach ($usuarios as $user => $pass) {
        $clave_encriptada = password_hash($pass, PASSWORD_BCRYPT);
        print "$user:$pass:$clave_encriptada "; //Código de comprobación

        //password_verify es la función principal de verificación de contraseña: devuelve verdadero si el cifrado es correcto
        if (password_verify($pass, $clave_encriptada)) {
            $instruccion = "INSERT into usuarios (nombre, clave) values ('$user', '$clave_encriptada')";
            $consulta    = mysqli_query($conexion, $instruccion) or exit("Fallo en la inserción");
            print "Usuario $user insertado con éxito.<br><br>";
        }
    }
    mysqli_close($conexion);
    ?>
		</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>