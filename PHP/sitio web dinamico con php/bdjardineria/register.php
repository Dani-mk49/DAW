<!DOCTYPE html>
<html lang="es">
<?php include '../includes/metadata2.php'; ?>
<style>
  td{
    text-align: left;
    padding: 15px;
  }
</style>
<body>
  <?php include '../includes/header2.php'; ?>
  <?php include '../includes/menu2.php'; ?>
  <div class="contenedorCentral">
    <?php include '../includes/nav_bbdd.php'; ?>
    <main align="center">
      <?php include 'creacionDeTablaUsuarios.php' ?>
      <a href="index.php" style="display: flex; justify-content: start;">Inicio - Ejercicios BBDD</a>
      <?php
//Problemas de seguridad por inyección de código SQL malicioso.
//"SQL Injection" es una técnica de ataque a paginas, que intentan colar código SQL
// dentro del codigo SQL de la aplicación destino, para romper o acceder a información almacenada en la base de datos.
//Estas técnicas se basan en añadir código SQL malicioso a través de los formularios de entrada de datos de la aplicación web.
//Se muestra aquí un ejemplo clásico de posible inyección de código SQL y una posible solución a este "agujero de seguridad"
//por medio del uso de la función mysqli_real_escape_string que recibe un texto y lo devuelve a formato seguro.

//Mostrar formulario pidiendo usuario y clave
print '<h2>FORMULARIO DE REGISTRO EN LA BASE DE DATOS</h2>';
if (!isset($_REQUEST['registrar'])) {?>

      <form action='register.php' method='get'><br>
        <table align="center" width="400px">
          <tr>
            <td>Usuario:</td>
            <td>
              <input type='text' name='usuario' size='15'>
            </td>
          </tr>
          <tr>
            <td>Contraseña:</td>
            <td>
              <input type='password' name='clave' size='15'>
            </td>
          </tr>
          </tr>
          <tr>
            <td>Vuelva a introducir la contraseña:</td>
            <td>
              <input type='password' name='claveRepe' size='15'>
            </td>
          </tr>
          <tr><td></td><td style="text-align: center;">
            <input type='submit' name='registrar' value='Registrarse'>
          </td></tr>
        </table>
      </form>
      <?php
} elseif($_REQUEST['clave'] != $_REQUEST['claveRepe']) {
    print '<p>Los campos para la contraseña no coinciden. Vuelva a introducir los datos en el <a href="register.php">formulario</a> de registro.</p>';
} else {
    // Comprobar que el usuario está autorizado a consultar la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "jardineria") or exit("No se puede conectar con el servidor");
    //mysqli_select_db($conexion, "jardineria")                         or exit("No se puede seleccionar la BD");
    //Versión insegura: permite "inyección SQL"
    //Probar ésta introduciendo en el formulario cualquier cosa en usuario y en password: ' or '1'='1
    //y observar que entonces la condición WHERE del SELECT siempre se cumple ya que se convierte en:
    //SELECT nombre, pass FROM usuarios WHERE nombre='....' and pass='' or '1'='1'
    //con lo cual permite acceder sin introducir el usuario y password correctos. FALLO DE SEGURIDAD.
    //$usuario             = $_REQUEST['usuario'];
    //$clave               = $_REQUEST['clave'];
    //$sql = "SELECT nombre, clave FROM usuarios WHERE nombre='$usuario' AND clave='$clave'";
    //$resulcomprobacion   = mysqli_query($conexion, $sql) or exit("Fallo en acceso a comprobación1");

    //Versión más segura: hace uso de función mysqli_real_scape_string que recibe un texto y lo devuelve a su formato seguro:
    //lo que hace es pasar a forma escapada los caracteres peligrosos (como comillas, saltos de línea, punto y coma, etc),
    //así, por ejemplo, la comilla simple (') se convierte en (\'), con lo cual no se pueden delimitar nuevas
    //instrucciones o elementos y estaremos más seguros ante una inyección SQL
    $usuario = mysqli_real_escape_string($conexion, $_REQUEST['usuario']);
    //$clave = mysqli_real_escape_string($conexion, $_REQUEST['clave']);
    $sql="select nombre from usuarios where nombre='$usuario'";
    //$sql="select nombre, clave from usuarios where nombre='$usuario' and clave='$clave'";
    $resulcomprobacion = mysqli_query($conexion, $sql) or die("Fallo en acceso a comprobación2");

    //Otra forma de implementar versión más segura. Probarlo también  así:
    //$usuario=$_REQUEST['usuario'];
    //$clave=$_REQUEST['clave'];
    //$sql="select nombre, pass from usuarios where nombre='$usuario' and pass='$clave'";
    //$sqlseguro=mysqli_real_escape_string($conexion,$sql);
    //$resulcomprobacion = mysqli_query ($conexion,$sql) or die("Fallo en acceso a comprobación2");

    /*print mysqli_num_rows($resulcomprobacion).'<br>';
    print $_REQUEST['usuario'].'<br>';
    print password_hash($_REQUEST['clave'], PASSWORD_BCRYPT).'<br>';*/
    if (mysqli_num_rows($resulcomprobacion) > 0) { //Comprobación satisfactoria. usuario y contraseña correctos
        print '<p>El usuario '.$_REQUEST['usuario'].' ya está registrado en la base de datos. Puede indentificarse <a href="login.php">aquí</a></p>';

    } else {
        $usuario = mysqli_real_escape_string($conexion, $_REQUEST['usuario']);
        $clave = mysqli_real_escape_string($conexion, password_hash($_REQUEST['clave'], PASSWORD_BCRYPT));
        $sql="INSERT into usuarios (nombre, clave) values('$usuario', '$clave')";
        print '<p>Usuario '.$_REQUEST['usuario'].' insertado con éxito. Ahora puede <a href="login.php">identificarse</a> para visualizar los ejercicios de esta sección</p>';
        $consulta    = mysqli_query($conexion, $sql) or exit("Fallo en la inserción");
    }
    mysqli_close($conexion);
}
?>
    </main>
    <?php include '../includes/aside2.php'; ?>
  </div>
  <?php include '../includes/footer2.php'; ?>
</body>
</html>