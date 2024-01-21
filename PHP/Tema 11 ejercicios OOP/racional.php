<?php
class Racional
{
    private $numerador;

    private $denominador;

    public function __construct($numero1 = null, $numero2 = null)
    {
        //falta de testear
        if($numero1 == null && $numero2 ==null) {
            $this->numerador = 1;
            $this->denominador = 1;
        } elseif ($numero1 != null && $numero2 == null && is_numeric($numero1)) {
            $this->numerador = $numero1;
            $this->denominador = 1;
        } elseif($numero1 != null && $numero2 != null) {
            $this->numerador = $numero1;
            $this->denominador = $numero2;
        } elseif (preg_match('/^\d+\/\d+$/', $numero1)) {
            $numeros = explode('/', $numero1);
            $this->numerador = $numeros[0];
            $this->denominador = $numeros[1];
        }
    }
    public function getNumerador()
    {
        return $this->numerador;
    }

    public function getDenominador()
    {
        return $this->denominador;
    }

    public function setNumerador($numerador): void
    {
        $this->numerador = $numerador;
    }

    public function setDenominador($denominador): void
    {
        $this->denominador = $denominador;
    }


    public function sumar($valor1, $valor2)
    {
        $valorExtra = $valor1;
        $valorExtra2 = $valor2;
        $valorExtra->setDenominador($valor1->getDenominador() * $valor2->getDenominador());
        $valorExtra->setNumerador($valor1->getNumerador() * $valor2->getDenominador());
        $valorExtra2->setDenominador($valor2->getDenominador() * $valor1->getDenominador());
        $valorExtra2->setNumerador($valor2->getNumerador() * $valor1->getDenominador());
        $numerador = $valorExtra->getNumerador() + $valorExtra2->getNumerador();
        return new Racional($numerador, $valorExtra2->getDenominador());
    }
    public function __toString(): string
    {
        return $this->numerador.'/'.$this->denominador;
    }
}
