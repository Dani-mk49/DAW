<!DOCTYPE html>
<html lang="es">
<head>
	<title>Hoja 2. Ejercicio 1</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<header>
        <h1>RESULTADOS CUESTIONARIO</h1>
    </header>
    <section>
        <nav></nav>
        <main>
			<div>
				<?php
				$nombre = $_GET["nombre"];
				$apellidos = $_GET["apellidos"];
				print "<p>Bienvenido, $nombre $apellidos.</p>";
				if (isset($_GET['pregunta1']) && $_GET["pregunta1"] == "a") {
					print "<p>Respuesta a pregunta 1 correcta.</p>";
				} else {
					print "<p>Respuesta a pregunta 1 incorrecta.</p>";
				}

				if (isset($_GET['pregunta2b'], $_GET['pregunta2d']) && !isset($_GET['pregunta2a']) && !isset($_GET['pregunta2c'])) {
					print "<p>Respuesta a pregunta 2 correcta.</p>";
				} else {
					print "<p>Respuesta a pregunta 2 incorrecta.</p>";
				}
				?>
				<p><a href="ejer1form.html"><br>Volver al cuestionario</a></p>
			</div>
		</main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>