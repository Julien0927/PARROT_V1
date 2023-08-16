<article class="mt-3 col-md-4">
    <div class="card ">
        <img src="<?=getServiceImage($service['image']); ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?=$service['name']; ?></h5>
            <p class="card-text"><?=$service['description']; ?></p>
            <a href="service.php?id=<?=$service['id'];?>" class="btn btn-primary">Voir les prestations</a>
          </div>
    </div>
</article>