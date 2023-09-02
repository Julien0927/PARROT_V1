<?php
require_once('templates/header.php');
//require_once('lib/user.php');
require_once ('lib/contact.php');

$errors = [];
$messages = [];



if(isset($_POST['saveContact'])){
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($message)) {
        $errors[] = 'Tous les champs sont obligatoires.';
    } else {
    
    $res = saveContact($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['message']);

    if($res){
        $messages[]= 'Votre message a bien été envoyé';
        
    } else {
        $errors[]= 'Erreur s\'est produite, votre message n\'a pu être envoyé';
    }
    }
}


?>

<h3 class="text-center">Formulaire de contact atelier ou par téléphone au 06.12.34.56.78</h3>

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

<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"  >
    <div class="mb-2 px-5">
        <label for="first_name" class="form-label">Prénom</label>
        <input type="first_name" name="first_name" id="first_name" class="form-control">
    </div>

    <div class="mb-2 px-5">
        <label for="last_name" class="form-label">Nom</label>
        <input type="last_name" name="last_name"  id="last_name" class="form-control">
    </div>


    <div class="mb-2 px-5">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="mb-2 px-5">
        <label for="phone" class="form-label">Téléphone</label>
        <input type="phone" name="phone" id="phone" class="form-control">
    </div>

    <div class="mb-3 px-5">
        <label for="message" class="form-label">Votre Message</label>
        <textarea  type="text" name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
    </div>
   
    <input type="submit" value="Envoyer" name="saveContact" class="btn btn-primary">
</form>


<?php 
require_once('templates/footer.php');
?>