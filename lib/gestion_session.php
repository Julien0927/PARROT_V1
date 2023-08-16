<?php
require_once('templates/header.php');
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
            header('location: index_intra.php');
        }
        elseif($_SESSION['user']['roles'] === 'Visiteur'){
           
            header('location: index.php');
        }
        elseif($_SESSION['user']['roles'] === 'Employe'){
           echo 'Vous etes conntecté en tant qu\'employé';
            /**header('location: index.php');*/
        }    
    } else {
        $errors[] = 'Email ou mot de passe incorrect'; 
    }
}

?>