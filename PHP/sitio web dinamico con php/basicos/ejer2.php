<!DOCTYPE html>
<html lang="es">
<head>
	<title>Hoja 2. Ejercicio 2</title>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<header>
    <h1>CAMBIO DE DIVISA</h1>
  </header>
  <section>
    <nav></nav>
    <main>
        <div>
        <?php
        $cantidad = $_REQUEST['cantidad'];
        $moneda   = $_REQUEST['tipo'];
        $dolar    = 1.0563;
        $libra    = 0.8678;
        if ($moneda == 'dolar') {
            $cambio = $cantidad * $dolar;
            print "$cantidad euros equivalen a $cambio dólares estadounidenses.<br>";
        } else {
            $cambio = $cantidad * $libra;
            print "$cantidad euros equivalen a $cambio libras esterlinas.<br>";
        }
        ?>
        <br><a href="ejer2form.html">Volver a pedir nueva conversión</a>
        </div>
    </main>
    <aside></aside>
  </section>
  <footer></footer>
</body>
</html>