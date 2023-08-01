<article class="mt-3 col-md-4">
    <div class="card ">
        <img src="<?=getCarImage($car['image']); ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?=$car['title']; ?></h5>
            <p class="card-text"><?=$car['description']; ?></p>
            <a href="car.php?id=<?=$car['id'];?>" class="btn btn-primary">Voir la voiture</a>
          </div>
    </div>
</article>
      
