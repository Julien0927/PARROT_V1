<?php

require_once('templates/header.php');
require_once('lib/user.php');

$errors = [];
$messages = [];


if(isset($_POST['addUser'])){
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $errors[] = 'Tous les champs sont obligatoires.';

        } elseif (strlen($password) < 8) {
        $errors[] = 'Votre mot de passe doit comporter plus de 8 caractères';
    } else {
    
    $res = addUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);

    if($res){
        $messages[]= 'Merci pour votre inscription';
    } else {
        $errors[]= 'Erreur s\'est produite lors de votre inscription';
    }
    }
}

?>

<h1 class="row mx-5">Inscription</h1>

<?php foreach($messages as $message) {?>
    <div class="alert alert-success">
        <?=$message;?>
    </div>
<?php } ?>
<?php foreach ($errors as $error) {?>
    <div class="alert alert-danger">
        <?=$error;?>
    </div>
<?php } ?>

<form method="POST" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']?>" >
<div class="container mt-3">
    <div class="row align-items-center">
        <div class="col">
            <label for="first_name" class="form-label">Prénom</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required placeholder="Votre prénom">
        </div>
        <div class="col">
            <label for="last_name" class="form-label">Nom</label>
            <input type="text" name="last_name"  id="last_name" class="form-control" required placeholder="Votre nom">
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row align-items-center">
        <div class="col">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required placeholder="john.doe@example.com">
        </div>
        <div class="col">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required placeholder="Minimum 8 caractères">
        </div>
        <input type="submit" value="inscription" name="addUser" class="btn btn-primary px-6 mt-3">
    </div>
</div>
</form>
<div id="error"></div>
<?php
require_once('templates/footer.php');
?>