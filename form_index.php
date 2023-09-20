<?php
require_once('templates/header.php');
require_once('lib/car.php');
require_once('lib/form_car.php');
require_once('lib/contact.php');

$cars = getCars($pdo);
$formAutos = getFormAuto($pdo);
$contact = getContact($pdo);

?>
<h1 class="text-center">Formulaires</h1>
<div class="row p-5">
      <h3>Formulaires de contact automobile</h3>
        <?php 
          foreach($formAutos as $key => $formAuto ){
            $carImages = getGaleryCar($pdo, $formAuto['cars_id']);
            $firstImage = isset($carImages[0]) ? $carImages[0]['image_filename'] : '_ASSETS_IMG_PATH_.car_default.jpg ';
          include('templates/form_car_partial.php');}
        ?>
</div>
<div class="row p-5">
      <h3>Formulaires de contact atelier</h3>
        <?php 
        foreach($contact as $key => $contact){
            include('templates/contact_partial.php');}
            ?>
</div>
<?php
  require_once('templates/footer.php');
?>
    

 