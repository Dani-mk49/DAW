<?php
  include("articlesController.php");

  // Miramos a ver si se indica alguna acción en la URL
  if (!isset($_REQUEST['action'])) {
    // No hay acción en la URL. Usamos la acción por defecto (main). Puedes cambiarla por cualquier otra que vaya bien con tu aplicación.
    $action = "main";
  } else {
    // Sí hay acción en la URL. Recuperamos su nombre.
    $action = $_REQUEST['action'];
  }

  // Hacemos lo mismo con el nombre del controlador
  if (!isset($_REQUEST['controller'])) {
    // No hay controlador en la URL. Asignaremos un controlador por defecto (Articles). Por supuesto, puedes cambiarlo por otro que vaya bien con tu aplicación.
    $controllerClassName = "ArticlesController";
  } else {
    // Sí hay controlador en la URL. Recuperamos su nombre.
    $controllerClassName = $_REQUEST['controller'];
  }

  // Instanciamos el controlador e invocamos al método que se llama como la acción
  $controller = new $controllerClassName();
  $controller->$action();
?>
