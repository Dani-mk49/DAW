<?php
session_start();

// Si el número no está guardado en la sesión, ponemos el valor a cero
if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = 0;
}

// Recogemos accion
$accion = $_REQUEST["accion"];

// Dependiendo de la acción recibida, modificamos el número guardado
if ($accion == "cero") {
    $_SESSION["numero"] = 0;
} elseif ($accion == "subir") {
    $_SESSION["numero"]++;
} elseif ($accion == "bajar") {
    $_SESSION["numero"]--;
}
echo "Esto es una prueba. Valor de número: ".$_SESSION['numero'];
// Volvemos al formulario
header("Location:ejer3a_1formulario.php");
?>