<!DOCTYPE HTML>
<html lang="es-ES">
<head>
    <meta charset="UTF-8" />
    <title>Hoja 6. Ejercicio 6</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css"/>
</head>
<body>
    <header>
        <h1>MODIFICAR CLIENTES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
<?php
if (!$_REQUEST) {
	echo "<form  action='ejer6.php' method='get'>";
	echo "Selecciona el telefono del cliente: &nbsp;";
	echo"<select name='codigocliente'>";

	$c=mysqli_connect("localhost","jardinero","jardinero");
	mysqli_select_db($c,"jardineria");

	$consulta1="SELECT codigocliente, telefono, nombrecliente FROM clientes";
	$resulconsulta1=mysqli_query($c,$consulta1);

	while ($registro = mysqli_fetch_row($resulconsulta1)){
		echo"<option value=$registro[0]>".$registro[1]."--".$registro[2]."</option>";
	}
	echo"</select><br><br>";
	echo "<input type='submit' value='Enviar consulta' name='enviar'>";
	echo "</form>";
}
else
{
	if(!isset($_REQUEST["modificar"])){
		$codigocliente=$_REQUEST['codigocliente'];

		$c=mysqli_connect("localhost","root","");
		mysqli_select_db($c,"jardineria");

		$consulta2="SELECT * FROM clientes where codigocliente='$codigocliente' ";
		$resulconsulta2=mysqli_query($c,$consulta2);
		$registro = mysqli_fetch_row($resulconsulta2);

		//Se puede almacenar en distintas variables cada uno de los registros del cliente elegido por el usuario
		/*
		$nombrecliente=$registro[1];
		$nombrecontacto=$registro[2];
		$apellidocontacto=$registro[3];
		$telefono=$registro[4];
		$fax=$registro[5];
		$lineadireccion1=$registro[6];
		$lineadireccion2=$registro[7];
		$ciudad=$registro[8];
		$region=$registro[9];
		$pais=$registro[10];
		$codigopostal=$registro[11];
		$codigoempleadorepventas=$registro[12];
		$limitecredito=$registro[13];*/
		?>

		<table>
		<form  action='ejer6.php' method='GET'>
		<tr>
			<td>CodigoCliente:</td>
			<td><input class='readonly' type='text' name='codigocliente' value='<?php echo "$codigocliente";?>' maxlength='50'size='50' readonly></td>
		</tr>
		<tr>
			<td>NombreCliente:</td>
			<td><input type='text' name='nombrecliente' value='<?php echo $registro[1];?>' maxlength='50'size='50' required></td>
		</tr>
		<tr>
			<td>NombreContacto:</td>
			<td><input type='text' name='nombrecontacto' value='<?php echo $registro[2];?>' maxlength='50'size='50'></td>
		</tr>
		<tr>
			<td>ApellidoContacto</td>
			<td><input type='text' name='apellidocontacto' value='<?php echo $registro[3];?>' maxlength='30'size='50'></td>
		</tr>
		<tr>
			<td>Telefono:</td>
			<td><input type='text' name='telefono' value='<?php echo $registro[4];?>' maxlength='15'size='50' pattern="[0-9]{9,11}" required></td>
		</tr>
		<tr>
			<td>Fax:</td>
			<td><input type='text' name='fax' value='<?php echo $registro[5];?>' maxlength='15' size='50' pattern="[0-9]{9,11}" required></td>
		</tr>
		<tr>
			<td>LineaDireccion1:</td>
			<td><input type='text' name='lineadireccion1' value='<?php echo $registro[6];?>' maxlength='50' size='50' required></td>
		</tr>
		<tr>
			<td>LineaDireccion2:</td>
			<td><input type='text' name='lineadireccion2' value='<?php echo $registro[7];?>' maxlength='50' size='50'></td>
		</tr>
		<tr>
			<td>Ciudad:</td>
			<td><input type='text' name='ciudad' value='<?php echo $registro[8];?>' maxlength='50' size='50' required></td>
		</tr>
		<tr>
			<td>Region:</td>
			<td><input type='text' name='region' value='<?php echo $registro[9];?>' maxlength='50' size='50'></td>
		</tr>
		<tr>
			<td>Pais:</td>
			<td><input type='text' name='pais' value='<?php echo $registro[10];?>' maxlength='50' size='50'></td>
		</tr>
		<tr>
			<td>CodigoPostal:</td>
			<td><input type='text' name='codigopostal'  value='<?php echo $registro[11];?>' maxlength='10' size='50' pattern="[0-9]{4,5}"></td>
		</tr>
		<tr>
			<td>CodigoEmpleadoRepventas:</td>
			<td> <?php	echo "<select name = 'codigoempleadorepventas'>";

					$consulta = "SELECT CodigoEmpleado, Nombre, Apellido1, Apellido2 FROM empleados";
					$rescon = mysqli_query ($c,$consulta);

					while($valor = mysqli_fetch_row ($rescon)){
						echo "<option ";
						if($valor[0]==$registro[12])
							echo "selected "; //Para que aparezca seleccionado por defecto el empleado asignado al cliente
						echo "value = $valor[0]>".$valor[1]." ".$valor[2]." ".$valor[3]."</option>";
					}
					mysqli_close ($c);
					echo "</select>";
			?>
			</td>
		</tr>
		<tr>
			<td>LimiteCredito:</td>
			<td><input  type="number" name='limitecredito' value='<?php echo $registro[13];?>' maxlength='15' size=50 step="0.01" min="0" max="10000" required></td>
		</tr>
		<tr>
			<td><input type="submit" value="Modificar cliente" name="modificar"></td>
			<td><a href='ejer6.php'>Vuelve al listado de clientes</a></td>
		</tr>

		</form>
		</table>
<?php
	} else {
		$codigocliente=$_REQUEST['codigocliente'];
		$nombrecliente=$_REQUEST['nombrecliente'];
		$nombrecontacto=$_REQUEST['nombrecontacto'];
		$apellidocontacto=$_REQUEST['apellidocontacto'];
		$telefono=$_REQUEST['telefono'];
		$fax=$_REQUEST['fax'];
		$lineadireccion1=$_REQUEST['lineadireccion1'];
		$lineadireccion2=$_REQUEST['lineadireccion2'];
		$ciudad=$_REQUEST['ciudad'];
		$region=$_REQUEST['region'];
		$pais=$_REQUEST['pais'];
		$codigopostal=$_REQUEST['codigopostal'];
		$codigoempleadorepventas=$_REQUEST['codigoempleadorepventas'];
		$limitecredito=$_REQUEST['limitecredito'];

		$c=mysqli_connect("localhost","root","");
		mysqli_select_db($c,"jardineria");

		echo "<b>Se procede a la modificación del cliente con código $codigocliente</b><br>";
		$modificacion="UPDATE clientes SET nombrecliente='$nombrecliente', nombrecontacto='$nombrecontacto', apellidocontacto='$apellidocontacto', telefono='$telefono', fax='$fax', lineadireccion1='$lineadireccion1', lineadireccion2='$lineadireccion2', ciudad='$ciudad', region='$region', pais='$pais', codigopostal='$codigopostal', codigoempleadorepventas='$codigoempleadorepventas', limitecredito='$limitecredito' WHERE codigocliente = '$codigocliente'";

		echo "<b>Sentencia de modificación:</b><br>$modificacion<br>";
		if(mysqli_query($c,$modificacion))	//Devuelve true si se ha podido realizar la consulta y a la vez la ejecuta
			echo "<br><b>Inserción completada correctamente.</b><br><br>";
		else
			echo "<br><b>Ha ocurrido error al ejecutar sentencia SQL INSERT.</b><br/>";
		echo "<a href = 'ejer6.php'>Vuelta al formulario de inserción</a><br/>";
	}
}?>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>