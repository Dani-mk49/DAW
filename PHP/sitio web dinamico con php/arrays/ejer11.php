<?php
    function PALINDROMO($str){

        $Mstr=strtoupper($str);     //Convertimos la frase a mayúsculas
        $Vstr=str_replace(' ','', $Mstr);   //Eliminamos los espacios entre palabras sustituyéndolos por ningún carácter (nada entre las comillas)
        $Rstr=strrev($Vstr);        //Le damos la vuelta a la cadena de caracteres en mayúsculas y sin espacios
        echo "<br>El texto introducido es: $Mstr";
        echo "<br><br>";
        if ($Rstr==$Vstr){
            echo "Se trata de un palíndromo.<br>";
        }else{
            echo "No se trata de un palíndromo.<br>";
        }
}
//Otra versión: la función palíndromo averigua si es o no una frase palíndromo y devuelve true si es cierto o false si no lo es
function esPALINDROMO($str){

        $Mstr=strtoupper($str);
        $Vstr=str_replace(' ', '', $Mstr);
        $Rstr=strrev($Vstr);
        if ($Rstr==$Vstr){
            return true;
        }else{
            return false;
        }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Hoja 5. Ejercicio 6</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
    <body>
    <header>
        <h1>PALÍNDROMOS</h1>
    </header>
    <section>
        <nav></nav>
        <main>
		<div>
            <?php
            if($_REQUEST) {
                // Probamos 1ª versión
                $cadenaRecibida = $_REQUEST['STRING'];
                PALINDROMO($cadenaRecibida);
                // Probamos 2ª versión
                if(espalindromo($cadenaRecibida)) {
                    print '<br>La cadena "'.$cadenaRecibida.'" SÍ es un palíndromo.<br><br>';
                } else {
                    print '<br>La cadena "'.$cadenaRecibida.'" NO es un palíndromo.<br><br>';
                }
            }
            ?>
            <br>
            <h1>Formulario</h1>
            <form action="ejer6.php" method="post">
                <label for="STRING">Introduce texto</label><br>
                <input type="text" name="STRING" size="40"><br><br>
                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>
		</main>
        <aside></aside>
    </section>
    <footer></footer>
	</body>
</html>