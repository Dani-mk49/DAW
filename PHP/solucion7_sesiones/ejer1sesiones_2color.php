<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Hoja 7. Ejercicio 1: Sesiones</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>
    <?php
        $_SESSION['nombre']=$_REQUEST["nombre"];
        $_SESSION['color']=$_REQUEST["color"];
        echo "
<body style='background-color: ".$_SESSION['color']."'>
        ";
    ?>
    <header>
        <h1>USO DE VARIABLES DE SESIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h1>Interfaz de usuario personalizada</h1><br>
    <?php
        echo " Bienvenido, ".$_SESSION['nombre'];
    ?>
            <br><br>
            <a href="ejer1sesiones_3datos.php">Comprueba tu sesión</a>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>
