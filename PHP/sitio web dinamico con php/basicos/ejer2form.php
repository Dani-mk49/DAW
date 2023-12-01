<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_basicos.php'; ?>
      <main>
      <a href="index.php">Inicio - Ejercicios Base</a>
        <form action="ejer2.php" method="post">
          <p>
            Introduce cantidad de euros a cambiar:
            <input type="number" name="cantidad" min="0" step="0.01"><br><br>
            Selecciona moneda destino:
            <select name="tipo">
              <option value="dolar">Dólar Estadounidense</option>
              <option value="libra">Libra Esterlina</option>
            </select>
          </p>
          <input type="submit" value="Enviar" name="enviar">
        </form>
      </main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>