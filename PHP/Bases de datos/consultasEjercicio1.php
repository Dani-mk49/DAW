<?php
function consulta1($nombreTabla)
{
    try {
        if(!isset($conectar)){
            conectar();
        }
        $sentencia = $conexion->prepare('SELECT CodigoCliente, NombreCliente, NombreContacto FROM ?');
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
?>