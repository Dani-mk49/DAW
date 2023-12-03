<?php
// Creación de array de usuarios y claves
conectar();
    $sql = 'SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = "jardineria" AND table_name = "usuarios";';
    $consulta = mysqli_query($GLOBALS['conexion'], $sql) or exit("Fallo en consulta de verificacion de tabla");
    $fila = mysqli_fetch_row($consulta);
    if($fila[0] == 1) {
        //print "No se ha creado nada";
    } else {
        //print "Entrando dentro de creacion de tabla";
        conectar();
        $usuarios = ["jardinero" => "jardinero", "cristina" => "cristina", "enrique" => "enrique", "marta" => "marta"];

        //mysqli_select_db($GLOBALS['conexion'], "jardineria")                         or exit("No se puede seleccionar la base de datos");

        $sql = 'CREATE TABLE usuarios(
		nombre varchar(50) NOT NULL,
		clave varchar(100) NOT NULL,
		PRIMARY KEY (nombre)
		) engine=innodb;';
        $consulta = mysqli_query($GLOBALS['conexion'], $sql) or die("Fallo en creación tabla usuarios");
        foreach ($usuarios as $user => $pass) {
            $clave_encriptada = password_hash($pass, PASSWORD_BCRYPT);
            //print "$user:$pass:$clave_encriptada "; //Código de comprobación

            //password_verify es la función principal de verificación de contraseña: devuelve verdadero si el cifrado es correcto
            if (password_verify($pass, $clave_encriptada)) {
                $instruccion = "INSERT into usuarios (nombre, clave) values ('$user', '$clave_encriptada')";
                $consulta    = mysqli_query($GLOBALS['conexion'], $instruccion) or exit("Fallo en la inserción");
                //print "Usuario $user insertado con éxito.<br><br>";
            }
        }
    }
    desconectar();
    ?>
