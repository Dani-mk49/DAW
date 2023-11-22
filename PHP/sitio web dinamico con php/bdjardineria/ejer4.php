<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Hoja 6. Ejercicio 4</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilosimple.css">
</head>
<body>
    <header>
        <h1>CONSULTA DE CLIENTES POR PAIS</h1>
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

    if (isset($_REQUEST['enviar']))
    {
        $pais=$_REQUEST['Pais'];
        // Enviar consulta
        $instruccion = "SELECT CodigoCliente, NombreCliente, NombreContacto, ApellidoContacto  FROM  clientes WHERE Pais='$pais' ORDER BY CodigoCliente";
        $resconsulta = mysqli_query ($conexion,$instruccion)
            or die ("Fallo en la consulta");
        // Mostrar resultados de la consulta
        echo "<h1>LISTADO  DE CLIENTES DE --".$pais."-- EN BD JARDINERIA</h1><br>";
        echo "<table>";
        echo "<tr> <th>CÓDIGO</th> <th>NOMBRE</th> <th>NOMBRE CONTACTO</th> <th>APELLIDO CONTACTO</th> </tr>";
        while ($resultado = mysqli_fetch_row ($resconsulta))
        {
            echo "<tr>";
            for($i=0;$i<4;$i++){
                echo"<td>" .$resultado[$i]. "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</br><a href='ejer4.php'>Realizar nueva consulta</a>";
    }
    else
    {
        echo "<h1>Consulta de clientes por pais</h1><br>";
        $instruccion = "SELECT DISTINCT Pais FROM clientes ORDER BY Pais";
        $resconsulta = mysqli_query ($conexion,$instruccion)
            or die ("Fallo en la consulta");

        print ("<form action='ejer4.php' method='GET'>");
        print ("Elige País &nbsp");
        print ("<select name='Pais'>");
        $nfilas = mysqli_num_rows ($resconsulta);
        if ($nfilas > 0)
        {
            for ($i=1; $i<=$nfilas; $i++)
            {
                $resultado = mysqli_fetch_row ($resconsulta);
                echo "<option>". $resultado[0]."</option>";
            }
        }
        print ("</select>");
        print ("<br><br><p><input type='submit' name='enviar' value='Enviar consulta'></p>");
        print ("</form>");
    }
    // Cerrar conexión
    mysqli_close ($conexion);
?>
        </main>
        <aside></aside>
    </section>
    <footer></footer>
</body>
</html>