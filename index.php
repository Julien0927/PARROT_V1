<?php
require_once('templates/header.php');
require_once('lib/car.php');
require_once('lib/service.php');
require_once('lib/open_close.php');
require_once('lib/temoignage.php');

$cars = getCars($pdo, _HOME_CARS_LIMIT_);
$service = getService($pdo/*, _HOME_CARS_LIMIT_*/);
$testimony = getTemoignage($pdo, );
  if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === 'Employe'){?>
    <div class="session_effect">
      <div class="item">
        <h3 class="text-center">Bienvenue sur votre espace collaborateur</h3>
      </div>
    </div>
  <?php } 
  if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === 'Admin'){?>
    <div class="session_effect">
      <div class="item">
      <h3 class="text-center">Bienvenue sur votre espace administrateur</h3>
      </div>
    </div>
  <?php } ?>
    
<div class="row flex-lg-row-reverse align-items-center g-5 py-5 ">
  <div class="mb-5 col-10 col-sm-8 col-lg-5">
    <h2 class="text-center ">Témoignages</h2>
      <div class="testimonial-container">
        <?php 
        $testimonies = getApprovedTestimony($pdo, _HOME_COMMENT_LIMIT_);?>
        <div class="testimonial-carousel">
          <?php foreach ($testimonies as $key => $testimony) { ?>
            <div class="testimonial">
              <div class="card-body">
                <h5 class="card-title"><?= $testimony['name']; ?></h5>
                <p class="card-text"><?= $testimony['comment']; ?><br>
                <span class="rating checked">
          <?php
              for ($i = 1; $i <= $testimony['note']; $i++) {
              echo '<label style="font-size: 20px; color: goldenrod"><span class="star py-1"><i class="fas fa-star"></i></span></label>';
              } ?>
                </span>
                </p>
              </div>
            </div>              
          <?php } ;?>
        </div>
      </div>
  </div>
  <div class="col-lg-6">
    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">GARAGE Vincent PARROT</h1>
    <p class="lead">Fort de 15 ans d'expérience, Vincent Parrot a ouvert les portes de son propre garage en 2021. 
    Il a bâti une réputation solide en offrant une gamme complète de services, 
    allant de la réparation mécanique à l'entretien régulier, garantissant ainsi la performance et la sécurité de chaque véhicule. 
    Découvrez également notre sélection de véhicules d'occasion de qualité, 
    et confiez votre voiture à un lieu où la confiance et le professionnalisme sont au cœur de tout.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="cars.php" class="btn btn-primary">Voir les voitures</a>
      </div>
  </div>
</div>

<div class="row p-5">
  <h1>Nos services</h1>
    <?php 
      foreach($service as $key => $service){
      include('templates/service_partial.php');}
    ?>
</div>
    
<div class="row p-5">
  <h1>Nos véhicules d'occasion</h1>
    <?php 
      foreach($cars as $key => $car){
        $carImages = getGaleryCar($pdo, $car['id']);
        $firstImage = isset($carImages[0]) ? $carImages[0]['image_filename'] : '_ASSETS_IMG_PATH_.car_default.jpg ';
      include('templates/car_partial.php');}
    ?>
</div>
      
    <?php
    require_once('templates/footer.php');
    ?>
    

 