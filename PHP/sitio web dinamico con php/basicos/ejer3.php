<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
	<style>
		table {margin:auto;}
		tr {background-color:cyan;}
		tr.par {background-color:pink;}
		tr.impar {background-color:orange;}
		td,th {padding:10px;}
	</style>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_basicos.php'; ?>
	  <main>
    <a href="index.php">Inicio - Ejercicios Base</a>
			<div>
				<?php
                    $cambioDolar = $_GET['cambioDolar'];
    $cambioLibra                 = $_GET['cambioLibra'];
    $fecha                       = date("d-m-y");
    print "<h1 id='centrado'>CAMBIO DE DIVISAS A FECHA $fecha</h1>";
    print "<table>";
    print "<tr>
							<th>Euros</th>
							<th>Dolares</th>
							<th>Libras</th>
						</tr>";
    for ($euro = 1; $euro <= 10; $euro++) {
        if ($euro % 2 == 0) {
            print "<tr class='par'>";
        } else {
            print "<tr class='impar'>";
        }
        print "<td>$euro</td>";
        echo "<td>", $euro * $cambioDolar,"</td>";
        echo "<td>", $euro * $cambioLibra,"</td>";
        print "</tr>";
    }
    print "</table>";
    ?>
    <br><a href="ejer3form.php">Volver a pedir nueva conversión</a>
		</div>
	</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>