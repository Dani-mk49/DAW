<?php
include 'conexion.php';
$usu_usuario=$_POST['usuario'];
$usu_password=$_POST['password']; 

//$usu_usuario="admin";
//$usu_password="1234";
$sentencia=$conexion->prepare("SELECT personal.dni, personal.username, personal.password FROM personal WHERE personal.username=? AND personal.password=?");

$sentencia->bind_param('ss', $usu_usuario, $usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
echo json_encode($fila, JSON_UNESCAPED_UNICODE);
}
$sentencia->close();
$conexion->close();
?>