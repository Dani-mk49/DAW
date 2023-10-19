<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    form {
      background-color: white;
      width: 650px;
      padding: 5px;
      padding-left: 100px;
      margin: 0 auto;
      height: 100%;
    }

  </style>
</head>

<body>
  <?php
if(!$_POST){
?>
  <div class="arriba">
    <h1>CUESTIONARIO</h1>
  </div>
  <form action="corregir()" method="post">
    <p>Introduce tu nombre: <input type="text" name="nombre"></p>
    <p>Introduce tus apellidos: <input type="text" name="apellidos"></p>
    <p>Pregunta 1: Marca la respuesta correcta</p>
    <p><input type="radio" name="pregunta1" value="respuesta1">PHP es un lenguaje de "script" de serviror</p>
    <p><input type="radio" name="pregunta1" value="respuesta2">PHP es un lenguaje de "script" de cliente</p>
    <p><input type="radio" name="pregunta1" value="respuesta3">PHP es un lenguaje tipado</p>
    <p><input type="radio" name="pregunta1" value="respuesta4">PHP es un lenguaje de marcas</p>
    <p>Pregunta 2: Marca la o respuestas correctas</p>
    <p><input type="checkbox" name="Pregunta2" value="respuesta1">Los script PHP son interpretados por los navegadores web</p>
    <p><input type="checkbox" name="Pregunta2" value="respuesta2">Los scripts JavaScript son interpretados por los navegadores web</p>
    <p><input type="checkbox" name="Pregunta2" value="respuesta3">Los scripts PHP no necesitan ser interpretados</p>
    <p><input type="checkbox" name="Pregunta2" value="respuesta4">Los srcipts PHP van endebidos dentro del codigo HTML</p>
    <input type="submit" name="enviar" id="" value="Enviar">
    <input type="button" name="borrar" id="" value="Borrar">
  </form>
  <?php
}else{
function corregir(){

}
}
?>
</body>
</html>
