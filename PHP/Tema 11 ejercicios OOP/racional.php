<?php

class Racional
{
    private $numerador;

    private $denominador;

    public function __construct($numero1 = null, $numero2 = null)
    {
        if($numero1 == null && $numero2 == null) {
            $this->numerador   = 1;
            $this->denominador = 1;
        } elseif ($numero1 != null && $numero2 == null && is_numeric($numero1)) {
            $this->numerador   = $numero1;
            $this->denominador = 1;
        } elseif($numero1 != null && $numero2 != null || $numero1 == 0) {
            $this->numerador   = $numero1;
            $this->denominador = $numero2;
        } elseif (preg_match('/^\d+\/\d+$/', $numero1)) {
            $numeros           = explode('/', $numero1);
            $this->numerador   = $numeros[0];
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

    public function sumar($valor)
    {
        $valorExtra  = clone $this;
        $valorExtra2 = clone $valor;
        $valorExtra->setDenominador($this->getDenominador() * $valor->getDenominador());
        $valorExtra->setNumerador($this->getNumerador() * $valor->getDenominador());
        $valorExtra2->setDenominador($valor->getDenominador() * $this->getDenominador());
        $valorExtra2->setNumerador($valor->getNumerador() * $this->getDenominador());
        $numerador = $valorExtra->getNumerador() + $valorExtra2->getNumerador();
        return new Racional($numerador, $valorExtra2->getDenominador());
    }
    public function restar($valor)
    {
        $valorExtra  = clone $this;
        $valorExtra2 = clone $valor;
        $valorExtra->setDenominador($this->getDenominador() * $valor->getDenominador());
        $valorExtra->setNumerador($this->getNumerador() * $valor->getDenominador());
        $valorExtra2->setDenominador($valor->getDenominador() * $this->getDenominador());
        $valorExtra2->setNumerador($valor->getNumerador() * $this->getDenominador());
        $numerador = $valorExtra->getNumerador() - $valorExtra2->getNumerador();
        return new Racional($numerador, $valorExtra2->getDenominador());

    }
    public function multiplicar($valor)
    {
        $resultado = new Racional();
        $resultado->setNumerador($this->getNumerador() * $valor->getNumerador());
        $resultado->setDenominador($this->getDenominador() * $valor->getDenominador());
        return $resultado;
    }
    public function dividir($valor)
    {
        $resultado = new Racional();
        $resultado->setNumerador($this->getNumerador() * $valor->getDenominador());
        $resultado->setDenominador($this->getDenominador() * $valor->getNumerador());
        return $resultado;
    }
    public function simplificar()
    {
        // Calcular el MCD
        $mcd = $this->calcularMCD($this->numerador, $this->denominador);

        // Simplificar numerador y denominador dividiéndolos por el MCD
        $this->numerador   /= $mcd;
        $this->denominador /= $mcd;
    }

    private function calcularMCD($a, $b)
    {
        // Algoritmo de Euclides para calcular el MCD
        while ($b != 0) {
            $temp = $b;
            $b    = $a % $b;
            $a    = $temp;
        }
        return $a;
    }
    public function __toString(): string
    {
        return $this->numerador . '/' . $this->denominador;
    }
}
