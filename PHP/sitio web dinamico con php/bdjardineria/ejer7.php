<!DOCTYPE HTML>
<html lang="es-ES">
<head>
     <meta charset="utf-8" />
	<title>Hoja 6. Ejercicio 7</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="estilosimple.css"/>
</head>
<body>
    <header>
        <h1>BORRAR CLIENTES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
<?php
if (isset($_REQUEST['respuesta']))
{ /*3ª parte:  se procede a borrar el registro del cliente y, previamente, todos lo registros relacionados en tablas subordinadas*/
  borrarCliente($_REQUEST['codigo'],$_REQUEST['respuesta']);
}
else{	/*2ª Parte: se muestran los datos del cliente y se pide confirmación de borrado*/
	if(isset($_REQUEST['telefono'])){
		$tel=$_REQUEST['telefono'];
		mostrarClienteyPreguntarBorrar($tel);
	}
	else{ /*1ª parte: se pide el nº de teléfono del cliente*/
?>
		<form action='<?= $_SERVER['PHP_SELF']?>' method='GET'>	<!--Utilizando array superglobal $_SERVER-->
			<label>Escribe el teléfono del cliente:</label>
			<input type='text' name='telefono' value='' pattern='[0-9]{9,11}' size='11'> <!--En vez de usar required haremos uso de header(Location: ) en PHP-->
			<input type="submit" value="Obtener datos del cliente">
		</form>
<?php
	}
}
?>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>

<?php
//Funciones auxiliares
function mostrarClienteyPreguntarBorrar($tel) {
	$conexion = mysqli_connect("localhost","jardinero","jardinero") or die ("Error en conexión con servidor bd");
	mysqli_select_db($conexion,"jardineria") or die ("Error al seleccionar bd jardinería");
	if(!empty($tel)){
		$consulta = mysqli_query($conexion,"SELECT * FROM clientes WHERE telefono='$tel';")
			or die ("Error al seleccionar cliente");
			/*Si hubiese varios clientes con el mismo teléfono nos quedaríamos con el primero obtenido*/
		$fila = mysqli_fetch_assoc($consulta);
		if($fila==true){
			echo "<h2>FICHA DEL CLIENTE</h2><br><ul>";
			foreach($fila as $campo => $dato){
				echo "<li>$campo: $dato</li> ";
			}
			echo "</ul><br>";
			echo "<p>¿Quieres eliminar este cliente?</p>";
			?>
			<form action='ejer7.php' method='get'>
				<input type="hidden" name="codigo" value='<?php $fila['CodigoCliente']?>'/>
				<input type="submit" name ="respuesta" value="Si"/>&nbsp;&nbsp;
				<input type="submit" name ="respuesta" value="No"/>
			</form>
			<?php
		}else{
			echo "<p>El teléfono no pertenece a ningún cliente. <a href='ejer7.php'>VOLVER</a></p>";
		}
	}else{
		/*Si el teléfono está vacío lo volvemos a pedir*/
		header("Location: ejer7.php"); /* Redirección del navegador */
	}
}

function borrarCliente($codigo,$respuesta) {
	echo "<p>RESULTADOS DE BORRADO DE CLIENTE DE CÓDIGO $codigo.</p>";

	if($respuesta=="Si"){
		$conexion = mysqli_connect("localhost","jardinero","jardinero") or die ("Error en conexión con servidor bd.");
		mysqli_select_db($conexion,"jardineria");

		//Borrado de pagos del cliente
		mysqli_query($conexion,"DELETE FROM pagos WHERE codigoCliente = $codigo;")
			or die ("Error al borrar pagos del cliente.");
		echo "Se han borrado los pagos del cliente.<br>";

		//Borrado de detallepedidos de los distintos pedidos que ha hecho el cliente
		$query = "DELETE FROM detallepedidos WHERE CodigoPedido IN (SELECT DISTINCT CodigoPedido FROM pedidos WHERE CodigoCliente = $codigo);";
			/* Y otra forma más de expresar este delete:
			$query= "DELETE DetallePedidos FROM DetallePedidos NATURAL JOIN Pedidos WHERE Pedidos.CodigoCliente = $codigo;"; */
		mysqli_query($conexion, $query) or die ("Fallo al eliminar los detalles pedidos del cliente $codigo.");
		echo "Se han borrado los detalles de pedidos del cliente.<br>";

		//Borrado de pedidos del cliente
		mysqli_query($conexion,"DELETE FROM pedidos WHERE codigoCliente = $codigo;")
			or die ("Error al borrar pedidos del cliente.");
		echo "Se han borrado los pedidos del cliente.<br>";

		//Borrado de cliente de la tabla clientes
		mysqli_query($conexion,"DELETE FROM clientes WHERE codigoCliente = $codigo;")
			or die ("Error al borrar cliente.");
		echo "Se ha borrado el cliente de la tabla clientes.<br>";

		mysqli_close($conexion);
	}else{
		echo "No se ha borrado el cliente.";
	}
	echo "<p><a href='ejer7.php'>VOLVER</a></p>";
}
?>