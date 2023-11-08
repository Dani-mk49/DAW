<?php

global $hostname;
global $database;
global $username;
global $password;
global $conexion;

function datosConexion($host, $db, $user, $pass)
{
    $hostname = $host;
    $database = $db;
    $username = $user;
    $password = $pass;
}
function limpiarDatosConexion(){
    $hostname = null;
    $database = null;
    $username = null;
    $password = null;
}
function conectar()
{
    if(isset($hostname) && isset($database) && isset($username) && isset($password)) {
        $conexion = new mysqli($hostname, $username, $password, $database);
    }
    if($conexion->connect_error) {
        exit("La conexion no se pudo realizar el fallo es: " . $conexion->connect_error);
    }

}

function desconectar()
{
    $conexion->close();
}

function verTable($nombreTabla)
{
    try {
        if(!isset($conectar)){
            conectar();
        }
        $sentencia = $conexion->prepare("SELECT * FROM ?");
        $sentencia->bind_param('s', $nombreTabla);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        return $resultado;
    } catch (Excepcion $excepcion) {
        exit("Error al obtener el resultado: " . $excepcion);
    } finally {
        desconectar();
    }
}
