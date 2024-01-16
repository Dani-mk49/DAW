<?php
class Menu
{
    private $dia;
    private $fecha;
    private $primerosplatos;
    private $segundosplatos;
    private $postres;
    public function __construct($dia = null, $fecha = null, $primerosplatos = null, $segundosplatos = null, $postres = null)
    {
        if ($dia != null) {
            $this->dia = $dia;
        }
        if ($fecha != null) {
            $this->fecha = $fecha;
        }
        if ($primerosplatos != null) {
            $this->primerosplatos = $primerosplatos;
        }
        if ($segundosplatos != null) {
            $this->segundosplatos = $segundosplatos;
        }
        if ($postres != null) {
            $this->postres = $postres;
        }
    }
    public function getDia()
    {
        return $this->dia;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getPrimerosplatos()
    {
        return $this->primerosplatos;
    }

    public function getSegundosplatos()
    {
        return $this->segundosplatos;
    }

    public function getPostres()
    {
        return $this->postres;
    }

    public function setDia($dia): void
    {
        $this->dia = $dia;
    }

    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    public function setPrimerosplatos($primerosplatos): void
    {
        if (is_array($primerosplatos)) {
            $this->primerosplatos = $primerosplatos;
        }
    }

    public function setSegundosplatos($segundosplatos): void
    {
        if (is_array($segundosplatos)) {
            $this->segundosplatos = $segundosplatos;
        }
    }

    public function setPostres($postres): void
    {
        if (is_array($postres)) {
            $this->postres = $postres;
        }
    }
    public function agregarPrimerPlato($plato): void
    {
        if (is_array($plato)) {
            $this->primerosplatos = array_merge($this->primerosplatos, $plato);
        } else {
            $this->primerosplatos[] = $plato;
        }
    }

    public function agregarSegundoPlato($plato): void
    {
        if (is_array($plato)) {
            $this->segundosplatos = array_merge($this->segundosplatos, $plato);
        } else {
            $this->segundosplatos[] = $plato;
        }
    }

    public function agregarPostre($plato): void
    {
        if (is_array($plato)) {
            $this->postres = array_merge($this->postres, $plato);
        } else {
            $this->postres[] = $plato;
        }
    }
    public function arrayTostring($arr):string{
        $contenido ="(";
        if(isset($arr)){
            for($i = 0; $i< count($arr);$i++){
                $contenido = $contenido . $arr[$i];
                if($i<count($arr)-1){
                    $contenido = $contenido . ", ";
                }
            }
        }
        $contenido = $contenido . ")";
        return $contenido;
    }
    public function __toString():string{
        return $this->dia .', '. $this->fecha. ', ' . $this->arrayTostring($this->primerosplatos). ', '. $this->arrayTostring($this->segundosplatos).', '. $this->arrayTostring($this->postres);
    }
}
