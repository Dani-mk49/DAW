<!DOCTYPE html>
<html lang="es">
    <?php include 'metadata.php'; ?>
    <style>
      tr{
        border-left: 1px solid black;
        border-right: 1px solid black;
      }
    </style>
  <body>
    <?php include 'header.php'; ?>
    <div class="contenedorCentral">
      <?php include 'nav.php'; ?>
      <main>
      <h2 class="ejercicioX">EJERCICIO 1</h2>
      <br>
      <h3>Suma de matrices</h3>
      <p>Esta aplicacion resuelve la suma de dos matrices cuadradas de dimensión NxN cuyos elementos son números aleatorios entre -20 y 20. La dimension N no puede ser mayor que 5</p>
      <?php
      if($_REQUEST) {
          $matriz1    = generarArrayBidimensionalAleatorio($_REQUEST['dimension']);
          $matriz2    = generarArrayBidimensionalAleatorio($_REQUEST['dimension']);
          $matrizSuma = sumaMatricesN($matriz1, $matriz2, $_REQUEST['dimension']);
          echo '<table>';
          echo '<tr>';
          echo '<td>';
          pintaMatriz($matriz1);
          echo '</td>';
          echo '<td>';
          echo '+';
          echo '</td>';
          echo '<td>';
          pintaMatriz($matriz2);
          echo '</td>';
          echo '<td>';
          echo '=';
          echo '</td>';
          echo '<td>';
          pintaMatriz($matrizSuma);
          echo '</td>';
          echo '</tr>';
          echo '</table>';
          function generarArrayBidimensionalAleatorio($length)
          {
              for ($i = 0; $i < $length; $i++) {
                  for($z = 0; $z < $length; $Z++) {
                      $array[$i][$z] = rand(-20, 20);
                  }
              }
              return $array;
          }

          function sumaMatricesN($arr1, $arr2, $length)
          {
              for ($i = 0; $i < $length; $i++) {
                  for($z = 0; $z < $length; $Z++) {
                      $array[$i][$z] = $arr1[$i][$z] + $arr2[$i][$z];
                  }
              }
              return $array;
          }

          function pintaMatriz($array)
          {
            echo '<table>';
            for ($i = 0; $i < $length; $i++) {
              echo '<tr>';
              for($z = 0; $z < $length; $Z++) {
                echo '<td>'.$array[$i][$z].'</td>';
              }
              echo '</tr>';
            }
            echo '</table>';
          }
      }
    ?>
      <div style="border: 1px solid blue; padding: 25px">
        <p style="margin: 0;">Introduzca la dimensión de las matrices</p>
        <br>
        <form action="ejercicio1.php" method="get">
          <input type="number" min="1" max="5" name="dimension" required>
          <input type="submit" value="Enviar" name="enviar">
        </form>
      </div>
      </main>
      <?php include 'aside.php'; ?>
      </div>
      <?php include 'footer.php'; ?>
    </body>
</html>
