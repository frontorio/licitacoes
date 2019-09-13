<?php
namespace dao;

require_once "Config.php";
require_once "InterfaceDAO.php";

use PDO;

class LicitacaoDAO extends Config implements InterfaceDAO{

  private $tabela;

  public function __construct(){
    parent::__construct();
    $this->tabela = "licita";
  }
  public function inserir($licitacao){
    try {
      $stmt = $this->pdo->prepare("INSERT INTO $this->tabela VALUES(:idlicitacao, :titulo, :ibge, :orgao, :abertura_date,
      :objeto, :link, :municipio, :abertura, :id_tipo, :tipo)");

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
      
      $stmt->bindValue(':idlicitacao', $id);
      $stmt->bindValue(':titulo', $titulo);
      $stmt->bindValue(':ibge', $ibge);
      $stmt->bindValue(':orgao', $orgao);
      $stmt->bindValue(':abertura_date', $abertura_date);
      $stmt->bindValue(':objeto', $objeto);
      $stmt->bindValue(':link', $link);
      $stmt->bindValue(':municipio', $municipio);
      $stmt->bindValue(':abertura', $abertura);
      $stmt->bindValue(':id_tipo', $id_tipo);
      $stmt->bindValue(':tipo', $tipo);

      $stmt->execute();
      return $this->pdo->lastInsertId();
      if ($stmt->rowCount())
        echo  "<script>alert('Dados salvos com sucesso!');</script>";
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }
  public function editar($licitacao){
    try {
      $stmt = $this->pdo->prepare("UPDATE $this->tabela SET (:id, :titulo, :ibge, :orgao, :aberuta_date, :objeto,
      :link, :municipio, :abertura, :id_tipo, :tipo) WHERE idlicitacao = :id");

      $stmt->bindParam(':idlicitacao', $id);
      $stmt->bindParam(':titulo', $titulo);
      $stmt->bindParam(':ibge', $ibge);
      $stmt->bindParam(':orgao', $orgao);
      $stmt->bindParam(':abertura_date', $abertura_date);
      $stmt->bindParam(':objeto', $objeto);
      $stmt->bindParam(':link', $link);
      $stmt->bindParam(':municipio', $municipio);
      $stmt->bindParam(':abertura', $abertura);
      $stmt->bindParam(':id_tipo', $id_tipo);
      $stmt->bindParam(':tipo', $tipo);

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
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);

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
      $bat = array();
      while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($bat, $linha);
      }
      return $bat;
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }
  public function selectById($id){
    $bat = array();
    try {
      $stmt = $this->pdo->prepare("SELECT * FROM $this->tabela");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      
      while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($bat, $linha);
      }
      
     $cont = 0;
     for ($i=0; $i < count($bat); $i++) { 
       if ($id == $bat[$i]['idlicitacao']) {
        $cont +=1;
       }
     }
     return $cont;
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      return false;
    }
  }

}
 ?>
