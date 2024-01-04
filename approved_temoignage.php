<?php
require_once('templates/header.php');
require_once('lib/temoignage.php');

$errors = [];
$messages = [];
$testimony = getTemoignage($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($testimony as $testimony) {
        if (isset($_POST['deleteTemoignage'])) {
            $temoignages_id = $_POST['temoignages_id'];
            deleteTemoignage($pdo, $temoignages_id);
            $_SESSION['message'] = "Le témoignage a été supprimé avec succès.";
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        } elseif (isset($_POST['approveTemoignage'])) {
            $temoignages_id = $_POST['temoignages_id'];
            approveTemoignage($pdo, $temoignages_id);
            $_SESSION['message'] = "Le témoignage a été approuvé avec succès.";
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    }
}

$messages = isset($_SESSION['message']) ? [$_SESSION['message']] : [];
unset($_SESSION['message']); // Supprimez le message de la session après l'avoir récupéré
?>

<h1 class="text-center">Témoignages</h1>
<h2 class="text-center">Envoyés par les clients</h2>

<?php foreach ($messages as $message): ?>
    <div class="alert alert-success" role="alert">
        <?= $message; ?>
    </div>
<?php endforeach; ?>

<div class="container">
  <div class="row">
    <?php foreach ($testimony as $key => $testimony): ?>
      <div class="col-md-4 mt-3">
        <div class="card ">
          <div class="card-body">
            <h5 class="card-title"><?= $testimony['name']; ?></h5>
            <p class="card-text"><?= $testimony['comment']; ?></p>
            <form method="post">
              <input type="hidden" name="temoignages_id" value="<?= $testimony['id']; ?>">
              <?php if (!$testimony['approved']): ?>
                <button type="submit" name="approveTemoignage[<?= $testimony['id']; ?>]" class="btn btn-success">À approuver</button>
              <?php endif; ?>
              <?php addCSRFTokenToForm(); ?>
              <button type="submit" name="deleteTemoignage" class="btn btn-danger">Supprimer</button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php
require_once('temoignage_employe.php');
require_once('add_temoignage_employe.php');
require_once('templates/footer.php');
?>
