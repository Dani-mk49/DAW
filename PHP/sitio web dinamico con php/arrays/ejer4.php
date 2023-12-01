<!DOCTYPE html>
<html lang="es">
<head>
	<title>Hoja 4. Ejercicio 4</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="estilosimple.css">
	<style type="text/css">
		body {text-align:center}
		table {margin:auto;border: 2px solid orange;border-collapse:collapse;}
		th,td {border:2px solid orange;text-align:center}
	</style>
</head>
<body>
    <header>
        <h1>ESTADÍSTICA DE EDADES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
			<?php
			$edad = [10, 12, 34, 23, 1, 2, 35, 46, 2, 7, 45, 8, 9, 14, 78, 67, 5, 67, 45, 3, 4, 45, 67, 89, 90, 23, 13, 24, 56, 4, 23, 13, 56, 99, 99];

				//Array de contadores para contar cuantas edadades hay de cada intervalo
			$conta = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
				//$conta[0] servirá para contar los de 0 decenas, es decir, de 0-9 años.
				//$conta[1] servirá para contar los de 1 decena, es decir, de 10-19 años.
				//$conta[2] servirá para contar los de 2 decenas, es decir, de 20-29 años.
				//...
				//Para calcular el intervalo al que pertenece cada edad lo más sencillo es fijarse en que el
				//valor de la cifra de las decenas de la edad coincide con el nº de intervalo al que pertenece
				//esta edad (empezando a numerarlos desde 0).
				//También aprovechamos para obtener el máximo, el mínimo y la suma de edades
			$max = 0;
			$min = 100; //inicializamos $max al valor más pequeño posible y $min  al más grande
			$n_datos = count($edad);
			$suma = 0;

				//Bucle que recorre array edad y va computando cada edad en su intervalo correspondiente
			for($i = 0; $i < $n_datos; $i++) {
				$cociente = (int)($edad[$i] / 10);	//Como intval() o floor(), este comando indica división entera (devuelve el cociente)

				if ($cociente > 9) {
					$cociente = 9;
				}		//Los de 100 o más años los meteríamos en el último intervalo

				$conta[$cociente]++;	//Se añade 1 al elemento cuyo índice coincide con el cociente de dividir entre 10

				if ($edad[$i] > $max) {
					$max = $edad[$i];
				} 	//Candidato a máximo
					//También se puede escribir en una única línea como $max = $edad[$i] > $max ? $edad[$i] : $max;
					//Sentencia if...else... en formato: $variable = [condicion] ? [instruccion_true] : [instruccion_false]

				if ($edad[$i] < $min) {
					$min = $edad[$i];
				} 	//Candidato a mínimo
					//También se puede escribir en una única línea como $min = $edad[$i] < $min ? $edad[$i] : $min;

				$suma += $edad[$i];
			}

			$media = $suma / $n_datos;

				//Mostramos resultados
			$inter = ["0-9", "10-19", "20-29", "30-39", "40-49", "50-59", "60-69", "70-79", "80-89", ">=90"];	//Array con nombres de intervalos
			print "<table>";
			print "<tr><th>Intervalo</th><th>Frecuencia</th></tr>";
			for($i = 0; $i <= 9; $i++) {
				print "<tr>";
				print "<td>$inter[$i]</td> <td>$conta[$i]</td>";
				print "</tr>";
			}
			print "</table>";
			print "<br/><br/>";

			print "
				<table>
				<tr>
					<th>Edad media</th>
					<td>
			";
						printf("%0.2f", $media);
			print"
					</td>
				</tr>
				<tr>
					<th>Edad máxima</th>
					<td>$max</td>
				</tr>
			";
			print "
				<tr>
					<th>Edad mínima</th>
					<td>$min</td>
				</tr>
				</table>";

			echo "<br>";
			echo "La media es: ",array_sum($edad) / $n_datos,", calculada con función array_sum().<br/>";
			echo "La edad máxima es: ",max($edad),", calculada con función max().<br/>";
			echo "La edad mínima es: ",min($edad),", calculada con función min().<br/>";
			?>
		</main>
		<aside></aside>
	</section>
	<footer></footer>
</body>
</html>
