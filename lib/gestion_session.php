<?php if(!isset($_SESSION['user'])){?>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">
      <?php foreach ($visitMenu as $key => $value) { ?>
          <li class="nav-item"><a href="<?=$key; ?>" class="nav-link <?php if ($currentPage === $key) { echo 'active'; } ?>"><?=$value ;?></a></li>
        <?php } ?>
      </ul>
      <?php } ?>
      <?php if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === 'Visiteur'){?>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">
      <?php foreach ($visitMenu as $key => $value) { ?>
          <li class="nav-item"><a href="<?=$key; ?>" class="nav-link <?php if ($currentPage === $key) { echo 'active'; } ?>"><?=$value ;?></a></li>
        <?php } ?>
      </ul>
      <?php } ?>
      <?php if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === 'Employe'){?>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">
      <?php foreach ($employeMenu as $key => $value) { ?>
          <li class="nav-item"><a href="<?=$key; ?>" class="nav-link <?php if ($currentPage === $key) { echo 'active'; } ?>"><?=$value ;?></a></li>
        <?php } ?>
      </ul>
      <?php } ?>
      <?php if(isset($_SESSION['user']) && $_SESSION['user']['roles'] === 'Admin'){?>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav nav-pills">
      <?php foreach ($mainMenu as $key => $value) { ?>
          <li class="nav-item"><a href="<?=$key; ?>" class="nav-link <?php if ($currentPage === $key) { echo 'active'; } ?>"><?=$value ;?></a></li>
        <?php } ?>
      </ul>
      <?php } ?>