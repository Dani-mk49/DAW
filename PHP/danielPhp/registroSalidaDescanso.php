<?php
include 'conexion.php';
$usu_dni=$_POST['dni'];

//$usu_dni = "72903471a";
$sql = "CALL phora_salida_descanso(?)";

$sentencia = $conexion->prepare($sql);
$sentencia->bind_param('s', $usu_dni);
$sentencia->execute();

if ($sentencia->errno === 0) {
    echo "true";
} else {
    echo "false";
}

$sentencia->close();
$conexion->close();
?>