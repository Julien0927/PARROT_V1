<article class="mt-3 col-md-4">
    <div class="card ">
    <img src="<?=getCarImage($firstImage); ?>" class="card-img-top" alt="image automobile">
          <div class="card-body">
            <h5 class="card-title"><?=$formAuto['marque']; ?></h5>
            <p class="card-text"><?=$formAuto['modele']; ?></p>
            <a href="form_auto.php?id=<?=$formAuto['cars_id'];?>" class="btn btn-primary">Voir le message</a>
          </div>
    </div>
</article>
