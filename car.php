<?php

require_once('templates/header.php');
require_once('lib/tools.php');
require_once('lib/car.php');


$id =(int) $_GET['id'];

$car = getCarById($pdo, $id);


if($car) {
  
  
  $marque = linesToArray($car['marque']);
  $modele = linesToArray($car['modele']);
  $prix = linesToArray($car['prix']);
  $annee = linesToArray($car['annee']);
  $kilometre = linesToArray($car['kilometre']);
  $equipements = linesToArray($car['equipements']);
  
?>

<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?=getCarImage($car['image']);?>" class="d-block mx-lg-auto img-fluid" alt="<?=$car['marque']?>" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?=$car['marque'];?></h1>
        <p class="lead"><?=$car['modele'];?></p>
       
      </div>
    </div>

<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Marque</h2>
  <ul class="list-group">
    <?php foreach ($marque as $key => $marque){?>
      <li class="list-group-item"><?=$marque ;?></li>
    <?php } ?>
  </ul>

</div>
<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Modèle</h2>
  <ul class="list-group">
    <?php foreach ($modele as $key => $modele){?>
      <li class="list-group-item"><?=$modele ;?></li>
    <?php } ?>
  </ul>
</div>
<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Prix</h2>
  <ul class="list-group">
    <?php foreach ($prix as $key => $prix){?>
      <li class="list-group-item"><?=$prix ;?></li>
    <?php } ?>
  </ul>
</div>
<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Année</h2>
  <ul class="list-group">
    <?php foreach ($annee as $key => $annee){?>
      <li class="list-group-item"><?=$annee ;?></li>
    <?php } ?>
  </ul>
</div>
<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Kilomètres</h2>
  <ul class="list-group">
    <?php foreach ($kilometre as $key => $kilometre){?>
      <li class="list-group-item"><?=$kilometre ;?></li>
    <?php } ?>
  </ul>
</div>
<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Équipements</h2>
  <ul class="list-group">
    <?php foreach ($equipements as $key => $equipement){?>
      <li class="list-group-item"><?=$equipement ;?></li>
    <?php } ?>
  </ul>
</div>

<?php }else{ ?>
  <div class="row text-center">
    <h1>Voiture introuvable</h1>
  </div>
<?php } ?>

<?php 
require_once('templates/footer.php');
?>
    

 