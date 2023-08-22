<?php
require_once('templates/header.php');
//require_once('lib/user.php');
require_once ('lib/form_car.php');
require_once ('lib/car.php');

$errors = [];
$messages = [];

$id = (int) $_GET['id'];

$car_id = getCarById($pdo, $id);
$formAuto = getFormAutoById($pdo, $id);

if ($formAuto) {
  $car_id = $formAuto['cars_id'];
  $marque = $formAuto['marque'];
  $modele = $formAuto['modele'];
  $annee = $formAuto['annee'];
  $firstName = $formAuto['first_name'];
  $lastName = $formAuto['last_name'];
  $email = $formAuto['email'];
  $phone = $formAuto['phone'];
  $message = $formAuto['message'];
  $image = $formAuto['image'];


?>

<form method="POST" enctype="multipart/form-data">
    <div class="text-center">
        <img src="<?= getFormAutoImage($image); ?>" class="d-block mx-lg-auto img-fluid" alt=""
             width="200" height="50" loading="lazy">
        <label for="objet" class="form-label">Message concernant le véhicule :
            <h3> <?= $marque ?> <?= $modele ?> de <?= $annee ?> </h3></label>
    </div>

    <div class="mb-2 px-5">
        <label for="first_name" class="form-label">Prénom :
            <?= $firstName ?></label>
    </div>

    <div class="mb-2 px-5">
        <label for="last_name" class="form-label">Nom : <?= $lastName ?></label>
    </div>

    <div class="mb-2 px-5">
        <label for="email" class="form-label">Email : <?= $email ?></label>
    </div>

    <div class="mb-2 px-5">
        <label for="phone" class="form-label">Téléphone : <?= $phone ?></label>
    </div>

    <div class="mb-3 px-5">
        <label for="message" class="form-label">Message reçu : <?= $message ?></label>
    </div>

    <input type="submit" value="Répondre" name="saveFormAuto" class="btn btn-primary">
</form>

<?php
} else {
    echo "Aucun résultat trouvé.";
}

require_once('templates/footer.php');
?>
