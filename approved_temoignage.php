<?php
require_once('templates/header.php');
require_once('lib/temoignage.php');

$errors = [];
$messages = [];
$testimony = getTemoignage($pdo);
?>
<h1 class="text-center">Témoignages clients reçus</h1>
<?php 
    foreach($testimony as $key => $testimony){
      $isApproved = $testimony['approved'] == 1;
      ?>
      <div class="row mx-4">
    <div class="col-md-4 mt-3">

        <div class="card ">
          <div class="card-body">
            <h5 class="card-title"><?=$testimony['name']; ?></h5>
            <p class="card-text"><?=$testimony['comment']; ?></p>
            <form method="post">
                <input type="hidden" name="temoignages_id" value="<?= $testimony['id']; ?>">
                <?php if(!$isApproved){?>
                <button type="submit" name="approveTemoignage[<?= $testimony['id']; ?>]" class="btn btn-success">À approuver</button>
                <?php } ?>
                <button type="submit" name="deleteTemoignage" class="btn btn-danger">Supprimer</button>
            </form>
          </div>
        </div>
    
</div>
</div>
<?php
foreach($testimony as $testimony){
if (isset($_POST['deleteTemoignage'])){
    $temoignages_id = $_POST['temoignages_id'];
    deleteTemoignage($pdo, $temoignages_id);
    
    } 
    elseif (isset($_POST['approveTemoignage'])){
    $temoignages_id = $_POST['temoignages_id'];
    approveTemoignage($pdo, $temoignages_id);
    header('location: approved_temoignage.php');
     }?>                 
     
<?php } 
}
require_once('add_temoignage.php');
require_once('templates/footer.php');
      
