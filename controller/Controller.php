<?php
namespace Controller;

require "autoload.php";

class Controller{

    public function pesquisa($url){
        $json = file_get_contents($url);
        $jsonDecode = (json_decode($json, true));

        var_dump($jsonDecode);
    }

}

?>
