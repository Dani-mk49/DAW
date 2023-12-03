<?php
$GLOBALS['conexion'] = null;

function conectar()
{
    //print'pasa conexion<br>';
    /*print $GLOBALS['hostname'] . $GLOBALS['database'] . $GLOBALS['username'] . $GLOBALS['password'];*/
    $GLOBALS['conexion'] = new mysqli("127.0.0.1", "root", "", "jardineria");
    //print'pasa bien conexion<br>';

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
