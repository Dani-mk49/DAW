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
				echo"<h1>CÁLCULO TEMPERATURA MEDIA</h1>";
				$v=$_REQUEST["v"];		//La variable $v se convierte en un array con los datos almacenados en el array $_REQUEST
										//Otra opcion sería construir el array en PHP con: $v=array($_REQUEST[Lunes],$_REQUEST[Martes],...)
				$suma=0;
				for($i=0;$i<count($v);$i++)
				{
					$suma+=$v[$i];
				}
				$media=$suma/count($v);
				echo "La temperatura media de la semana es: ",round($media,2)," (calculada con bucle for)<br><br>";
					//round($variable,2) redondea a dos decimales
					//También se puede usar printf("%.2f", $variable) en vez de echo o print
				echo "También se puede usar la función array_sum() y dividir por el número de elementos, count() o sizeof().<br><br>
				El resultado sigue siendo: ",round(array_sum($v)/count($v),2);
			?>
		</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>
