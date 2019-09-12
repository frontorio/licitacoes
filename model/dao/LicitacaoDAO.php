<?php
namespace dao;

require "autoload.php";

use PDO;

class LicitacaoDAO extends Config implements InterfaceDAO{

  private $tabela;

  public function __construct(){
    parent::__construct();
    $this->tabela = "licitacao";
  }
  public function inserir($licitacao){
    try {
      $stmt = $this->pdo->prepare("INSERT INTO $this->tabela VALUES(:idlicitacao, :titulo, :ibge, :orgao, :aberuta_date, :objeto,
                                                                    :link, :municipio, :abertura, :id_tipo, :tipo)");
      $stmt->bindParam(':idlicitacao', $id, PDO::PARAM_STR);
      $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
      $stmt->bindParam(':ibge', $ibge, PDO::PARAM_STR);
      $stmt->bindParam(':orgao', $orgao, PDO::PARAM_STR);
      $stmt->bindParam(':abertura_date', $abertura_date, PDO::PARAM_STR);
      $stmt->bindParam(':objeto', $objeto, PDO::PARAM_STR);
      $stmt->bindParam(':link', $link, PDO::PARAM_STR);
      $stmt->bindParam(':municipio', $municipio, PDO::PARAM_STR);
      $stmt->bindParam(':abertura', $abertura, PDO::PARAM_STR);
      $stmt->bindParam(':id_tipo', $id_tipo, PDO::PARAM_STR);
      $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);

      $id = $licitacao->getIdlicitacao();
      $titulo = $licitacao->getTitulo();
      $ibge = $licitacao->getMunicipio_ibge();
      $orgao = $licitacao->getOrgao();
      $abertura_date = $licitacao->getAbertura_datetime();
      $objeto = $licitacao->getObjeto();
      $link = $licitacao->getLink();
      $municipio = $licitacao->getMunicipio();
      $abertura = $licitacao->getAbertura();
      $id_tipo = $licitacao->getId_tipo();
      $tipo = $licitacao->getTipo();
      
      $stmt->execute();
      return $this->pdo->lastInsertId();

    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }
  public function editar($licitacao){
    try {
      $stmt = $this->pdo->prepare("UPDATE $this->tabela SET (:id, :titulo, :ibge, :orgao, :aberuta_date, :objeto,
      :link, :municipio, :abertura, :id_tipo, :tipo) WHERE idlicitacao = :id");

      $stmt->bindParam(':idlicitacao', $id, PDO::PARAM_STR);
      $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
      $stmt->bindParam(':ibge', $ibge, PDO::PARAM_STR);
      $stmt->bindParam(':orgao', $orgao, PDO::PARAM_STR);
      $stmt->bindParam(':abertura_date', $abertura_date, PDO::PARAM_STR);
      $stmt->bindParam(':objeto', $objeto, PDO::PARAM_STR);
      $stmt->bindParam(':link', $link, PDO::PARAM_STR);
      $stmt->bindParam(':municipio', $municipio, PDO::PARAM_STR);
      $stmt->bindParam(':abertura', $abertura, PDO::PARAM_STR);
      $stmt->bindParam(':id_tipo', $id_tipo, PDO::PARAM_STR);
      $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);

      $id = $licitacao->getIdlicitacao();
      $titulo = $licitacao->getTitulo();
      $ibge = $licitacao->getMunicipio_ibge();
      $orgao = $licitacao->getOrgao();
      $abertura_date = $licitacao->getAbertura_datetime();
      $objeto = $licitacao->getObjeto();
      $link = $licitacao->getLink();
      $municipio = $licitacao->getMunicipio();
      $abertura = $licitacao->getAbertura();
      $id_tipo = $licitacao->getId_tipo();
      $tipo = $licitacao->getTipo();

      $stmt->execute();
      return true;
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }
  public function excluir($licitacao){
    try {
      $stmt = $this->pdo->prepare("DELETE FROM $this->tabela WHERE idlicitacao = :id");
      $stmt->bindParam(':codigo', $id, PDO::PARAM_INT);

      $id = $licitacao->getIdlicitacao();

      $stmt->execute();
      return true;
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }
  public function select(){
    try {
      $stmt = $this->pdo->prepare("SELECT * FROM $this->tabela ORDER BY abertura_datetime");
      
      $stmt->execute();
      return true;
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }


}
 ?>
