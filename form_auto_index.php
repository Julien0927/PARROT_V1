<?php
 

require_once('templates/header.php');
require_once('lib/car.php');
require_once('lib/form_car.php');
require_once('lib/contact.php');

$cars = getCars($pdo/*, _HOME_CARS_LIMIT_*/);
//$service = getService($pdo/*, _HOME_CARS_LIMIT_*/);
$formAutos = getFormAuto($pdo,);
$contact = getContact($pdo);

?>
   
    <div class="row p-5">
      <h1>Formulaires de contact automobile</h1>
        <?php 
          foreach($formAutos as $key ){
            $carsId = $key['cars_id'];
            $marque = $key['marque'];
            $modele = $key['modele'];
            $annee = $key['annee'];
            $image = $key['image'];
            $firstName = $key['first_name'];
            $lastName = $key['last_name'];
            $email = $key['email'];
            $phone = $key['phone'];
            $message = $key['message'];

          include('templates/form_car_partial.php');}
        ?>
    </div>
    <div class="row p-5">
      <h1>Formulaires de contact atelier</h1>
        <?php 
        foreach($contact as $key => $contact){
            include('templates/contact_partial.php');}
            ?>
    </div>
      

      
    <?php
    
    require_once('templates/footer.php');
    ?>
    

 