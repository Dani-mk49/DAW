﻿<!DOCTYPE html>
<?php include 'conectabd.php' ?>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_bbdd.php'; ?>
	  <main>
		  <a href="index.php">Inicio - Ejercicios BBDD</a>
		  <h1>Lista de clientes</h1>
<?php
	conectar();
	//echo "<h1>Conexión correcta...</h1><br>";

	$sql="SELECT CodigoCliente, NombreCliente, NombreContacto from clientes";
	$resulconsulta=mysqli_query($GLOBALS['conexion'],$sql) or die ("Error al hacer la consulta");

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
	desconectar();
?>
		</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>