<!DOCTYPE html>
<html lang="es">
    <?php include '../includes/metadata2.php'; ?>
  <body>
    <?php include '../includes/header2.php'; ?>
    <?php include '../includes/menu2.php'; ?>
    <div class="contenedorCentral">
      <?php include '../includes/nav_funciones.php'; ?>
      <main>
      <a href="index.php">Inicio - Ejercicios de funciones</a>
		<div>
            <?php
                function conversordemonedas($euros, $divisa) //El parámetro $divisa significa la divisa destino, de la siguiente forma: 0 serán dolares y 1 serán libras
                {
                    if ($divisa == 0) {
                        $dolar = $euros * 1.0563;
                        return $dolar; // aquí devuelve el resultado en dólares
                    }

                    $libras = $euros * 0.8678;
                    return $libras; // aquí devuelve el resultado en libras

                }
                print "<h1>Pruebas de función para el cambio de divisas</h1>";

    $moneda    = rand(0, 1);
    $cantidad  = rand(1, 100);
    $resultado = conversordemonedas($cantidad, $moneda);
    if ($moneda == 0) {
        print "El resultado de convertir $cantidad euros a dolares es: $resultado USD<br/><br/>";
    } else {
        print "El resultado de convertir $cantidad euros a libras es: $resultado £<br/><br/>";
    } //Símbolo de la libra esterlina: Alt + 0163

    $moneda    = mt_rand(0, 1);       //Generador de números pseudo-aleatorios más eficiente, pero no seguro para encriptación
    $cantidad  = rand(1, 100);
    $resultado = conversordemonedas($cantidad, $moneda);
    if ($moneda == 0) {
        print "El resultado de convertir $cantidad euros a dolares es: $resultado USD<br/><br/>";
    } else {
        print "El resultado de convertir $cantidad euros a libras es: $resultado £<br/><br/>";
    }

    print mt_srand(time());      //Se puede tomar la hora del ordenador como semilla para el generador mt_rand
    $moneda    = mt_rand(0, 1);
    $cantidad  = rand(1, 100);
    $resultado = conversordemonedas($cantidad, $moneda);
    if ($moneda == 0) {
        print "El resultado de convertir $cantidad euros a dolares es: $resultado USD<br/><br/>";
    } else {
        print "El resultado de convertir $cantidad euros a libras es: $resultado £<br/><br/>";
    }

    $moneda = random_int(0, 1);    //Criptográficamente más seguro. También se puede usar random_bytes(),
    //openssl_random_pseudo_bytes() o uniqid(), este último basado en la hora actual en microsegundos
    //Los dos primeros generan números binarios y el tercero números hexadecimales. Se puede pasar de
    //binario a hexadecimal con el comando bin2hex() o a decimal con el comando bindec()
    $cantidad  = rand(1, 100);
    $resultado = conversordemonedas($cantidad, $moneda);
    if ($moneda == 0) {
        print "El resultado de convertir $cantidad euros a dolares es: $resultado USD<br/><br/>";
    } else {
        print "El resultado de convertir $cantidad euros a libras es: $resultado £<br/><br/>";
    }
    ?>
    </div>
		</main>
      <?php include '../includes/aside2.php'; ?>
      </div>
      <?php include '../includes/footer2.php'; ?>
    </body>
</html>