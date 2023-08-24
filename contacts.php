<?php
require_once('templates/header.php');
//require_once('lib/user.php');
//require_once ('lib/form_car.php');
require_once ('lib/contact.php');



$id = (int) $_GET['id'];

$contact= getContactById($pdo, $id);

if ($contact) {
  $firstName = $contact['first_name'];
  $lastName = $contact['last_name'];
  $email = $contact['email'];
  $phone = $contact['phone'];
  $message = $contact['message'];


?>

<form method="POST" enctype="multipart/form-data">
    <div class="text-center">
        <label for="objet" class="form-label"><h3>Demande d'informations</h3>
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
