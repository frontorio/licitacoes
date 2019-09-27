<?php
namespace View;
use DateTime;

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

    public function listar_salvas_ab($bat){
        date_default_timezone_set('America/Sao_Paulo');
        $data = new DateTime();
        $result = $data->format('Y-m-d H:i:s');
        for ($i=0; $i < count($bat); $i++) { 
            if (strtotime($result)<strtotime($bat[$i]["abertura_datetime"])) {
                echo '<tr class="table-success"> <td>';
                echo '<strong>Titulo da licitação: </strong>'.$bat[$i]["titulo"].'<br>';
                echo '<strong>ID da licitação: </strong>'.$bat[$i]["idlicitacao"].'<br>';
                echo '<strong>Objeto da licitação: </strong>'.$bat[$i]["objeto"].'<br>';
                echo '<strong>Municipio da licitação: </strong>'.$bat[$i]["municipio"].'<br>';
                echo '<strong>Abertura da licitação: </strong>'.$bat[$i]["abertura"].'<br>';
                echo '<strong>Tipo da licitação: </strong>'.$bat[$i]["tipo"].'<br>';
                echo '</td></tr>';
            }
            
        }
    }

    public function listar_salvas_en($bat){
        date_default_timezone_set('America/Sao_Paulo');
        $data = new DateTime();
        $result = $data->format('Y-m-d H:i:s');
        for ($i=0; $i < count($bat); $i++) { 
            if (strtotime($result)>strtotime($bat[$i]["abertura_datetime"])) {
                echo '<tr class="table-danger"> <td>';
                echo '<strong>Titulo da licitação: </strong>'.$bat[$i]["titulo"].'<br>';
                echo '<strong>ID da licitação: </strong>'.$bat[$i]["idlicitacao"].'<br>';
                echo '<strong>Objeto da licitação: </strong>'.$bat[$i]["objeto"].'<br>';
                echo '<strong>Municipio da licitação: </strong>'.$bat[$i]["municipio"].'<br>';
                echo '<strong>Abertura da licitação: </strong>'.$bat[$i]["abertura"].'<br>';
                echo '<strong>Tipo da licitação: </strong>'.$bat[$i]["tipo"].'<br>';
                echo '</td></tr>';
            }
        }
    }

}

?>