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
            <h1>Implementación de funciones de arrays</h1>
<?php
function generarArrayAleatorio($length, $min, $max)
{
    for ($i = 0; $i < $length; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

function eliminarRepetidos($array)
{
    return array_unique($array);
}

function calcularMedia($array)
{
    return array_sum($array) / count($array);
}

$randomArray     = generarArrayAleatorio(50, 1, 100);
    $uniqueArray = eliminarRepetidos($randomArray);
    $average     = calcularMedia($uniqueArray);

    print "<br>Array aleatorio: " . implode(", ", $randomArray) . "<br>";
    print "<br>Array sin duplicados: " . implode(", ", $uniqueArray) . "<br>";
    print "<br>Media de los números:" . round($average, 2) . "<br>";
    ?>
        </main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>
