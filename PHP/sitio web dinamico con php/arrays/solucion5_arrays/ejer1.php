<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hoja 5. Ejercicio 1</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>
<body>
    <header>
        <h1>ARRAYS NUMÉRICOS</h1>
    </header>
    <section>
        <nav></nav>
        <main>
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

$randomArray = generarArrayAleatorio(50, 1, 100);
$uniqueArray = eliminarRepetidos($randomArray);
$average = calcularMedia($uniqueArray);

print "<br>Array aleatorio: " . implode(", ", $randomArray) . "<br>";
print "<br>Array sin duplicados: " . implode(", ", $uniqueArray) . "<br>";
print "<br>Media de los números:".round($average,2)."<br>";
?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>