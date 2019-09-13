<?php

namespace dao;


interface InterfaceDAO
{
  public function inserir($obj);

  public function editar($obj);

  public function excluir($obj);

  public function select();


}

?>
