<?php
spl_autoload_register(function ($nomeClasse) {
	$folders = array("model", "view", "controller");
	foreach ($folders as $fol){
		if (file_exists($fol.DIRECTORY_SEPARATOR.$nomeClasse.".php"))
			require_once($fol.DIRECTORY_SEPARATOR.$nomeClasse.".php");
	}
});
?>
