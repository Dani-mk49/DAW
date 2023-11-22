<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Hoja 6. Ejercicio 10</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>
<body>
	<header>
		<h1>TABLA DE USUARIOS</h1>
	</header>
	<section>
		<nav></nav>
		<main>
			<h1>Inserción de usuarios con clave encriptada</h1><br>
<?php
// Creación de array de usuarios y claves
	$usuarios=array("jardinero"=>"jardinero","cristina"=>"cristina","enrique"=>"enrique","marta"=>"marta");

	$conexion = mysqli_connect ("localhost", "jardinero", "jardinero") or die ("No se puede conectar con el servidor");
	mysqli_select_db ($conexion,"jardineria") or die ("No se puede seleccionar la base de datos");

	$sql="CREATE TABLE usuarios(
		nombre varchar(50) NOT NULL,
		clave varchar(100) NOT NULL,
		PRIMARY KEY (nombre)
		) engine=innodb;";

	$consulta = mysqli_query ($conexion,$sql) or die ("Fallo en creación tabla usuarios");

	foreach ($usuarios as $user => $pass) {
		$clave_encriptada = password_hash($pass, PASSWORD_BCRYPT);
		echo "$user:$pass:$clave_encriptada "; //Código de comprobación

		//password_verify es la función principal de verificación de contraseña: devuelve verdadero si el cifrado es correcto
		if (password_verify($pass, $clave_encriptada)) {
			$instruccion = "INSERT into usuarios (nombre, clave) values ('$user', '$clave_encriptada')";
			$consulta = mysqli_query($conexion, $instruccion) or exit("Fallo en la inserción");
			print "Usuario $user insertado con éxito.<br><br>";
		}
	}
	mysqli_close ($conexion);
?>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>
