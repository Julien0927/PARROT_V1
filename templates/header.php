<?php
  
  require_once('lib/session.php');
  require_once('lib/config.php');
  require_once('lib/pdo.php');

  $currentPage = basename($_SERVER['SCRIPT_NAME']);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V.PARROT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body class="structure">
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="assets/images/logo_Garage.jpg" alt="logo garage" width="250">
        </a>
      </div>
      <?php 
      require_once('lib/gestion_session.php');
      ?>

      <div class="col-md-3 text-end">
        <?php
        if(!isset($_SESSION['user'])) {?>
          <a href="login.php" class="btn btn-outline-primary me-2"> Se connecter</a>
          <a href="inscription.php" class="btn btn-outline-primary me-2"> S'inscrire</a>
        <?php } else { ?>
          <a href="logout.php" class="btn btn-primary">Se déconnecter</a>
        <?php } ?>
      </div>
    </header>
  </div>
