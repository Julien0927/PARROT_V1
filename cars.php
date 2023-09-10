<?php

require_once('templates/header.php');
require_once('lib/car.php');

$cars = getCars($pdo);

?>
<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>" id="filter-form" class="">
    <label for="prix">Prix maximum :</label>
    <input type="text" id="prix" name="prix">

    <label for="kilometre">Kilomètres maximum : </label>
    <input type="text" id="kilometre" name="kilometre">

    <label for="annee">Année de mise en circulation :</label>
    <input type="text" id="annee" name="annee">

    <input type="submit" name="filter" value="Filtrer" class="btn btn-primary">
</form>

<div class="col-md-4 mt-3" id="results"></div>

<div class="row flex-lg-row align-items-center g-5 p-5">
  <h1>Liste des voitures</h1>
</div>

<div class="row">
    <?php foreach($cars as $key => $car){
       $carImages = getGaleryCar($pdo, $car['id']);
       $firstImage = isset($carImages[0]) ? $carImages[0]['image_filename'] : '_ASSETS_IMG_PATH_.car_default.jpg ';
      include('templates/car_partial.php');
    }?>
</div>
<?php
require_once('templates/footer.php');
?>

    

 