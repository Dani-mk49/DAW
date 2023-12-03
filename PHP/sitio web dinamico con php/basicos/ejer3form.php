<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_basicos.php'; ?>
			<main>
        <h1>Cambio divisas</h1>
      <a href="index.php">Inicio - Ejercicios Base</a>
				<form action="ejer3.php" method="GET">
					<p>Cambio de 1 euro a dólares estadounidenses: <input type="number" name="cambioDolar" step="0.0001" min="0" required></p>
					<p>Cambio de 1 euro a libras esterlinas: <input type="number" name="cambioLibra" step="0.0001" min="0" required></p>
					<input type="submit" value="Enviar">
				</form>
			</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>
