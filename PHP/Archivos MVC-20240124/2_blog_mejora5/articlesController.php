<?php
// Controlador. Debería tener un método por cada posible valor de la variable "action".
include ("view.php");
include ("articles.php");

class ArticlesController {

   public function showAll() {
      $data['articles'] = Articles::getAll();
      View::show("showAllArticles", $data);
   }

   // Añadir a partir de aquí un método por cada posible valor de la variable "action"

}
?>