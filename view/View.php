<?php
namespace View;


class View{

    public function listar($bat){
        echo '<h3> <center> Foram encontradas '.count($bat).' licitações abertas</h3>';
        for ($i=0; $i < count($bat); $i++) { 
            echo '<tr class="table"> <td>';
            echo '<strong>Titulo da licitação: </strong>'.$bat[$i]["titulo"].'<br>';
            echo '<strong>ID da licitação: </strong>'.$bat[$i]["id_licitacao"].'<br>';
            echo '<strong>Objeto da licitação: </strong>'.$bat[$i]["objeto"].'<br>';
            echo '<strong>Municipio da licitação: </strong>'.$bat[$i]["municipio"].'<br>';
            echo '<strong>Abertura da licitação: </strong>'.$bat[$i]["abertura"].'<br>';
            echo '<strong>Tipo da licitação: </strong>'.$bat[$i]["tipo"].'<br>';
            echo '</td> </tr>';
        }
    }

}

?>