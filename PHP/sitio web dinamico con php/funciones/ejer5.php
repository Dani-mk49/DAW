<!DOCTYPE html>
<html lang="es">
<head>
	<title>Hoja 3. Ejercicio 5</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>FUNCIÓN CÍRCULO</h1>
    </header>
    <section>
        <nav></nav>
        <main>
		    <div>
                <?php
                    define("PI", 3.141592);       //También se puede definir una variable constante (const PI=3.141592) o simplemente usar pi() o M_PI, ya definidas en PHP
                function circulo($r, &$l, &$a)  //Paso por referencia de los parámetros $l y $a, referentes a la longitud y al área
                {
                    $l = 2  * PI * $r;
                    $a = PI * pow($r, 2);
                }

                print "<h1>Pruebas de función círculo</h1>";

                $radio = 3;
                circulo($radio, $longitud, $area);
                print "El círculo de radio $radio tiene longitd $longitud y área $area<br/>";

                circulo(4.5, $longitud, $area);
                print "El círculo de radio 4.5 tiene longitd $longitud y área $area<br/>";
                ?>
            </div>
		</main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>