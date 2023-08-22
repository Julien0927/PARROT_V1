<?php 

$formAuto = getFormAuto($pdo);
?>
<article class="mt-3 col-md-4">
    <div class="card ">
    <img src="<?=getFormAutoImage($key['image']); ?>" class="card-img-top" alt="image automobile">

          <div class="card-body">
            <h5 class="card-title"><?=$key['marque']; ?></h5>
            <p class="card-text"><?=$key['modele']; ?></p>
            <a href="form_auto_recup.php?id=<?=$key['cars_id'];?>" class="btn btn-primary">Voir le message</a>
          </div>
    </div>
</article>