<?php
require_once('lib/pdo.php');
session_start();

//Vérification de l'adresse ip de l'utilisateur
$_SESSION['ip_adresse'] = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION['ip_adresse']) AND $_SESSION['ip_adresse'] !== $_SERVER['REMOTE_ADDR']){
    session_unset();
    session_destroy();
    header('location: login.php');
}

//Vérification du navigateur de l'utilisateur
$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];

if(isset($_SESSION['user_agent']) AND $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']){
    session_unset();
    session_destroy();
    header('location: login.php');
}


require_once('lib/user.php');

$errors = [];
$messages = [];

if(isset($_POST['loginUser'])){

    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    
    if($user) {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'roles' => $user['roles'],
            'first_name' => $user['first_name'], 
        ];
        if($_SESSION['user']['roles'] === 'Admin'){
            
            header('location: index.php');
        }
        elseif($_SESSION['user']['roles'] === 'Visiteur'){
            header('location: index.php');
        }
        elseif($_SESSION['user']['roles'] === 'Employe'){
            header('location: index.php');
        }    
    } else {
        $errors[] = 'Email ou mot de passe incorrect'; 
    }
}

?>