<?php
//Définition d'un gestionnaire d'erreur global
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
	echo "Nous sommes désolés, un problème vient de survenir :/ \nNous vous invitons à revenir plus tard." . PHP_EOL;
	if ($errno === E_WARNING)
		die;
});
restore_error_handler();

//Définition d'un gestionnaire d'exception global
set_exception_handler(function(Exception $e){
	echo 'Une erreur a été détectée. Nous mettons fin au programme.' .$e->getMessage() . PHP_EOL;
		die;
});
restore_exception_handler();