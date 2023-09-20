<?php 
require_once('templates/header.php');
require_once('lib/tools.php');
require_once('lib/temoignage.php');

$errors = [];
$messages = [];
$comment = [
    'name' =>'',
    'comment' =>'',
    
];
    if(isset($_POST['saveTemoignageEmploye'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        

        if (empty($name) || empty($comment)) {
        $errors[] = 'Tous les champs sont obligatoires.';
    } else {
    $resultat=saveTemoignageEmploye($pdo, $name, $comment);
    if($resultat){
        $messages[] = 'Votre retour client a bien été enregistrée';
    } else {
        $errors[] = 'Votre commentaire n\'a pas pu été sauvegardée';
    }
   
    
    $comment = [
        'name' => $_POST['name'],
        'comment' => $_POST['comment'],
    ];
}
}
    if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === 'Employe'){?>
        <h2 class="text-center mt-5">Partagez vos retours clients</h2>
    <?php } else {?>
          <h1 class="text-center">Faites nous part de votre expérience</h1>
    <?php } ?>
    <?php foreach($messages as $message) {?>
    <div class="alert alert-success">
        <?=$message;?>
    </div>
    <?php } ?>
    <?php foreach($errors as $error) {?>
    <div class="alert alert-danger">
        <?=$error;?>
    </div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data" >
    <div class="mb-2 px-5">
        <label for="name" class="form-label">Votre nom</label>
        <input type="text" name="name" id="name" class="form-control" value="<?=$comment['name'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="comment" class="form-label">Votre commentaire</label>
        <input type="text"  name="comment" id="comment" class="form-control" value="<?=$comment['comment'];?>">
    </div>
        <?php addCSRFTokenToForm(); ?>    
        <input type="submit" value="Soumettre" name="saveTemoignageEmploye" class="btn btn-primary mx-5 px-5">
    </form>
     
<script>
const nameInput = document.getElementById('name');
const formatNameInput = (inputElement) => {
const inputValue = inputElement.value.trim();
const words = inputValue.split(' ');

const formattedWords = words.map(word => {
return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
});
inputElement.value = formattedWords.join(' ');
};
nameInput.addEventListener('blur', () => {
formatNameInput(nameInput);
});
</script>

