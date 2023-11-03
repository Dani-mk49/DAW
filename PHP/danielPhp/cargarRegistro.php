<?php
include 'conexion.php';
$usu_dni=$_POST['dni'];


//$usu_dni="30427309B";

$sentencia=$conexion->prepare("SELECT registro.DNI, registro.hora_entrada, registro.hora_entrada_descanso, registro.hora_salida_descanso, registro.hora_entrada_comida, registro.hora_salida_comida, registro.hora_de_salida FROM registro WHERE registro.dni=?");

$sentencia->bind_param('s', $usu_dni);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
echo json_encode($fila, JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conexion->close();
?>