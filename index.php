<?php
    
require_once('templates/header.php');
require_once('lib/car.php');

$cars = getCars($pdo/*, _HOME_CARS_LIMIT_*/);

?>


  <div class="row flex-lg-row-reverse align-items-center g-5 py-5 ">
      <div class="col-10 col-sm-8 col-lg-5">
        <img src="assets/images/logo_Garage.jpg" class="d-block mx-lg-auto img-fluid" alt="Logo garage" width="350" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">GARAGE Vincent PARROT</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="cars.php" class="btn btn-primary">Voir les voitures</a>
        </div>
      </div>
    </div>
    <div class="row p-5">

    <?php foreach($cars as $key => $car)
      include('templates/car_partial.php');
    
    {?>
      

    <?php } ?>
      
    <?php
    require_once('templates/footer.php');
    ?>
    

 