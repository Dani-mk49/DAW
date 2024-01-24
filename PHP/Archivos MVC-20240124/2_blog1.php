<?php
// Conectamos con la base de datos
$db = new mysqli('mi-host', 'mi-usuario', 'mi-clave', 'mi-base-de-datos');
// Lanzamos una consulta para recuperar los artículos que haya en la base de datos
$res = $db->query('SELECT fecha, titulo FROM articulo');

// Generamos una tabla HTML con el resultado de la consulta
echo "<h1>Listado de Artículos</h1>";
echo "<table>";
echo "<tr> <th>Fecha</th> <th>Titulo</th> </tr>";
while ($row = $res->fetch_array()) {   // Recorremos fila a fila el resultado de la consulta
    echo "<tr> <td> ".$row['fecha']." </td> <td> ".$row['titulo']." </td> </tr>";
}
echo "</table>";
$db->close();   // Cerramos la conexión con la BD
?>