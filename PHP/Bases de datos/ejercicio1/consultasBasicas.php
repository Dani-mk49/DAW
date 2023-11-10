<?php

$GLOBALS['hostname'] = null;
$GLOBALS['database'] = null;
$GLOBALS['username'] = null;
$GLOBALS['password'] = null;
$GLOBALS['conexion'] = null;

// global $hostname, $database, $username, $password, $conexion;
function datosConexion($host, $db, $user, $pass)
{
    //print $host . $db . $user . $pass;
    $GLOBALS['hostname'] = $host;
    $GLOBALS['database'] = $db;
    $GLOBALS['username'] = $user;
    $GLOBALS['password'] = $pass;

}
function limpiarDatosConexion()
{
    $GLOBALS['hostname'] = null;
    $GLOBALS['database'] = null;
    $GLOBALS['username'] = null;
    $GLOBALS['password'] = null;
}
function conectar()
{
    //print'pasa conexion<br>';
    /*print $GLOBALS['hostname'] . $GLOBALS['database'] . $GLOBALS['username'] . $GLOBALS['password'];*/
    if(isset($GLOBALS['hostname'], $GLOBALS['database'], $GLOBALS['username'], $GLOBALS['password'])) {
        $GLOBALS['conexion'] = new mysqli($GLOBALS['hostname'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        //print'pasa bien conexion<br>';
    }
    if($GLOBALS['conexion']->connect_error) {
        exit("La conexion no se pudo realizar el fallo es: " . $GLOBALS['conexion']->connect_error);
      //  print'pasa mal conexion<br>';
    }

}

function desconectar()
{
    $GLOBALS['conexion']->close();
    //print'despues de cerrar la conexion<br>';
}
//esto no funciona no pilla bien el ?
function verTable($nombreTabla)
{
    try {
        if(!isset($conectar)) {
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
