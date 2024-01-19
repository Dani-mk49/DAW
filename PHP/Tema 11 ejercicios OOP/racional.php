<?php
class Racional{
    private $numerador;
    private $denominador;

    public function __construct($numero){
        if (preg_match('/^\d{1,}$/', $numero)) {
            echo "El número es válido.\n";
        }
    }
}
?>