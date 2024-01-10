<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Hoja 7. Ejercicio 2</title>
   <link rel="stylesheet" type="text/css" href="estilos.css">
   <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>
<body>
   <header>
      <h1>JUEGO ADIVINAR NÚMERO</h1>
   </header>
   <section>
      <nav></nav>
      <main>
         <h1>INTENTE ADIVINAR EL NÚMERO SECRETO</h1><br>
<?php
if (!isset($_GET['envio']) || $_GET['envio']=="Reiniciar") {
   $_SESSION['secreto']=rand(0,10);
   $_SESSION['intentos']=0;
      /*Esto no hay que mostrarlo*/
   //echo "El número secreto es el: ".$_SESSION['secreto']."<br/>";
   //echo print_r($_SESSION);
}
else
{
   $numero=$_GET['numero'];
   if ($_SESSION['secreto'] < $numero) {
      $_SESSION['intentos']++;
      echo "El número secreto es menor que " . $numero . "<br>";
      echo "Lleva usted " . $_SESSION['intentos']. " intentos!<br>";
   } else if ($_SESSION['secreto'] > $numero) {
		$_SESSION['intentos']++;
		echo "El número secreto es mayor que " . $numero . "<br>";
		echo "Lleva usted " . $_SESSION['intentos'] . " intentos!<br>";
	} else {
		$_SESSION['intentos']++;
		echo "<br>";
		echo "ENHORABUENA, el número secreto era " . $numero . "<br><br>";
		echo "Total intentos:".$_SESSION['intentos'];
		echo "<br><br>";
		   // Eliminamos el array de sesión para que no gaste memoria.
		unset($_SESSION);
		   //Destruimos la sesión ACTUAL
		session_destroy();
			//Esto no hay que mostrarlo
		//echo print_r($_SESSION);
		echo "<a href='ejer2.php'>Volver a jugar</a>";
	}
}
if (!$_GET || isset($_SESSION['secreto'])) {?>
   <form method="GET" action="#">   <!--Se puede llevar a cabo la acción del formulario sobre el propio archivo .php con # o dejándolo vacío-->
   Introduzca un número entero entre 0 y 10<br><br>
   Número: <input name="numero" type="number">
   <input name="envio" type="submit" value="Probar">
   <input name="envio" type="submit" value="Reiniciar">
   </form>
<?php
}
?>
      </main>
      <aside></aside>
   </section>
   <footer></footer>
</body>
</html>
