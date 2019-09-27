<?php
namespace Controller;

use dao\LicitacaoDAO;
use View\View;
require_once "./model/dao/LicitacaoDAO.php";
require_once "./view/View.php";

class ControllerLicit{

    public function inserir($obj){
       $id = $obj->getIdlicitacao();
        $licitacao = new LicitacaoDAO;
       if ($licitacao->selectById($id)==0) {
            $licitacao->inserir($obj);
       }
    }

    public function visualizar ($lista){
        $visu = new View;

        echo $visu->listar($lista);
    }

    public function select(){
        $licitacao = new LicitacaoDAO;
        return $licitacao->select();
    }
    public function visualizar_salvas_abertas ($lista){
        $visu = new View;

        echo $visu->listar_salvas_ab($lista);
    }
    public function visualizar_salvas_encerradas ($lista){
        $visu = new View;

        echo $visu->listar_salvas_en($lista);
    }
}

?>
