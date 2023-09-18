<?php
if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === 'Employe'|| 
    isset($_SESSION['user']) && $_SESSION['user']['roles'] === 'Admin'){?>
    <div class="d-flex flex-column align-items-center col mt-3">
      <h5>Le véhicule a été vendu ?</h5>
      <form method="post">
      <?php addCSRFTokenToForm(); ?>
        <input type="submit" value="Supprimer" name="deleteCar" class="btn btn-danger px-5 mx-5 mb-3">
      </form>
    </div>  
    <?php } 
      if(isset($_POST['deleteCar'])){
        $delCar = deleteCar($pdo, $id);
        if($delCar){
        $messages[]= 'Le véhicule a bien été supprimé';
      } else {
        $messages[]= 'Le véhicule a bien été supprimé';
        
      }
    }
      foreach($messages as $message) {?>
        <div class="alert alert-success">
            <?=$message;?>
        </div>
    <?php } ?>
    <?php foreach($errors as $error) {?>
        <div class="alert alert-danger">
            <?=$error;?>
        </div>
    <?php } ?>