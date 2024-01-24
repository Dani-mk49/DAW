<?php
class Singleton
{
   private static $instancia;  // Referencia a la única instancia de este objeto. Es private
                               // para que nadie pueda usarla desde fuera del objeto

   // Constructor privado. Nadie podrá crear objetos desde fuera de la clase.
   private function __construct()
   {
      $this->contador = 0;
   }

   // Este método comprueba si existe ya una instancia del objeto Singleton.
   // Si existe, la devuelve. Si no existe, la crea antes de devolverla.
   public static function getInstance()
   {
      if ( self::$instancia instanceof self)
      {
         self::$instancia = new self;
      }
      return self::$instancia;
   }
}
?>