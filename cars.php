<?php

require_once('templates/header.php');
require_once('lib/car.php');

$cars = getCars($pdo);

?>
<div class="container">
  <div class="row ">
    <div class="col-md-4">
      <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>" id="filter-form" class="">
      <label for="prix">Prix maximum :</label>
      <input type="text" id="prix" name="prix">
    </div>
    <div class="col-md-4">
      <label for="kilometre">Kilomètres maximum : </label>
      <input type="text" id="kilometre" name="kilometre">
    </div>
    <div class="col-md-4">
      <label for="annee">Année de mise en circulation :</label>
      <input type="text" id="annee" name="annee">
    </div>
      <input type="submit" name="filter" value="Filtrer" class="btn btn-primary px-5 mt-3">
      </form>
  </div>
</div>

<div class="row flex-lg-row align-items-center g-5 p-5">
        <div id="results"></div>
</div>
<div class="row flex-lg-row align-items-center g-5 p-2 mx-4">
  <h1>Liste des voitures</h1>
</div>

<div class="row mx-5">
    <?php foreach($cars as $key => $car){
       $carImages = getGaleryCar($pdo, $car['id']);
       $firstImage = isset($carImages[0]) ? $carImages[0]['image_filename'] : '_ASSETS_IMG_PATH_.car_default.jpg ';
      include('templates/car_partial.php');
    }?>
</div>
<?php
require_once('templates/footer.php');
?>

    

 