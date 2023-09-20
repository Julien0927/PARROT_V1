<?php
require_once('templates/header.php');
require_once('lib/tools.php');
require_once('lib/temoignage.php');

$errors = [];
$messages = [];
$comment = [
    'name' =>'',
    'comment' =>'',
    'note' => '',
];
    if(isset($_POST['saveTemoignage'])){
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $note = $_POST['note'];

        if (empty($name) || empty($comment) || empty($note)) {
        $errors[] = 'Tous les champs sont obligatoires.';
    } else {
   $res=saveTemoignage($pdo, $name, $comment, $note);
    if($res){
        $messages[] = 'Votre commentaire a bien été enregistrée, en attente de validation par notre équipe';
    } else {
        $errors[] = 'Votre commentaire n\'a pas pu été sauvegardée';
    }
    
    $comment = [
        'name' => $_POST['name'],
        'comment' => $_POST['comment'],
        'note' => $_POST['note'],
    ];
    }
}
?>
        <h1 class="text-center">Partagez votre expérience</h1>
<?php 
 foreach($messages as $message) {?>
    <div class="alert alert-success">
        <?=$message;?>
    </div>
<?php } ?>
<?php foreach($errors as $error) {?>
    <div class="alert alert-danger">
        <?=$error;?>
    </div>
<?php } ?>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
        <div class="mb-2 px-5">
            <label for="name" class="form-label">Votre nom</label>
            <input type="text" name="name" id="name" class="form-control" value="<?=$comment['name'];?>">
        </div>
        <div class="mb-3 px-5">
            <label for="comment" class="form-label">Votre commentaire</label>
            <input type="text"  name="comment" id="comment" class="form-control" value="<?=$comment['comment'];?>">
        </div>
    <div class="mb-3 px-5">
        <div class="form-label">
            <label for="note" >Noter votre expérience</label>
        </div>
            <div class="rating">
                <input type="radio" id="star1" name="note" value="1" <?php if ($comment['note'] == 1) echo 'checked'; ?>>
                <label for="star1" title="1 étoile"><span class="star"><i class="fas fa-star"></i></span></label>
                <input type="radio" id="star2" name="note" value="2" <?php if ($comment['note'] == 2) echo 'checked'; ?>>
                <label for="star2" title="2 étoiles"><span class="star"><i class="fas fa-star"></i></span></label>
                <input type="radio" id="star3" name="note" value="3" <?php if ($comment['note'] == 3) echo 'checked'; ?>>
                <label for="star3" title="3 étoiles"><span class="star"><i class="fas fa-star"></i></span></label>
                <input type="radio" id="star4" name="note" value="4" <?php if ($comment['note'] == 4) echo 'checked'; ?>>
                <label for="star4" title="4 étoiles"><span class="star"><i class="fas fa-star"></i></span></label>
                <input type="radio" id="star5" name="note" value="5" <?php if ($comment['note'] == 5) echo 'checked'; ?>>
                <label for="star5" title="5 étoiles"><span class="star"><i class="fas fa-star"></i></span></label>
            </div>
    </div>
    <?php addCSRFTokenToForm(); ?>    
    <input type="submit" value="Soumettre" name="saveTemoignage" class="btn btn-primary px-5 mx-5">
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
<?php 
require_once('templates/footer.php');
?>
    
