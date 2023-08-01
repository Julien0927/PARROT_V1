<?php

require_once('templates/header.php');
require_once('lib/tools.php');
require_once('lib/car.php');


$id =(int) $_GET['id'];

$car = getCarById($pdo, $id);


if($car) {
  
  
  $ingredients = linesToArray($car['ingredients']);
  $instructions = linesToArray($car['instructions']);
  
?>

<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?=getCarImage($car['image']);?>" class="d-block mx-lg-auto img-fluid" alt="<?=$car['title']?>" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?=$car['title'];?></h1>
        <p class="lead"><?=$car['description'];?></p>
       
      </div>
    </div>

<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Ingrédients</h2>
  <ul class="list-group">
    <?php foreach ($ingredients as $key => $ingredient){?>
      <li class="list-group-item"><?=$ingredient ;?></li>
    <?php } ?>
  </ul>

</div>
<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Instructions</h2>
  <ol class="list-group list-group-numbered">
    <?php foreach ($instructions as $key => $instruction){?>
      <li class="list-group-item"><?=$instruction ;?></li>
    <?php } ?>
  </ol>
</div>

<?php }else{ ?>
  <div class="row text-center">
    <h1>Voiture introuvable</h1>
  </div>
<?php } ?>

<?php 
require_once('templates/footer.php');
?>
    

 