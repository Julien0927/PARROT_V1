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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="assets/images/logo_Garage.jpg" alt="logo garage" width="250">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">
      
      <?php foreach ($visitMenu as $key => $value) { ?>
          <li class="nav-item"><a href="<?=$key; ?>" class="nav-link <?php if ($currentPage === $key) { echo 'active'; } ?>"><?=$value ;?></a></li>
        <?php } ?>
      </ul>

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