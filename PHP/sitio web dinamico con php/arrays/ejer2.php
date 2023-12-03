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
		<div>
<?php
function dibujarArray($array)
{
    print "<h2>DATOS DEL ARRAY RECIBIDO</h2>";
    print "<table>";
    print "<tr>";
    print "<th>INDICE</th>";
    print "<th>VALOR</th";
    print "</tr>";
    foreach ($array as $indice => $valor) {
        print "<tr>";
        print "<td>$indice</td>";
        print "<td>$valor</td>";
        print "</tr>";
    }
    print "</table>";
}

function dibujarArrayOrdenadoPorValor($array)
{
    //Primero ordenamos el array por valor de mayor a menor.
    //No se va a utilizar la llamada a rsort($array) ya que entonces ordena por valor
    //pero convierte a indices escalares con lo que perdemos las claves.
    //Mejor utilizamos arsort para que conserve  los índices originales
    //respetando cada índice con su correspondiente valor.
    arsort($array);
    print "<h2>DATOS DEL ARRAY RECIBIDO ORDENADOS POR VALOR</h2>";
    print "<table>";
    print "<tr>";
    print "<th>INDICE</th>";
    print "<th>VALOR</tdh";
    print "</tr>";
    foreach ($array as $indice => $valor) {
        print "<tr>";
        print "<td>$indice</td>";
        print "<td>$valor</td>";
        print "</tr>";
    }
    print "</table>";
}

function dibujarArrayOrdenadoPorIndice($array)
{
    print "<h2>DATOS DEL ARRAY RECIBIDO ORDENADOS POR CLAVE</h2>";
    ksort($array);
    print "<table>";
    print "<tr>";
    print "<th>INDICE</th>";
    print "<th>VALOR</tdh";
    print "</tr>";
    foreach ($array as $indice => $valor) {
        print "<tr>";
        print "<td>$indice</td>";
        print "<td>$valor</td>";
        print "</tr>";
    }
    print "</table>";
}

$localidades = [
    "Palencia"   => 80000,
    "Valladolid" => 350000,
    "Oviedo"     => 120000,
    "Madrid"     => 3320000,
    "Barcelona"  => 1620000,
    "Zaragoza"   => 666880,
    "Soria"      => 39112,
    "Huesca"     => 52463,
    "Teruel"     => 35691];

    //Llamadas a las distintas funciones implementadas
    print "<br>";
    print "<h1>LLAMADAS A FUNCIONES CON ARRAY DE LOCALIDADES</h1>";
    print "<br>";
    dibujarArray($localidades);
    print "<br>";
    dibujarArrayOrdenadoPorValor($localidades);
    print "<br>";
    dibujarArrayOrdenadoPorIndice($localidades);
    print "<br>";

    //Nueva prueba de funciones con otro array (el del ejercicio 2)
    print "<h1>LLAMADAS A FUNCIONES CON ARRAY DE RESULTADOS LIGA FUTBOL</h1>";
    $listaEquipos = [
        "F.C. Barcelona"  => 82,
        "Real Madrid"     => 84,
        "Atlético Madrid" => 78,
        "Valencia"        => 75,
        "Sevilla"         => 76,
        "Villarreal"      => 60,
        "Málaga"          => 50,
        "Espanyol"        => 47,
        "Athletic Bilbao" => 55,
        "Celta"           => 51,
        "Real Sociedad"   => 46,
        "Rayo Vallecano"  => 49,
        "Getafe"          => 36,
        "Osasuna"         => 33,
        "Elche"           => 41,
        "Deportivo"       => 38,
        "Almería"         => 29,
        "Levante"         => 37,
        "Granada"         => 35,
        "Zaragoza"        => 32];

    print "<br>";
    dibujarArray($listaEquipos);
    print "<br>";
    dibujarArrayOrdenadoPorValor($listaEquipos);
    print "<br>";
    dibujarArrayOrdenadoPorIndice($listaEquipos);
    print "<br>";
    ?>
		</div>
		</main>
        </main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>
