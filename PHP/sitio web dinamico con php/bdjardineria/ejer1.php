<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Hoja 6. Ejercicio 1</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>
<body>
    <header>
        <h1>CONSULTA DE CLIENTES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
<?php
	$conexion = mysqli_connect ("localhost", "jardinero", "jardinero","jardineria") or die ("No se puede conectar con el servidor");
	echo "<h1>Conexión correcta...</h1><br>";

	$sql="SELECT CodigoCliente, NombreCliente, NombreContacto from clientes";
	$resulconsulta=mysqli_query($conexion,$sql) or die ("Error al hacer la consulta");

	$nfilas=mysqli_num_rows($resulconsulta);
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>CODIGO CLIENTE</th><th>NOMBRE CLIENTE</th><th>NOMBRE CONTACTO</th>";
	echo "</tr>";
	for($i=1;$i<=$nfilas;$i++)
	{
		$fila=mysqli_fetch_row($resulconsulta);		//Este comando cambia los índices con clave "NombreCampo" a índices escalares
		//print_r($fila); echo "<br/>";				//Si descomentas esta línea podrás ver como se forman los arrays fila con sus datos e índices escalares
		echo "<tr>";
		echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conexion);
?>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</htmlL>