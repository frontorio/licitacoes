<?php
        use Controller\ControllerLicit as Controle;
        use Dto\Licitacao;
        
        require_once "Controller/ControllerLicit.php";
        require_once "model/dto/Licitacao.php";

        $index = $_POST['ind'];

        $control = new Controle;
        $licit = new Licitacao;
        
        $json = file_get_contents('pesquisa.json');
        $jsonDecode = (json_decode($json, true));


        $licit->setIdlicitacao($jsonDecode[$index]['id_licitacao']);
        $licit->setTitulo($jsonDecode[$index]['titulo']);
        $licit->setMunicipio_ibge($jsonDecode[$index]['municipio_IBGE']);
        $licit->setOrgao($jsonDecode[$index]['orgao']);
            $data_ab = strtotime($jsonDecode[$index]['abertura_datetime']);
            $newDate = date('Y-m-d',$data_ab);
        $licit->setAbertura_datetime($newDate);
        $licit->setObjeto($jsonDecode[$index]['objeto']);
        $licit->setLink($jsonDecode[$index]['link']);
        $licit->setMunicipio($jsonDecode[$index]['municipio']);
        $licit->setAbertura($jsonDecode[$index]['abertura']);
        $licit->setId_tipo($jsonDecode[$index]['id_tipo']);
        $licit->setTipo($jsonDecode[$index]['tipo']);

        $control->inserir($licit);
 
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://www.buscalicitacoes.com.br/'>
				<script type=\"text/javascript\">
					alert(\"Licitação salva com sucesso.\");
				</script>
			";?>
	</body>
</html>