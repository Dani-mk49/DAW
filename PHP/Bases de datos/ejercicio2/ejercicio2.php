<!DOCTYPE html>
<html lang="es">
<head>
  <title>Document</title>
  <style>
    body {
      padding: 0;
      margin: 0;
      background-color: grey;
    }

    .arriba {
      display: flex;
      background-color: black;
      color: white;
      justify-content: center;
      align-items: center;
      align: center;
      height: 100px;
    }

    h1 {
      margin: 0;
    }

    .centro {
      background-color: white;
      width: 650px;
      padding: 5px;
      margin: 0 auto;
      justify-content: center;
    }

  </style>
</head>

<body>
  <div class="arriba">
    <h1>CUESTIONARIO</h1>
  </div>
  <div class="centro">
    <form action="ejercicio2.php">
      Selecciona el telefono del cliente:
      <br>
      <input type="button" value="Enviar consulta">
      <select name="telfCliente">
        <?php
        //hacer aqui la consulta para recuperar los datos
        ?>
        </select>
        <?php
        if($_REQUEST) {
        ?>
      Codigo Cliente <input type="text" name="codigoCliente" disabled><br>
      Nombre Cliente: <input type="text" name="nombreCliente"><br>
      Nombre contacto: <input type="text" name="nombreContacto"><br>
      Apellido Contacto: <input type="text" name="apellidoContacto"><br>
      Teléfono: <input type="text" name="telefono"><br>
      Fax: <input type="text" name="fax"><br>
      Linea Direccion1: <input type="text" name="direccion1"><br>
      Linea Direccion2: <input type="text" name="direccion2"><br>
      Ciudad: <input type="text" name="ciudad"><br>
      Region: <input type="text" name="region"><br>
      Pais: <input type="text" name="pais"><br>
      Codigo Postal<input type="text" name="codigoPostal"><br>
      Codigo Empleado Representante ventas<input type="text" name="codRepVentas"><br>
      Limite credito<input type="text" name="limiteCredito"><br>
      <input type="submit" value="Modificar cliente">
      <a href="ejercicio2.php">Vuelve al listado de clientes</a>
    </form>
  <?php
  }
include 'consultasBasicas.php';
        datosConexion("127.0.0.1", "jardineria", "root", "");
        $resultadoConsulta = consulta1("clientes");
        $nfilas            = mysqli_num_rows($resultadoConsulta);
        print '<table border="1"';
        print '<tr>';
        print '<th>codigo cliente</th>';
        print '<th>nombre cliente</th>';
        print '<th>nombre contacto</th>';
        print '</tr>';
        for($i = 0; $i < $nfilas; $i++) {
            $resultado = mysqli_fetch_array($resultadoConsulta);
            print '<tr>';
            print '<td>' . $resultado['CodigoCliente'] . '</td>';
            print '<td>' . $resultado['NombreCliente'] . '</td>';
            print '<td>' . $resultado['NombreContacto'] . '</td>';
            print '</tr>';
        }
        print '</table>';
        ?>
  </div>
</body>
</html>
