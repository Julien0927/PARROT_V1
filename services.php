<?php
require_once('templates/header.php');
require_once('lib/service.php');

$service = getService($pdo);
?>

<div class="row flex-lg-row-reverse align-items-center g-5 p-5">
  <h1>Nos services</h1>
</div>

<div class="row">

    <?php foreach($service as $key => $service){
      include('templates/service_partial.php');
    
    }?>
      
</div>
    
<?php
require_once('templates/footer.php');
?>