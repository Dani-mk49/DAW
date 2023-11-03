<?php
$hostname='145.14.151.1:3306';
$database='u812167471_tfgprofich';
$username='u812167471_daniadmin';
$password='Dam2023*';
$conexion=new mysqli($hostname, $username, $password,$database);
if($conexion->connect_errno){
	echo "el sitio web está experimentando problemas";
}
?>