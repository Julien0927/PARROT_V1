<?php
 

require_once('templates/header_intra.php');
require_once('lib/car.php');
require_once('lib/service.php');


$cars = getCars($pdo/*, _HOME_CARS_LIMIT_*/);
$service = getService($pdo);

?>

<h3 class="text-center">Bienvenue sur votre espace administrateur</h3>
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5 ">
      <div class="col-10 col-sm-8 col-lg-5">
        <img src="assets/images/logo_Garage.jpg" class="d-block mx-lg-auto img-fluid" alt="Logo garage" width="350" loading="lazy">
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

    <?php 
      foreach($service as $key => $service){
        include('templates/service_partial.php');}
    
        foreach($cars as $key => $car){
      include('templates/car_partial.php');
     } ?>
      
    <?php
    require_once('templates/footer.php');
    ?>
    

 