<?php
require_once('templates/header.php');
require_once('lib/temoignage.php');

$id =(int) $_GET['id'];

$testimony = getTemoignageById($pdo, $id);

if($testimony) {
  
  $name = linesToArray($testimony['name']);
  $comment = linesToArray($testimony['comment']);
  $note = linesToArray($testimony['note']);
?>

<div class="row flex-lg-row-reverse align-items-center g-1 p-5">
  <h2>Témoignages</h2>
  <h5>Nom</h5>
  <ul class="list-group">
    <?php foreach ($name as $key => $name){?>
      <li class="list-group-item"><?=$name ;?></li>
    <?php } ?>
  </ul>
  <h5>Commentaire</h5>
  <ul class="list-group">
    <?php foreach ($comment as $key => $comment){?>
      <li class="list-group-item"><?=$comment ;?></li>
    <?php } ?>
  </ul>
  <h5>Note</h5>
  <ul class="list-group">
    <?php foreach ($note as $key => $note){?>
      <li class="list-group-item"><?=$note ;?></li>
    <?php } ?>
  </ul>
</div>

<?php }else{ ?>
  <div class="row text-center">
    <h1>Service introuvable</h1>
  </div>
<?php } 
require_once('templates/footer.php')
?>


    

 