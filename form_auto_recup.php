<?php
require_once('templates/header.php');
require_once ('lib/form_car.php');
require_once ('lib/car.php');

$id = (int) $_GET['id'];

$car = getCarById($pdo, $id);
$formAuto = getFormAutoById($pdo, $id);
$image = getGaleryCar($pdo, $id);
if ($formAuto) {
  $car_id = $formAuto['cars_id'];
  $firstName = $formAuto['first_name'];
  $lastName = $formAuto['last_name'];
  $email = $formAuto['email'];
  $phone = $formAuto['phone'];
  $message = $formAuto['message'];

?>

<form action="<?= $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    <div class="text-center">
        <label for="objet" class="form-label">
            <h2>Message concernant le véhicule :</h2>
            <h3> <?= $car['marque']?> <?= $car['modele'] ?> de <?= $car['annee'] ?> </h3></label>
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
    <?php addCSRFTokenToForm(); ?>
    <input type="submit" value="Répondre" name="saveFormAuto" class="btn btn-primary mx-5 px-5">
</form>

<?php
} else {
    echo "Aucun résultat trouvé.";
}
require_once('templates/footer.php');
?>
