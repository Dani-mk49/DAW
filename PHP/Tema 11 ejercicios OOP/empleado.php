<?php

include 'persona.php';

class Empleado extends Persona
{
    private $puesto;
    private $sueldo;

    public function __construct($nom, $ape, $sexo, $fechaNaci, $pues, $suel)
    {
        // Primero invocamos al constructor de su clase padre, si es útil
        parent::__construct($nom, $ape, $sexo, $fechaNaci);
        // Después añadimos las acciones específicas para el constructor de esta clase
        $this->puesto = $pues;
        $this->sueldo = $suel;
    }
    public function getPuesto()
    {
        return $this->puesto;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function setPuesto($puesto): void
    {
        $this->puesto = $puesto;
    }

    public function setSueldo($sueldo): void
    {
        $this->sueldo = $sueldo;
    }

    public function pagarImpuestos()
    {
        if($this->sueldo > 2000) {
            return true;
        }
        return false;
    }
    public function __toString()
    {
        $contenido = $this->getNombreCompleto() .', ' . $this->puesto . ', ';
        if($this->pagarImpuestos()) {
            $contenido = $contenido .'si debe pagar impuestos';
        } else {
            $contenido = $contenido .'no debe pagar impuestos';
        }
        return $contenido;
    }
}
