<?php
require_once('templates/header.php');
require_once('lib/temoignage.php');

$errors = [];
$messages = [];
$testimonies = getTemoignageEmploye($pdo);
?>
<h2 class="text-center mt-5">Reçus par les employés</h2>
<div class="container">
  <div class="row">
    <?php 
    foreach($testimonies as $key => $testimoni){
    ?>
    <div class="col-md-4 mt-3">
        <div class="card ">
            <div class="card-body">
              <h5 class="card-title"><?=$testimoni['name']; ?></h5>
              <p class="card-text"><?=$testimoni['comment']; ?></p>
            </div>
        </div>
    </div>
       
    <?php } ?>
  </div>
</div>

