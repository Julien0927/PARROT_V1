<article class="mt-2 col-md-4">
    <div class="card ">
        <?php 
      ?>
        <img src="<?=getCarImage($firstImage); ?>" class="card-img-top" alt="image automobile">
          <div class="card-body">
            <h5 class="card-title"><?=$car['marque']; ?></h5>
            <p class="card-text"><?=$car['modele']; ?> mise en circulation : <?=$car['annee']; ?> </p>
            <p class="card-text"><?=$car['prix'].' €'; ?></p>
            <p class="card-text"><?=$car['kilometre'].' Km'; ?></p>
            <a href="car.php?id=<?=$car['id'];?>" class="btn btn-primary">Voir la voiture</a>
          </div>
    </div>
</article>
      
