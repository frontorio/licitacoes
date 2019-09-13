<?php
namespace View;


class View{

    public function listar($bat){
        for ($i=0; $i < count($bat); $i++) { 
            echo '<tr class="table">';
            echo '<th scope="row">'.$bat[$i]["id_licitacao"].'</th>';
            echo '<td>'.$bat[$i]["titulo"].'</td>';
            echo '<td>'.$bat[$i]["objeto"].'</td>';
            echo '<td>'.$bat[$i]["municipio"].'</td>';
            echo '<td>'.$bat[$i]["abertura"].'</td>';
            echo '<td>'.$bat[$i]["tipo"].'</td>';
            echo '</tr>';
        }
    }

}

?>