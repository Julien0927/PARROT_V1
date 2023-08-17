<?php
require_once('templates/header.php');
require_once('lib/user.php');

$errors = [];
$messages = [];

$id =(int) $_GET['id'];

$car = getCarById($pdo, $id);


if($car) {
  
  
  $marque = ($car['marque']);
  $modele = ($car['modele']);
  $annee = ($car['annee']);
}

if(isset($_POST['carMessage'])){
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $message = $_POST['message'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($message)) {
        $errors[] = 'Tous les champs sont obligatoires.';
    } else {
    
    $res = getCarByID($pdo, $_POST['id']);

    if($res){
        $messages[]= 'Votre message a bien été envoyé';
        header ('location: index.php');
    } else {
        $errors[]= 'Erreur s\'est produite, votre message n\'a pu être envoyé';
    }
    }
}

?>

<h1>Formulaire de contact</h1>

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

<form method="POST" enctype="multipart/form-data"  >
    <div class="mb-2 px-5">
        <label for="objet" class="form-label">Message concernant le véhicule : <?=$car['marque']?> <?=$car['modele']?> de <?=$car['annee']?> </label>
        
    </div>
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

    <div class="mb-3 px-5">
        <label for="messsage" class="form-label">Votre Message</label>
        <textarea  name="messsage" id="messsage" cols="30" rows="" class="form-control"><?=$car['equipements'];?></textarea>
    </div>
   
    <input type="submit" value="Envoyer" name="carMessage" class="btn btn-primary">
</form>


<?php 
require_once('templates/footer.php');
?>