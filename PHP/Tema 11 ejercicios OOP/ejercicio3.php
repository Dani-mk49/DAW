<!DOCTYPE html>
<html lang="es">
  <?php include 'racional.php'; ?>
<?php include 'consultas.php'; ?>
<?php include 'metadata.php'; ?>
<style>
  .especialDiv {
    display: inline-block;
    border: 2px groove blue;
    background-color: rgb(197, 197, 197);
    color: black;
    border-radius: 10px;
  }

  .reglas {
    width: 300px;
  }

  .operacion {
    padding: 30px;
  }

  .resultado {
    padding: 30px;
    width: 325px;
  }

  .Tresultado {
    border-collapse: collapse;
  }

  .Tresultado td,
  .Tresultado th {
    border: 1px black solid;
    padding: 3px;
  }
  .Tresultado th{
    color: white;
    background-color: darkblue;
  }
  .general{
    padding: 40px;
  }
</style>

<body>
  <?php include 'header3.php'; ?>
  <div class="contenedorCentral">
    <?php include 'nav.php'; ?>
    <main>
    <table style="margin: 0 auto;" >
    <tr>
      <td valign="top" rowspan="2" class="general">

        <fieldset class="especialDiv reglas">
          <legend><b>Reglas de uso de la calculadora</b></legend>

          <ul>
            <li>La calculadora se usa escribiendo la operacion completa.</li>
            <li>La operación será <b>Operando_1 operación Operando_2</b></li>
            <li>Cada operando puede ser un número positivo <b>entero</b> o <b>racional</b></li>
            <li>Los operadore racionales permitidos son <span style="color: blue;">+ - * :</span></li>
            <li>No se deben dejar espacios en blanco entre operandos y operación</li>
            <li>Ejemplos:
              <ul>
                <li>5+4</li>
                <li>5/2:2</li>
                <li>1/4*2/3</li>
                <li>2/7:1/3</li>
              </ul>
            </li>
          </ul>
        </fieldset>
      </td>
      <td class="general">

        <fieldset class="especialDiv operacion">
          <legend><b>Establece la operación</b></legend>
          <form action="ejercicio3.php">
            Operación:
            <input type="text" name="operacion" required>
            <input type="submit" value="Calcular" name="calcular">
            <?php

if (isset($_REQUEST['operacion'])) {?>
            <br>
            <span style="color: blue; font-weight: bold;">
              <?php
      // Divide la cadena en un array usando múltiples delimitadores
      $numeros = preg_split('/[+:*-]/', $_REQUEST['operacion']);

    // Filtra elementos vacíos que pueden surgir debido a delimitadores consecutivos
    $numeros = array_filter($numeros);

    // Utiliza preg_match para encontrar el primer separador en la cadena
    preg_match('/[+:*-]/', $_REQUEST['operacion'], $matches);

    // Utiliza el primer carácter encontrado como separador
    $signo     = $matches[0];
    $operando1 = new Racional($numeros[0]);
    $operando2 = new Racional($numeros[1]);
    print '<br>';
    switch ($signo) {
        case '+':
            $resultado = $operando1->sumar($operando2);
            break;
        case '-':
            $resultado = $operando1->restar($operando2);
            break;
        case '*':
            $resultado = $operando1->multiplicar($operando2);
            break;
        case ':':
            $resultado = $operando1->dividir($operando2);
            break;
    }

    // Imprime el resultado directamente
    print $operando1->__toString() . $signo . $operando2->__toString() . '=' . $resultado->__toString();

}
  ?>
          </span>
        </form>
      </fieldset>
    </td>
    </tr>
    <tr>
      <td class="general">

        <fieldset class="especialDiv resultado">
          <legend><b>Resultado</b></legend>
          <?php
if (isset($_REQUEST['operacion'])) {
    ?>
        <table class="Tresultado">
          <tr>
            <th>Concepto</th>
            <th>Valores</th>
          </tr>
          <tr>
            <td><b>Operando 1</b></td>
            <td align="center">
              <?php
                  print $operando1->__toString();
    ?>
            </td>
          </tr>
          <tr>
            <td><b>Operando 2</b></td>
            <td align="center">
              <?php
    print $operando2->__toString();
    ?>
              </td>
            </tr>
            <tr>
              <td><b>Operación</b></td>
              <td align="center">
                <?php
    print $signo;
    ?>
    </td>
  </tr>
  <tr>
    <td><b>Resultado</b></td>
    <td align="center">
      <?php
    print $resultado->__toString();
    ?>

</td>
</tr>
<tr>
  <td><b>Resultado simplificado</b></td>
  <td align="center">
    <?php
              $resultado->simplificar();
    print $resultado->__toString();
    ?>
            </td>
          </tr>
        </table>
        <?php
}
  ?>
      </fieldset>
    </td>
    </tr>
    </table>
  </main>
    <?php include 'aside.php'; ?>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
<script>
</script>