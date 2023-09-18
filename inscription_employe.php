<?php

require_once('templates/header.php');
require_once('lib/user.php');

$errors = [];
$messages = [];

if(isset($_POST['addEmploye'])){
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $errors[] = 'Tous les champs sont obligatoires.';
        } elseif (strlen($password) < 8) {
        $errors[] = 'Votre mot de passe doit comporter plus de 8 caractères';
    } else {
    $res = addEmploye($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
    if($res){
        $messages[]= 'L\'inscription de votre collaborateur s\'est bien déroulée';
        
    } else {
        $errors[]= 'Erreur s\'est produite lors de l\inscription';
}
    }
}
?>
<h1 class="row px-5">Inscription</h1>
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
        <input type="first_name" name="first_name" id="first_name" class="form-control">
        </div>
        <div class="col">
        <label for="last_name" class="form-label">Nom</label>
        <input type="last_name" name="last_name"  id="last_name" class="form-control" >
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row align-items-center">
        <div class="col">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value=" @parrot.fr" required>
        </div>
        <div class="col">
            <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="minimum 8 caractères" >
    </div>
        <input type="submit" value="inscription" name="addEmploye" class="btn btn-primary mt-3 px-5">
    </div>
</div>
</form>
<script>
//Fonction qui permet de transformer les saisies (1ere lettre majuscule, le reste en minuscule)
const firstNameInput = document.getElementById('first_name');
const lastNameInput = document.getElementById('last_name');

const formatNameInput = (inputElement) => {
    const inputValue = inputElement.value.trim();
    const words = inputValue.split(' ');

const formattedWords = words.map(word => {
    return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
});
    inputElement.value = formattedWords.join(' ');
};

firstNameInput.addEventListener('blur', () => {
    formatNameInput(firstNameInput);
});

lastNameInput.addEventListener('blur', () => {
    formatNameInput(lastNameInput);
});

</script>
<?php
require_once('templates/footer.php');
?>