<?php

$GLOBALS['hostname'] = '127.0.0.1';
$GLOBALS['database'] = 'geografia';
$GLOBALS['username'] = 'root';
$GLOBALS['password'] = '';
$GLOBALS['conexion'] = null;

// global $hostname, $database, $username, $password, $conexion;
/*function datosConexion()
{
    //print $host . $db . $user . $pass;
    $GLOBALS['hostname'] = 'localhost';
    $GLOBALS['database'] = 'geografia';
    $GLOBALS['username'] = 'root';
    $GLOBALS['password'] = '';

}*/

function conectar()
{
    //print'pasa conexion<br>';
    // print $GLOBALS['hostname'] . $GLOBALS['database'] . $GLOBALS['username'] . $GLOBALS['password'];
    $GLOBALS['conexion'] = new mysqli("127.0.0.1", "root", "", "geografia");
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


//SELECT comunidades.nombre AS "comunidad", localidades.nombre AS"capital" FROM comunidades INNER JOIN localidades ON comunidades.id_capital = localidades.id_localidad
