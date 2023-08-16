<?php

require_once('templates/header.php');
require_once('lib/tools.php');
require_once('lib/service.php');


$id =(int) $_GET['id'];

$service = getServiceById($pdo, $id);


if($service) {
  
  
  $name = linesToArray($service['name']);
  $description = linesToArray($service['description']);
?>

<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?=getServiceImage($service['image']);?>" class="d-block mx-lg-auto img-fluid" alt="<?=$car['marque']?>" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?=$service['name'];?></h1>
        <p class="lead"><?=$service['description'];?></p>
       
      </div>
    </div>

<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Nos services</h2>
  <ul class="list-group">
    <?php foreach ($name as $key => $name){?>
      <li class="list-group-item"><?=$name ;?></li>
    <?php } ?>
  </ul>

</div>
<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h2>Prestations</h2>
  <ul class="list-group">
    <?php foreach ($description as $key => $description){?>
      <li class="list-group-item"><?=$description ;?></li>
    <?php } ?>
  </ul>
</div>

<?php }else{ ?>
  <div class="row text-center">
    <h1>Service introuvable</h1>
  </div>
<?php } ?>


    

 