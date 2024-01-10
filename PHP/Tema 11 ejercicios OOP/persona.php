<?php
	class Persona
	{
        //Las propiedades y métodos public pueden ser accedidos y alterados desde cualquier parte dentro y fuera de la clase.
        //Las propiedades y métodos private solo pueden ser accedidos o alterados desde dentro de la propia clase.
        //Para acceder o modificar los valores de las propiedades privadas se utilizan los métodos "getter" y "setter".

        //Las propiedades y métodos protected pueden ser accedidos y alterados desde la propia clase y desde las  clases derivdas.

        //Para interactuar con una propiedad dentro de la clase usamos dólar, seguido de la palabra “this” y una flecha: $this->

        // Propiedades
        private $nombre;
        private $apellidos;
        private $sexo;
		protected $fehaNacimiento;  /* Ej: "03-11-2000" */

		//Constructor de un objeto de la clase Persona:Es el método que se ejecutará cuando se cree un objeto de la clase persona.
       public function  __construct($nom,$ape,$sexo,$fechaNaci) {
			$this->nombre=$nom;
			$this->apellidos=$ape;
			$this->sexo=$sexo;
			$this->fechaNacimiento=$fechaNaci;
		}

		// Métodos:

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre( $nombre ) {
            $this->nombre = $nombre;
        }

        public function getApellidos() {
            return $this->apellidos;
        }

        public function setApellidos( $apellidos ) {
            $this->apellidos = $apellidos;
        }

        public function getSexo() {
            return $this->sexo;
        }

        public function setSexo( $sexo ) {
            $this->sexo = $sexo;
        }
		public function getFechaNacimiento() {
            return $this->fehaNacimiento;
        }

        public function setFechaNacimiento( $fecha ) {
            $this->fechaNacimiento = $fecha;
        }

        public function getNombreCompleto()
		{
			return "$this->nombre, $this->apellidos";
		}

		public function calculaEdad()  /*Comprobar*/
		{
			//Obtenemos partes de la fecha actual
			$dia=date("j");
			$mes=date("n");
			$anyo=date("Y");

			//Obtenemos partes fecha nacimiento
			$vnac=explode("-",$this->fechaNacimiento);
			//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
			if ( ($vnac[1]== $mes) && ($vnac[0] > $dia)) {
                $anyo=($anyo-1);
            }
			//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
			if ($vnac[1] > $mes) {
                $anyo=($anyo-1);
            }
			//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
			$edad=($anyo-$vnac[2]);
			return $edad;
		}
	}

    // Se crea un objeto, es decir una instancia, de la clase Persona:
//$objPersona = new Persona("Manuel","Sánchez Pérez","H","3-12-2000");

/*Se interacciona con el objeto a través de sus métodos*/
//echo "Nombre: ".$objPersona->getNombre()."<br>";
// Devuelve: "Nombre: Manuel"

//echo "Apellidos: ".$objPersona->getApellidos()."<br>";
// Devuelve: "Apellidos: Sánchez Pérez"

// Se crea un objeto, es decir una instancia, de la clase Persona:
//$objPersona = new Persona("Manuel","Sánchez Pérez","H","3-12-2000");

//echo "Sexo: ".$objPersona->getSexo()."<br>"; // Devuelve: H

//echo "Nombre completo: ".$objPersona->getNombreCompleto()."<br>";
// Devuelve: Manuel, Sanchéz Pérez

//echo "Edad: ".$objPersona->calculaEdad()."<br><br>"; // Devuelve: 23
?>