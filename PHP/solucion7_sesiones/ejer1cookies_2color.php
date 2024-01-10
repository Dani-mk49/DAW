<?php
//2ª Parte: Se crean las cookies y envían al cliente. Caduca en una hora.
    setcookie('nom', $_REQUEST['nombre'], time() + 60 * 60);
    setcookie('fondo', $_REQUEST['color'], time() + 60 * 60);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Hoja 7. Ejercicio 1: Cookies</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>
    <?php
        echo "
<body style='background-color: ".$_REQUEST['color']."'>
        ";
    ?>
    <header>
        <h1>USO DE COOKIES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h1>Interfaz de usuario personalizada</h1><br>
    <?php
        echo " Bienvenido, ".$_REQUEST['nombre'];
    ?>
            <br><br>
            <p>Pincha en este <a href="ejer1cookies_3datos.php">enlace</a> para pasar a otra página y comprobar que el cliente envía las cookies al servidor.</p>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>
