<?php
use Controller\ControllerLicit as Controle;

require_once "Controller/ControllerLicit.php";
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
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Buscador de licitações por municipio</title>
    <link rel="shortcut icon" href="/icon.png" type="image">
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
            <label for="busca">Insira o nome do municipio</label>
            <input type="text" class="form-control" name="municipio"><br>
            <button type="submit" class="btn btn-outline-success" name="buscar">Buscar</button>
        </form>
        <?php if (isset($_POST['buscar']) && existe()) { ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col"><center>Licitações abertas</th>
                <th scope="col"><center>Ações</th>
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

    <div class="modal fade" id="salvar_licit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel"></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="http://www.buscalicitacoes.com.br/salvar_licit.php" enctype="multipart/form-data">
                            <center>
                                <div class="form-group">
                                    <label class="control-label">Deseja salvar essa licitação?</label><br>
                                    <input name="licitacao" type="hidden" class="form-control" id="licitacao" readonly="">
                                    <input name="ind" type="hidden" class="form-control" id="ind" readonly="">
                                </div>
                                <button type="submit" class="btn btn-outline-success">Salvar</button>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                            </center> 
                        </form>
                    </div>
                </div>
            </div>
    </div>

	<script type="text/javascript">
		$('#salvar_licit').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var licitacao = button.data('licit')
          var ind = button.data('cod') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
          modal.find('.modal-title').text('Licitação: '+licitacao)
		  modal.find('#licitacao').val(licitacao)
		  modal.find('#ind').val(ind)
		})
	</script>


</body>
</html>