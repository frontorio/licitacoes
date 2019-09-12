<?php
namespace dao;

require "autoload.php";

use PDO;

class Config{

  public $pdo;

  public function __construct(){
    $this->pdo = new PDO('mysql:host=localhost;dbname=licitacao', "root","");
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }


}
?>
