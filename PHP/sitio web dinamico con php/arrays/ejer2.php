<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_arrays.php'; ?>
	  <main>
		  <a href="index.php">Inicio - Ejercicios de Arrays</a>
			<?php
				if ($_REQUEST) {
					$cantidad = $_REQUEST['euros'];
					$valor = [500, 200, 100, 50, 20, 10, 5, 2, 1];
					print "<h1>Resultado</h1> ";
					print "Cantidad total de euros pedidos a desglosar es: $cantidad<br/>";
					for($i = 0; $i < count($valor); $i++) {
						$unidades = intval($cantidad / $valor[$i]);		//También se puede utilizar la función floor()
						$cantidad = $cantidad % $valor[$i];				//Se almacena en la variable $cantidad el resto de la división para el siguiente paso del bucle
						print "Nº de unidades de $valor[$i] euros es $unidades <br/>";
					}
					print "<br/> <a href='ejer2.php'>Volver a pedir nuevo desglose</a>";
				}
				else {
			?>
					<h1>Formulario</h1>
					<form action='ejer2.php' method='GET'>
						Introduce cantidad de euros a desglosar:<br><br>
						<input type='number' name='euros'  min='1' required/></br></br>
						<input type='submit' value='Enviar'/>
					</form>
			<?php
				}
			?>
		</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>
