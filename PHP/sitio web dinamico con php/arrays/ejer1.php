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
                    print "<h1>Resultado</h1>";
                    $resultado = dividir($_REQUEST['numero']);
                    echo "<p>El número introducido ha sido el ",$_REQUEST['numero'],
                    "<br> y el resto de su división por 12 es <b>$resultado</b>.</p>";
                }
            ?>
            <h1>Formulario</h1>
            <form action="ejer1.php" method="get">
                <b>Escribe un número entero positivo:</b> <br> <br>
                <input type="number" name="numero" min="1" required/> <br> <br>
                <input type="submit" value="Enviar"/>
                <input type="reset" value="Borrar"/>
            </form>
        </main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>
<?php
    function dividir($x)
    {
        $r = ["cero", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve", "diez", "once"];
        $resto = $x % 12;
        return $r[$resto];
    }
?>