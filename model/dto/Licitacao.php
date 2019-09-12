<?php
namespace Dto;

require "autoload.php";

class Licitacao{
    private $idlicitacao;
    private $titulo;
    private $municipio_ibge;
    private $orgao;
    private $abertura_datetime;
    private $objeto;
    private $link;
    private $municipio;
    private $abertura;
    private $id_tipo;
    private $tipo;

    public function getIdlicitacao(){
        return $this->idlicitacao;
    } 

    public function setIdlicitacao($idlicitacao){
        $this->idlicitacao = $idlicitacao;
        return $this;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }

    public function getMunicipio_ibge(){
        return $this->municipio_ibge;
    }

    public function setMunicipio_ibge($municipio_ibge){
        $this->municipio_ibge = $municipio_ibge;
        return $this;
    }

    public function getOrgao(){
        return $this->orgao;
    }
 
    public function setOrgao($orgao){
        $this->orgao = $orgao;
        return $this;
    }

    public function getAbertura_datetime(){
        return $this->abertura_datetime;
    }
 
    public function setAbertura_datetime($abertura_datetime){
        $this->abertura_datetime = $abertura_datetime;
        return $this;
    }

    public function getObjeto(){
        return $this->objeto;
    }

    public function setObjeto($objeto){
        $this->objeto = $objeto;
        return $this;
    }

    public function getLink(){
        return $this->link;
    }

    public function setLink($link){
        $this->link = $link;
        return $this;
    }
    
    public function getMunicipio(){
        return $this->municipio;
    }

    public function setMunicipio($municipio){
        $this->municipio = $municipio;
        return $this;
    }
 
    public function getAbertura(){
        return $this->abertura;
    }
 
    public function setAbertura($abertura){
        $this->abertura = $abertura;
        return $this;
    }

    public function getId_tipo(){
        return $this->id_tipo;
    }

    public function setId_tipo($id_tipo){
        $this->id_tipo = $id_tipo;
        return $this;
    }
 
    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;
        return $this;
    }
}

?>
