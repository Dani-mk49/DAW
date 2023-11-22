<!DOCTYPE html>
<html lang="es">
<head>
    <title>Hoja 3. Ejercicio 3</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>NÚMEROS PRIMOS</h1>
    </header>
    <section>
        <nav></nav>
        <main>
		<div>
            <?php
                function esprimo1($x)
                {
                    if ($x == 1) {
                        return false;
                    }
                    if ($x == 2) {
                        return true;
                    }

                    for ($i = 2; $i <= $x/2; $i++) {
                        if ($x % $i == 0) {
                            return false;
                        }
                    }
                    return true;

                }

                function esprimo2($x)
                {
                    $a = 1;
                    $b = 0;
                    while ($a <= $x) {          //Bucle similar a for($a=1;$a<=x;$a++)
                        if ($x % $a == 0) {
                            $b++;
                        }
                        $a++;
                    }
                    if ($b == 2) {              //Solo si el número es divisible por 1 y por sí mismo se obtendrá $b==2, luego será un número primo
                        return true;
                    }

                    return false;
                }

                function esprimo3($x)       //Función recursiva: resulta poco eficiente
                {
                    static $numero = 0;       //Se define una variable estática que conservará el valor de $x inicial en las sucesivas llamadas a la función
                    if ($x == 1) {              //En cuanto $x llegue a 1 sin haber obtenido un resto 0 en alguna de las divisiones, el número es primo
                        $numero = 0;          //Se reinicia la variable estática a 0 para poder volver a utilizar la función posteriormente
                        return true;
                    }

                    if ($numero==0) {           //Si la variable auxiliar es 0 (distinta de cualquier otro número), tomará el valor inicial de $x
                        $numero = $x;
                        $x--;
                    }

                    if ($numero % $x == 0) {      //Si en alguna de las divisiones se obtiene resto 0, el número no es primo
                        $numero = 0;
                        return false;
                    }

                    return esprimo3(--$x);   //Se vuelve a llamar a la función restándole 1
                }

                print "<h1>Pruebas de función para números primos</h1>";
            print "<h2>Función <em>esprimo1</em></h2>";

            $n = rand(1, 20);
            if (esprimo1($n)) {
                print "El número $n es primo.<br/>";
            } else {
                print "El número $n no es primo.<br/>";
            }

            $n = rand(1, 20);
            if (esprimo1($n)) {
                print "El número $n es primo.<br/>";
            } else {
                print "El número $n no es primo.<br/>";
            }

            print "<h2>Función <em>esprimo2</em></h2>";
            $n = rand(1, 20);
            if (esprimo2($n)) {
                print "El número $n es primo.<br/>";
            } else {
                print "El número $n no es primo.<br/>";
            }

            $n = rand(1, 20);
            if (esprimo2($n)) {
                print "El número $n es primo.<br/>";
            } else {
                print "El número $n no es primo.<br/>";
            }

            print "<h2>Función <em>esprimo3</em></h2>";
            $n = rand(1, 20);
            if (esprimo3($n)) {
                print "El número $n es primo.<br/>";
            } else {
                print "El número $n no es primo.<br/>";
            }

            $n = rand(1, 20);
            if (esprimo3($n)) {
                print "El número $n es primo.<br/>";
            } else {
                print "El número $n no es primo.<br/>";
            }
            ?>
        </div>
            </main>
            <aside></aside>
        </section>
        <footer></footer>
    </body>
</html>