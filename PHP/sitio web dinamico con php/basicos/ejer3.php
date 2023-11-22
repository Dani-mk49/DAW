<!DOCTYPE html>
<html lang="es">
<head>
	<title>Hoja 2. Ejercicio 3</title>
	<meta charset="utf-8">
	<style>
		table {margin:auto;}
		tr {background-color:cyan;}
		tr.par {background-color:pink;}
		tr.impar {background-color:orange;}
		td,th {padding:10px;}
	</style>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<header>
		<h1>Tabla de conversión de moneda</h1>
	</header>
	<section>
		<nav></nav>
		<main>
			<div>
				<?php
					$cambioDolar=$_GET['cambioDolar'];
					$cambioLibra=$_GET['cambioLibra'];
					$fecha=date("d-m-y");
					echo "<h1 id='centrado'>CAMBIO DE DIVISAS A FECHA $fecha</h1>";
					echo "<table>";
					echo "<tr>
							<th>Euros</th>
							<th>Dolares</th>
							<th>Libras</th>
						</tr>";
					for ($euro=1; $euro<=10 ; $euro++)
					{
						if ($euro%2==0)
							echo "<tr class='par'>";
						else
							echo "<tr class='impar'>";
						echo "<td>$euro</td>";
						echo "<td>", $euro*$cambioDolar,"</td>";
						echo "<td>", $euro*$cambioLibra,"</td>";
						echo "</tr>";
					}
					echo "</table>";
				?>
		</div>
	</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>