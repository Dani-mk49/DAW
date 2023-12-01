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
				<h1>FORMULARIO PETICIÓN TEMPERATURAS</h1>
				<form action="ejer3.php" method="get">
					Entrada de temperaturas de la semana<br><br>
					<table>		<!--Podemos almacenar los datos como elementos del array que utilicemos posteriormente en PHP-->
							<tr><td>Lunes</td> <td><input type="number" name="v[0]" size="6" required></td></tr>
							<tr><td>Martes</td> <td><input type="number" name="v[1]" size="6" required></td></tr>
							<tr><td>Miercoles</td> <td><input type="number" name="v[2]" size="6" required></td></tr>
							<tr><td>Jueves</td> <td><input type="number" name="v[3]" size="6" required></td></tr>
							<tr><td>Viernes</td> <td><input type="number" name="v[4]" size="6" required></td></tr>
							<tr><td>Sabado</td> <td><input type="number" name="v[5]" size="6" required></td></tr>
							<tr><td>Domingo</td> <td><input type="number" name="v[6]" size="6" required></td></tr>
					</table><br>
					<input type="submit" value="Enviar datos">
					&nbsp;&nbsp;&nbsp;
					<input type="reset" value="Borrar datos">
				</form>
			</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>
