<article class="mt-3 col-md-4">
    <div class="card ">
          <div class="card-body">
            <h5 class="card-title"><?=$contact['first_name']; ?></h5>
            <p class="card-text"><?=$contact['last_name']; ?></p>
            <a href="contacts.php?id=<?=$contact['id'];?>" class="btn btn-primary">Voir le message</a>
          </div>
    </div>
</article>