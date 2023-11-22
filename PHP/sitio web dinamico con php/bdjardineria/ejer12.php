<html>
<head>
<title>Lista clientes de BD jardineria</title>
</head>
<body>
<?php
//Problemas de seguridad por inyección de código SQL malicioso.
//"SQL Injection" es una técnica de ataque a paginas, que intentan colar código SQL
// dentro del codigo SQL de la aplicación destino, para romper o acceder a información almacenada en la base de datos.
//Estas técnicas se basan en añadir código SQL malicioso a través de los formularios de entrada de datos de la aplicación web.
//Se muestra aquí un ejemplo clásico de posible inyección de código SQL y una posible solución a este "agujero de seguridad"
//por medio del uso de la función mysqli_real_escape_string que recibe un texto y lo devuelve a formato seguro.

//Mostrar formulario pidiendo usuario y clave
  if (!isset($_REQUEST['enviar'])) {
      print("<h2>Esta zona tiene el acceso restringido.<br> " .
         " Para entrar debe identificarse</h2>");

      print("<form action='ejer12.php' method='get'><br>");

      print("<p>Usuario: ");
      print("<input type='text' name='usuario' size='15'></p>");
      print("<p>Clave: ");
      print("<input type='text' name='clave' size='15'></p>");
      print("<p><input type='submit' name='enviar' value='Entrar'></p>");

      print("</form>");

      print("<p>NOTA: si no dispone de identificación o tiene problemas
		 para entrar<br>póngase en contacto con el
		 <a href='mailto:admin@localhost'>administrador</a> del sitio</p>");
   }
   else {
   // Comprobar que el usuario está autorizado a consultar la base de datos
	$conexion = mysqli_connect ("localhost", "jardinero", "jardinero") or die ("No se puede conectar con el servidor");
	mysqli_select_db ($conexion,"jardineria") or die ("No se puede seleccionar la BD");
	//Versión insegura: permite "inyección SQL"
	//Probar ésta introduciendo en el formulario cualquier cosa en usuario y en password: ' or '1'='1
	//y observar que entonces la condición WHERE del SELECT siempre se cumple ya que se convierte en:
	//SELECT nombre, pass FROM usuarios WHERE nombre='....' and pass='' or '1'='1'
	//con lo cual permite acceder sin introducir el usuario y password correctos. FALLO DE SEGURIDAD.
	$usuario=$_REQUEST['usuario'];
	$clave=$_REQUEST['clave'];
	$sqlcomprobarusuario="SELECT nombre, clave FROM usuarios WHERE nombre='$usuario' AND clave='$clave'";
	$resulcomprobacion = mysqli_query ($conexion,$sqlcomprobarusuario) or die("Fallo en acceso a comprobación1");



	//Versión más segura: hace uso de función mysqli_real_scape_string que recibe un texto y lo devuelve a su formato seguro:
	//lo que hace es pasar a forma escapada los caracteres peligrosos (como comillas, saltos de línea, punto y coma, etc),
	//así, por ejemplo, la comilla simple (') se convierte en (\'), con lo cual no se pueden delimitar nuevas
	//instrucciones o elementos y estaremos más seguros ante una inyección SQL
	//$usuario = mysqli_real_escape_string($conexion,$_REQUEST['usuario']);
    //$clave = mysqli_real_escape_string($conexion,$_REQUEST['clave']);
	//$sqlcomprobarusuario="select nombre, pass from usuarios where nombre='$usuario' and pass='$clave'";
	//$resulcomprobacion = mysqli_query ($conexion,$sqlcomprobarusuario) or die("Fallo en acceso a comprobación2");


	//Otra forma de implementar versión más segura. Probarlo también  así:
	//$usuario=$_REQUEST['usuario'];
	//$clave=$_REQUEST['clave'];
	//$sqlcomprobarusuario="select nombre, pass from usuarios where nombre='$usuario' and pass='$clave'";
	//$sqlseguro=mysqli_real_escape_string($conexion,$sqlcomprobarusuario);
	//$resulcomprobacion = mysqli_query ($conexion,$sqlcomprobarusuario) or die("Fallo en acceso a comprobación2");


	if (mysqli_num_rows($resulcomprobacion)>0) //Comprobación satisfactoria. usuario y contraseña correctos
	{	$resulconsulta = mysqli_query ($conexion,"select * from clientes") or die ("Fallo en la consulta");
		$nfilas = mysqli_num_rows ($resulconsulta);
		echo '<table border=1>';
		echo "<tr><th>CÓDIGO</th><th>NOMBRE CLIENTE</th><th>NOMBRE CONTACTO</th></tr>";
		for($f=0;$f<$nfilas;$f++){
			echo '<tr>';
			$fila = mysqli_fetch_array ($resulconsulta);
			echo '<td>',$fila[0],'</td><td>',$fila[1],'</td><td>',$fila[2],'</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	else //Intento de entrada fallido
     {
      print ("<br/><br/>");
      print ("<h2>Acceso no autorizado</h2>");
      print ("<p>[ <a href='listaclientesmasseguro.php'>Volver a intentar identificarse</a> ]</p>");
     }
	mysqli_close ($conexion);
}
?>
</body>
</html>