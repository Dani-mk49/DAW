<?
  // Este es el controlador.

  // Conectamos a la BD y sacamos la lista de artículos
  $db = new mysqli('mi-host', 'mi-usuario', 'mi-clave', 'mi-base-de-datos');
  $res = $db->query('SELECT fecha, titulo FROM articulo');

  // Convertimos la lista de artículos, que es un cursor de MySQL, en un array estándar de PHP
  $articles = array();
  while ($row = $res->fetch_array())  {
      $articles[] = $row;
  }
  $db->close();

  // Incluimos el código de la vista, donde se usará el array de artículos
  // para generar la tabla HTML.
  include('showAllArticles.php');
?>