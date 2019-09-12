<?php

namespace dao;

require "autoload.php";

interface InterfaceDAO
{
  public function inserir($obj);

  public function editar($obj);

  public function excluir($obj);

  public function select();


}

?>
