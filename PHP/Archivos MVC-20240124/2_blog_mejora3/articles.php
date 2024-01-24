<?php
include "db.php";

class Articles {

  public function getAll() {
    $db = new Db();  // Creamos un objeto para usar nuestra capa de abstracción

    // Conectamos con la BD a través de nuestra capa de abstracción
    $db->createConnection('mi-host', 'mi-usuario', 'mi-clave', 'mi-base-de-datos');

    // Lanzamos la consulta a través de nuestra capa de abstracción.
    // Nos devolverá directamente un array estándar de PHP.
    $articles = $db->dataQuery('SELECT fecha, titulo FROM articulo');

    // Cerramos la conexión con la BD
    $db->closeConnection();

    return $articles;
  }

}
?>