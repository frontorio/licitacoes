<?php
$url = 'https://alertalicitacao.com.br/api/v1/licitacoesAbertas/?palavra_chave=';
if (isset($_POST['buscar'])){
    $url = $url.$_POST['palavras_chave'];

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
    <title>Buscador de licitações</title>
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/spacelab/bootstrap.min.css">
</head>
<body>
    <br>
    <div class="container col-sm-6">
        <form method="post">
            <label for="busca">Insira palavras chave para busca</label>
            <input type="text" class="form-control" name="palavras_chave"><br>
            <button type="submit" class="btn btn-outline-success" name="buscar">Buscar</button>
        </form>
    </div>

</body>
</html>