<?php
include 'conexion.php';
$usu_dni=$_POST['dni'];


//$usu_dni="72903471a";

$sentencia=$conexion->prepare("INSERT INTO registro (registro.DNI) VALUES (?)");

$sentencia->bind_param('s', $usu_dni);
$sentencia->execute();

$num_filas_afectadas = $sentencia->affected_rows;

if ($num_filas_afectadas > 0) {
    echo "true";
} else {
    echo "false";
}
$sentencia->close();
$conexion->close();
?>