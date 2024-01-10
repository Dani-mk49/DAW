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
    <style>
        <?php echo "body{background-color: ".$_SESSION['color'].";}"; ?>
    </style>
</head>
<body >
    <header>
        <h1>USO DE VARIABLES DE SESIÓN</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h1>Sesión abierta</h1><br>
<?php
    echo "Usuario identificado: ". $_SESSION['nombre'];
?>
<br><br>
<a href="ejer1sesiones_1formulario.php">Volver al formulario</a>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>