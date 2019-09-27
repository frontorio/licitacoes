<?php
use Controller\ControllerLicit as Controle;
use Dto\Licitacao;

require_once "Controller/ControllerLicit.php";
require_once "model/dto/Licitacao.php";
$control = new Controle;
function existe(){ 
    $url = 'https://alertalicitacao.com.br/api/v1/licitacoesAbertas/?uf=SC&palavra_chave="+'.$_POST['palavras_chave'].'"';

    $url = str_replace(' ', '+', $url);
    $json = file_get_contents($url);
    $jsonDecode = (json_decode($json, true));
    $n = $jsonDecode['totalLicitacoes'];
    if ($n > 0) {
        return true;
    }else{
        return false;
    }
}
$url = 'https://alertalicitacao.com.br/api/v1/licitacoesAbertas/?uf=SC&palavra_chave=';
if (isset($_POST['buscar'])){
    $url = $url.'"+'.$_POST['palavras_chave'].'"';
    $url = str_replace(' ', '+', $url);
    $json = file_get_contents($url);
    $jsonDecode = (json_decode($json, true));
    $n = $jsonDecode['totalLicitacoes'];
    $lista_pesquisa = array();
    for ($i=0; $i < $n; $i++) { 
        $lista_pesquisa[] =$jsonDecode["licitacoes"][$i];

        $licit = new Licitacao;
        $licit->setIdlicitacao($jsonDecode["licitacoes"][$i]['id_licitacao']);
        $licit->setTitulo($jsonDecode["licitacoes"][$i]['titulo']);
        $licit->setMunicipio_ibge($jsonDecode["licitacoes"][$i]['municipio_IBGE']);
        $licit->setOrgao($jsonDecode["licitacoes"][$i]['orgao']);
            $data_ab = strtotime($jsonDecode["licitacoes"][$i]['abertura_datetime']);
            $newDate = date('Y-m-d',$data_ab);
        $licit->setAbertura_datetime($newDate);
        $licit->setObjeto($jsonDecode["licitacoes"][$i]['objeto']);
        $licit->setLink($jsonDecode["licitacoes"][$i]['link']);
        $licit->setMunicipio($jsonDecode["licitacoes"][$i]['municipio']);
        $licit->setAbertura($jsonDecode["licitacoes"][$i]['abertura']);
        $licit->setId_tipo($jsonDecode["licitacoes"][$i]['id_tipo']);
        $licit->setTipo($jsonDecode["licitacoes"][$i]['tipo']);
        //$control->inserir($licit);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Buscador de licitações por palavra chave</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/spacelab/bootstrap.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Buscador de licitações</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tipo de busca</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="palavra_chave.php">Palavra chave</a>
                        <a class="dropdown-item" href="municipio.php">Municipio</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Minhas Licitações</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="minhas_lici_ab.php">Licitações abertas</a>
                        <a class="dropdown-item" href="minhas_lici_en.php">Licitações encerradas</a>
                    </div>
                </li>
            </ul>
        </div>

    </nav><br>

    <div class="container col-sm-10">
        <form method="post">
            <label for="busca">Insira palavras chave para busca</label>
            <input type="text" class="form-control" name="palavras_chave"><br>
            <button type="submit" class="btn btn-outline-success" name="buscar">Buscar</button>
        </form>
        <?php if (isset($_POST['buscar']) && existe()) { ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col"><center>Licitações abertas</th>
            </tr>
            </thead>
            <tbody>
                <?php $control ->visualizar($lista_pesquisa); ?>
            </tbody>
        </table>
    <?php } else if (isset($_POST['buscar']) && !existe()) {
        echo '<br> <h3> <center> Nenhuma licitação em aberto.</h3>';
    } ?>
    </div>
    
</body>
</html>