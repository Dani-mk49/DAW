<!DOCTYPE html>
<html lang="es">
<head>
    <title>Hoja 3. Ejercicio 1</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>TABLAS DE NÚMEROS NATURALES</h1>
    </header>
    <section>
        <nav></nav>
        <main>
		<div>
            <?php
                function tablaNxM($n,$m)
                {
                    echo "<h1>TABLA HTML DE $n x $m</h1>";
                    echo "<table border='1'>";
                    $numero=1;
                    for ($i=1;$i<=$n;$i++)
                    {
                        echo '<tr>' ;
                        for ($j=1;$j<=$m;$j++)
                        {
                            echo '<td>';
                            echo $numero;
                            echo '</td>';
                            $numero++;
                        }
                        echo '</tr>';
                    }
                    echo "</table>";
                }

                //Varias llamadas a la función para probarla
                tablaNxM(5,7);

                $nfilas=6;
                $ncolumnas=3;
                tablaNxM($nfilas,$ncolumnas);

                echo '</div><div style="margin-left: 50px">';

                $nfilas=10;
                $ncolumnas=10;
                tablaNxM($nfilas,$ncolumnas);

                $nfilas=2;
                $ncolumnas=15;
                tablaNxM($nfilas,$ncolumnas);

                ?>
        </div>
		</main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>