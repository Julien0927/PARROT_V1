<?php

//Définition d'un gestionnaire d'erreur global
/**set_error_handler(function ($errno, $errstr, $errfile, $errline) {
	echo "Nous sommes désolés, un problème vient de survenir :/ \nNous vous invitons à revenir plus tard." . PHP_EOL;
	if ($errno === E_WARNING)
		exit();
});
restore_error_handler();

//Définition d'un gestionnaire d'exception global
set_exception_handler(function(Exception $e){
	echo 'Une erreur a été détectée. Nous mettons fin au programme.' .$e->getMessage() . PHP_EOL;
		die;
});
restore_exception_handler();*/

//Fonction pour nettoyer les entrées utilisateurs
/**function sanitizeUserInput($input) {
	return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}*/
// Fonction pour générer un jeton CSRF
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

// Fonction pour ajouter un champ CSRF à un formulaire
function addCSRFTokenToForm() {
    generateCSRFToken();
    echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">';
}

// Fonction pour vérifier le jeton CSRF
function verifyCSRFToken() {
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        return true;
    }
    return false;
}

// Vérifier automatiquement le jeton CSRF pour chaque formulaire POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCSRFToken()) {
        die('Tentative d\'attaque CSRF détectée.');
    }
}