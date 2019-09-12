<?php
namespace bo;

require "autoload.php";

class LicitacaoBO{

  private $dao;

  public function __construct($dao){
      $this->dao = $dao;
  }

  public function inserir($licitacao){
    return $dao->inserir($licitacao);
  }

  public function editar($licitacao){
    return $dao->editar($licitacao);
  }

  public function excluir($licitacao){
    return $dao->excluir($licitacao);
  }

  public function select(){
    return $dao->select();
  }


}
?>
