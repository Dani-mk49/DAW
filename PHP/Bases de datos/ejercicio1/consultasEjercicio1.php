<?php
function consulta1($nombreTabla)
{
    try {
        if(!isset($conectar)){
            conectar();
            //print'despues de conectar en la consulta<br>';
        }
        $sentencia = $GLOBALS['conexion']->prepare('SELECT CodigoCliente, NombreCliente, NombreContacto FROM clientes');
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        //print'antes de enviar el resultado<br>';
        return $resultado;
    } catch (Excepcion $excepcion) {
        //print'ha entrado dentro del error<br>';
        exit("Error al obtener el resultado: " . $excepcion);
    } finally {
        //print'antes de desconectar en la consulta<br>';
        desconectar();
    }
}
?>