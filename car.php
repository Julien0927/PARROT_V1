<?php

require_once('templates/header.php');
require_once('lib/tools.php');
require_once('lib/car.php');
require_once('lib/user.php');
$messages = [];
$errors = [];
$id =(int) $_GET['id'];

$car = getCarById($pdo, $id);

if($car) {
  
  $marque = linesToArray($car['marque']);
  $modele = linesToArray($car['modele']);
  $prix = linesToArray($car['prix']);
  $annee = linesToArray($car['annee']);
  $kilometre = linesToArray($car['kilometre']);
  $equipements = linesToArray($car['equipements']);
  $images = getGaleryCar($pdo, $id);
  
?>
<div class="flexbox">
  <?php foreach ($images as $image) { ?>
    <div class="item">
      <div class="content">
        <img src="<?=_CARS_IMG_PATH_.$image['image_filename'];?>" class="d-block mx-lg-auto img-fluid" alt="<?=$car['marque']?>" width="350" height="250" loading="lazy">
      </div>
    </div>
  <?php } ?>
</div>

<div class="container text-center mt-5">
  <div class="row align-items-center">
    <div class="col">
      <h2>Marque</h2>
        <ul class="list-group">
          <?php foreach ($marque as $key => $marque){?>
            <li class="list-group-item"><?=$marque ;?></li>
          <?php } ?>
        </ul>
    </div>
    <div class="col">
      <h2>Modèle</h2>
        <ul class="list-group">
          <?php foreach ($modele as $key => $modele){?>
           <li class="list-group-item"><?=$modele ;?></li>
          <?php } ?>
        </ul>
    </div>
    <div class="col">
      <h2>Prix</h2>
        <ul class="list-group">
          <?php foreach ($prix as $key => $prix){?>
            <li class="list-group-item"><?=$prix ;?> €</li>
          <?php } ?>
        </ul>
    </div>
  </div>
</div>
<div class="container text-center mt-3">
  <div class="row align-items-center">
    <div class="col">
      <h2>Année</h2>
        <ul class="list-group">
          <?php foreach ($annee as $key => $annee){?>
            <li class="list-group-item"><?=$annee ;?></li>
          <?php } ?>
        </ul>
    </div>
    <div class="col">
      <h2>Kilomètres</h2>
        <ul class="list-group">
          <?php foreach ($kilometre as $key => $kilometre){?>
            <li class="list-group-item"><?=$kilometre ;?> Km</li>
          <?php } ?>
        </ul>
    </div>
  </div>
</div>
<div class="container mt-3 ">
  <div class="row align-items-center">
    <div class="col">
      <h2 class="text-center">Équipements</h2>
        <ul class="list-group">
          <?php foreach ($equipements as $key => $equipement){?>
            <li class="list-group-item"><?=$equipement ;?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>  
  <?php }else{ ?>
    <div class="row text-center">
      <h1>Voiture introuvable</h1>
      
    </div>
    <?php } 
    
require_once('del_car.php');
require_once ('form_auto.php');
require_once('templates/footer.php');
?>
