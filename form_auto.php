<?php
require_once('templates/header.php');
//require_once('lib/user.php');
require_once ('lib/form_car.php');

$errors = [];
$messages = [];

$cars_id =(int) $_GET['id'];

$car_id = getCarById($pdo, $id);

if(isset($_POST['saveFormAuto'])){
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($message)) {
        $errors[] = 'Tous les champs sont obligatoires.';
    } else {
    
    $res = saveFormAuto($pdo,$cars_id, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['message']);

    if($res){
        $messages[]= 'Votre message a bien été envoyé';
        
    } else {
        $errors[]= 'Erreur s\'est produite, votre message n\'a pu être envoyé';
    }
    }
}


?>

<h3 class="text-center mt-5">Pour plus d'informations, n'hésitez pas à nous contacter via le formulaire de contact ci-dessous ou par téléphone au 06.12.34.56.78</h3>

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
    <div class="text-center">
        <label for="objet" class="form-label">Message concernant le véhicule :<h3> <?=$car['marque']?> <?=$car['modele']?> de <?=$car['annee']?></h3> </label>
    </div>
    <div class="container ">
        <div class="row align-items-center">
            <div class="col">    
                <label for="first_name" class="form-label">Prénom</label>
                <input type="first_name" name="first_name" id="first_name" class="form-control">
            </div>
            <div class="col">
                <label for="last_name" class="form-label">Nom</label>
                <input type="last_name" name="last_name"  id="last_name" class="form-control">
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col"> 
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="col">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="phone" name="phone" id="phone" class="form-control">
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col"> 
                <div class="mb-3 px-1">
                <label for="message" class="form-label">Votre Message</label>
                <textarea  type="text" name="message" id="message" cols="20" rows="5" class="form-control"></textarea>
                <input type="submit" value="Envoyer" name="saveFormAuto" class="btn btn-primary mt-2">
                </div>
            </div>
        </div>
    </div>
   
</form>


<?php 
require_once('templates/footer.php');
?>