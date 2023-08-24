<article class="mt-3 col-md-4">
    <div class="card ">
          <div class="card-body">
            <h5 class="card-title"><?=$open['day']; ?></h5>
            <p class="card-text"><?=$open['morning_hours']; ?></p>
            <p class="card-text"><?=$open['afternoon_hours']; ?></p>
            <a href="open_close.php?id=<?=$open['id'];?>" class="btn btn-primary">Modifier</a>
          </div>
    </div>
</article>