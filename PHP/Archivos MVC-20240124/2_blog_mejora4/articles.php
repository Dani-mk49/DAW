<?php
include "db.php";

class Articles {

  public function getAll() {
    $db = new Db();
    $db->createConnection('mi-host', 'mi-usuario', 'mi-clave', 'mi-base-de-datos');
    $articles = $db->dataQuery('SELECT fecha, titulo FROM articulo');
    $db->closeConnection();
    return $articles;
  }
}
?>