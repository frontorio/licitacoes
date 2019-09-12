<?php
$url = 'https://alertalicitacao.com.br/api/v1/licitacoesAbertas/?uf=';
if (isset($_POST['buscar'])){
    $url = $url.$_POST['uf'];

    $json = file_get_contents($url);
    $jsonDecode = (json_decode($json, true));
    echo $jsonDecode["totalLicitacoes"];
    var_dump($jsonDecode["licitacoes"]);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Buscador de licitações por estado</title>
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
            <label for="busca">Insira a sigla do estado</label>
            <input type="text" class="form-control" name="uf"><br>
            <button type="submit" class="btn btn-outline-success" name="buscar">Buscar</button>
        </form>
    </div>

</body>
</html>