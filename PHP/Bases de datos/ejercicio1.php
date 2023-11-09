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
      padding-left: 100px;
      padding-top: 200px;
      margin: 0 auto;
      height: 85vh;
      justify-content: center;
    }

  </style>
</head>

<body>
  <div class="arriba">
    <h1>CUESTIONARIO</h1>
  </div>
  <div class="centro">
  </div>
  <?php
include 'consultasBasicas.php';
include 'consultasEjercicio1.php';
datosConexion("127.0.0.1", "jardineria", "root", " ");
$resultadoConsulta = consulta1("clientes");
$nfilas    = mysqli_num_rows($resultadoConsulta);
print '<table border="1"';
print '<tr>';
print '<th>codigo cliente</th>';
print '<th>nombre cliente</th>';
print '<th>nombre contacto</th>';
print '</tr>';
for($i = 0; i < $nfilas; $i++) {
    $resultado = mysqli_fetch_array($resultadoConsulta);
    print '<tr>';
    print '<td>'. $resultado['CodigoCliente'] .'</td>';
    print '<td>'. $resultado['NombreCliente'] .'</td>';
    print '<td>'. $resultado['NombreContacto'] .'</td>';
    print '</tr>';
}
print '</table>';
?>
</body>
</html>
