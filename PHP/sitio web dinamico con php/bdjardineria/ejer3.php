<!DOCTYPE HTML>
<html lang="es">
<head>
   <meta charset="utf-8" />
   <title>Hoja 6. Ejercicio 3</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>

<body>
    <header>
        <h1>Estadística de productos por gama</h1>
    </header>
    <section>
        <nav></nav>
        <main>
<?php
   // Conectar con el servidor de base de datos
   $conexion = mysqli_connect ("localhost", "jardinero", "jardinero")
      or die ("No se puede conectar con el servidor");

   // Seleccionar base de datos
   mysqli_select_db ($conexion,"jardineria")
      or die ("No se puede seleccionar la base de datos");

   // Enviar consulta
   $instruccionSQL="SELECT productos.Gama, gamasproductos.DescripcionTexto, COUNT(*) FROM productos INNER JOIN gamasproductos ON productos.Gama=gamasproductos.Gama GROUP BY productos.Gama";
   $resulconsulta = mysqli_query ($conexion,$instruccionSQL)
      or die ("Fallo en la consulta");

   // Mostrar resultados de la consulta
   $nfilas = mysqli_num_rows ($resulconsulta);
   if ($nfilas > 0)
   {
      print ("<table>");
      print ("<tr>");
      print ("<th>Gama</th>");
      print ("<th>Descripción</th>");
      print ("<th>Nº de productos</th>");
      print ("</tr>");

      for ($i=1; $i<=$nfilas; $i++)
      {
         $unafila = mysqli_fetch_row ($resulconsulta);
	      print ("<tr>");
         print ("<td>" . $unafila[0] . "</td>");
         print ("<td>" . $unafila[1] . "</td>");
         print ("<td>" . $unafila[2] . "</td>");
         print ("</tr>");
      }
      print ("</table>");
   }
   else
      print ("No hay productos");

   // Cerrar conexión
   mysqli_close ($conexion);
?>
      </main>
      <aside></aside>
   </section>
   <footer></footer>
</body>
</html>