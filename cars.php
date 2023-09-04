<?php

require_once('templates/header.php');
require_once('lib/car.php');
require_once('lib/filter.php');



$cars = getCars($pdo);
?>

<form id="filter-form">
        <label for="min-price">Prix minimum :</label>
        <input type="text" id="min-price" name="min-price">

        <label for="max-price">Prix maximum :</label>
        <input type="text" id="max-price" name="max-price">

        <label for="max-kilometre">Kilomètres maximum :</label>
        <input type="text" id="max-kilometre" name="max-kilometre">

        <label for="annee">Année de mise en circulation :</label>
        <input type="text" id="annee" name="annee">

        <input type="submit" value="Filtrer">
    </form>

    <div id="results">
        <!-- Les résultats filtrés seront affichés ici -->
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

    

 