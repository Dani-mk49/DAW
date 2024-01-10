<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Hoja 7. Ejercicio 1: Cookies</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css">
    <style>
        <?php echo "body{background-color: ".$_COOKIE['fondo'].";}"; ?>
    </style>
</head>
<body >
    <header>
        <h1>USO DE COOKIES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h1>Cookies recibidas</h1><br>
<?php
    echo "Usuario identificado: ". $_COOKIE['nom'];
?>
<br><br>
<a href="ejer1cookies_1formulario.php">Volver al formulario</a>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>