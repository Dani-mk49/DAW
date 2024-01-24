<?php
include "db.php";

class Articles extends Model {

  public __construct() {
    $this->table = "articles";
  }

}
?>