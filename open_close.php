<?php
require_once('templates/header.php');
require_once('lib/open_close.php');

$opens = getOpenGarage($pdo/*, _HOME_CARS_LIMIT_*/);

?>
<div class="row p-5">
      <h1>Horaires</h1>
        <?php 
          foreach($opens as $key => $open){
          include('templates/open_close_partial.php');}
        ?>
    </div>
    
<?php
require_once('templates/footer.php');
?>