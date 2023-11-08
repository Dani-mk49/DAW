<!DOCTYPE html>
<html lang="es">
<head>
    <title>Document</title>
</head>
<body>
<?php
include 'consultasBasicas.php';
datosConexion("127.0.0.1", "jardineria", "root", "");
$resultado = verTable("Clientes");
$nfilas    = mysqli_num_rows($resultado);
print '<table border="1"';
print '<tr>';
print '<th>codigo cliente</th>';
print '<th>nombre cliente</th>';
print '<th>nombre contacto</th>';
print '</tr>';
for($i = 0; i < $nfilas; $i++) {
    print '<tr>';
    print '<td></td>';
    print '<td></td>';
    print '<td></td>';
    print '</tr>';
}
?>
</body>
</html>