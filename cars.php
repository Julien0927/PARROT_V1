<?php

require_once('templates/header.php');
require_once('lib/car.php');

$cars = getCars($pdo);
?>

<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h1>Liste des voitures</h1>
</div>

<div class="row">

    <?php foreach($cars as $key => $car){
      include('templates/car_partial.php');
    
    }?>
      
</div>


<?php
require_once('templates/footer.php');
?>

    

 