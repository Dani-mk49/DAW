<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Hoja 7. Ejercicio 1: Cookies</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>
<body>
    <header>
        <h1>USO DE COOKIES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
            <h1>Inicio de sesión</h1><br>
            <form action="ejer1cookies_2color.php" method="post">
                <label>Escribe tu nombre:</label>
                <input type="text" name="nombre"><br><br>
                <label>Elige un color:</label>
                <select name="color" >
                    <option value="cyan" >Cyan</option>
                    <option value="yellow" >Amarillo</option>
                    <option value="pink">Rosa</option>
                    <option value="green">Verde</option>
                </select>
                <input type="submit" value="Procesar">
            </form>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>
