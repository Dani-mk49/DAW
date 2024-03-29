<?php
session_start();

// Si el número no está guardado en la sesión, ponemos el valor a cero
if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = 0;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Hoja 7. Ejercicio 3</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>

<?php
if($_REQUEST) {
	// Recogemos accion
	$accion = $_REQUEST["accion"];

	// Dependiendo de la acción recibida, modificamos el número guardado
	if ($accion == "cero") {
		$_SESSION["numero"] = 0;
	} elseif ($accion == "subir") {
		$_SESSION["numero"]++;
	} elseif ($accion == "bajar") {
		$_SESSION["numero"]--;
	}
  echo $_REQUEST['accion'];
}
?>

<body>
  <header>
    <h1>MODIFICAR DATOS DE SESIÓN</h1>
  </header>
  <section>
    <nav></nav>
    <main>
      <h1>Subir y bajar número</h1><br>
      <form action="ejer3b.php" method="get">
        <p>Haga clic en los botones para subir o bajar una unidad:</p><br>
        <p>
          <button type="submit" name="accion" value="bajar" style="font-size: 4rem">&nbsp; - &nbsp;</button>
          <?php
            // Mostramos el número guardado en la sesión
            print "<span style=\"font-size: 4rem\">$_SESSION[numero]</span>";
          ?>
          <button type="submit" name="accion" value="subir" style="font-size: 4rem">&nbsp; + &nbsp;</button>
        </p><br>
        <p>
          <button type="submit" name="accion" value="cero">Poner a cero</button>
        </p>
      </form>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>