<?php

require_once('templates/header.php');
require_once('lib/car.php');
require_once('lib/filter.php');


$cars = getCars($pdo);


?>
<form method="POST" action="<?=$_SERVER['PHP_SELF'];?>" id="filter-form">
    <label for="prix">Prix maximum :</label>
    <input type="number" id="prix" name="prix">

    <label for="kilometre">Kilomètres maximum : </label>
    <input type="number" id="kilometre" name="kilometre">

    <label for="annee">Année de mise en circulation :</label>
    <input type="number" id="annee" name="annee">

    <input type="submit" name="filter" value="Filtrer">
</form>

<div id="results">
    Les résultats filtrés seront affichés ici 
</div>



<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
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

    

 