<?php
use Controller\ControllerLicit as Controle;
use Dto\Licitacao;

require_once "Controller/ControllerLicit.php";
require_once "model/dto/Licitacao.php";
$control = new Controle;
$url = 'https://alertalicitacao.com.br/api/v1/licitacoesAbertas/?palavra_chave=';
function existe(){ 
    $url = 'https://alertalicitacao.com.br/api/v1/licitacoesAbertas/?palavra_chave="+'.$_POST['municipio'].'"';

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
if (isset($_POST['buscar'])){
    $url = $url.'"+'.$_POST['municipio'].'"';

    $url = str_replace(' ', '+', $url);
    $json = file_get_contents($url);
    $jsonDecode = (json_decode($json, true));
    
    $n = $jsonDecode['totalLicitacoes'];
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
    <title>Buscador de licitações por municipio</title>
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
                        <a class="dropdown-item" href="estado.php">Estado</a>
                        <a class="dropdown-item" href="municipio.php">Municipio</a>
                    </div>
                </li>
            </ul>
        </div>

    </nav><br>

    <div class="container col-sm-6">
        <form method="post">
            <label for="busca">Insira o nome do municipio</label>
            <input type="text" class="form-control" name="municipio"><br>
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
        echo '<br> <h3> <center> Nenhuma licitação em aberto no municipio de '.$_POST['municipio'].'</h3>';
    } ?>
    </div>

</body>
</html>