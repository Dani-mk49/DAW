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
if($_REQUEST) {     //Si no hay nada almacenado en el array REQUEST pasa al final del código donde se muestra el formulario inicial

    if(isset($_REQUEST["matrizA"])) {    //Si todavía no se han definido los elementos de las matrices a multiplicar se pasa al segundo formulario
        $filasA    = $_REQUEST["filasA"];
        $filasB    = $_REQUEST["filasB"];
        $columnasA = $_REQUEST["columnasA"];
        $columnasB = $_REQUEST["columnasB"];

        $matrizA = $_REQUEST["matrizA"];
        $matrizB = $_REQUEST["matrizB"];

        for($i = 0; $i < $filasA; $i++) {
            for($j = 0; $j < $columnasB; $j++) {
                $matrizC[$i][$j] = 0;
            }
        }

        for($i = 0; $i < $filasA; $i++) {
            for($j = 0; $j < $columnasB; $j++) {
                for($k = 0; $k < $columnasA; $k++) {
                    $matrizC[$i][$j] += $matrizA[$i][$k] * $matrizB[$k][$j];
                }
            }
        }

        print '<h1>RESULTADO</h1>
            <br><p>Con los datos introducidos, el producto de las matrices A y B es:</p><br>
        ';

        print '<div class="tablas"><table>
            ';
        for($i = 0; $i < $filasA; $i++) {
            print '<tr>';
            for($j = 0; $j < $columnasA; $j++) {
                print "<td class='matriz'>
                                " . $matrizA[$i][$j] . "
                            </td>
                        ";
            }
            print '</tr>';
        }

        print '  </table>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p>&nbsp; X &nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <table>
            ';
        for($i = 0; $i < $filasB; $i++) {
            print '<tr>';
            for($j = 0; $j < $columnasB; $j++) {
                print "<td class='matriz'>
                                " . $matrizB[$i][$j] . "
                            </td>
                        ";
            }
            print '</tr>';
        }

        print '</div></table>';

        print '  </table>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p>&nbsp; = &nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <table>
            ';
        for($i = 0; $i < $filasA; $i++) {
            print '<tr>';
            for($j = 0; $j < $columnasB; $j++) {
                print "<td class='matriz'>
                                " . $matrizC[$i][$j] . "
                            </td>
                        ";
            }
            print '</tr>';
        }

        print '</div></table>';
    } else {
        $filasA    = $_REQUEST["filasA"];
        $filasB    = $_REQUEST["filasB"];
        $columnasA = $_REQUEST["columnasA"];
        $columnasB = $_REQUEST["columnasB"];  //Se almacenan los datos del formulario inicial en variables

        if($columnasA != $filasB) {
            print '<h1>DIMENSIÓN DE LAS MATRICES</h1>
                <br><p>El número de columnas de la primera matriz no coincide con el número de filas de la segunda.</p><br>
                <br><p><a href="ejer7.php">Introducir otros datos</a></p><br>
            ';
        } else {
            print "<h1>ELEMENTOS DE LAS MATRICES</h1>
                <br><br><h4>Rellena los elementos de cada una de las matrices con números entre 0 y 10.</h4><br><br>
                <form class='tablas' action='ejer7.php' method='post'>
                    <input type='hidden' name='filasA' value='$filasA'>
                    <input type='hidden' name='filasB' value='$filasB'>
                    <input type='hidden' name='columnasA' value='$columnasA'>
                    <input type='hidden' name='columnasB' value='$columnasB'>
                    <p>Matriz A = &nbsp;</p>
                    <table>
            ";
            for($i = 0; $i < $filasA; $i++) {
                print '<tr>';
                for($j = 0; $j < $columnasA; $j++) {
                    print "<td>
                            <input type='number' name='matrizA[$i][$j]' min='0' max='10' required>
                            </td>
                        ";
                }
                print '</tr>';
            }

            print '  </table>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <p>Matriz B = &nbsp;</p>
                    <table>
            ';
            for($i = 0; $i < $filasB; $i++) {
                print '<tr>';
                for($j = 0; $j < $columnasB; $j++) {
                    print "<td>
                            <input type='number' name='matrizB[$i][$j]' min='0' max='10' required>
                            </td>
                        ";
                }
                print '</tr>';
            }

            print '  </table>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <p><input type ="submit" value="Enviar datos"></p>
                </form>
            ';
        }
    }
} else {
    ?>

<h1>DIMENSIÓN DE LAS MATRICES</h1>
<br><br><h4>Introduce el número de filas y columnas de las matrices a multiplicar.</h4>
<br><p>El cálculo está limitado a matrices de dimensión 5. Las columnas de la matriz del primer término deben coincidir con las filas de la segunda matriz.</p><br>
<form action="ejer7.php" method="post">
    <label for="filasA">Nº de filas de la matriz en el primer término: </label>
    <input type="number" id="filasA" name="filasA" size="10" min="1" max="5" required><br><br>
    <label for="columnasA">Nº de columnas de la matriz en el primer término: </label>
    <input type="number" id="columnasA" name="columnasA" size="10" min="1" max="5" required><br><br>
    <label for="filasB">Nº de filas de la matriz en el segundo término: </label>
    <input type="number" id="filasB" name="filasB" size="10" min="1" max="5" required><br><br>
    <label for="columnasB">Nº de columnas de la matriz en el segundo término: </label>
    <input type="number" id="columnasB" name="columnasB" size="10" min="1" max="5" required><br><br>

    <input type="submit" name="submit" value="Enviar">
</form>

<?php
}
    ?>
		</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>