<?php 
require_once('lib/open_close.php');
?>
      <div class="container">
        <footer class="py-5 lh-1">
          <div class="row">
            <div class="col-md-4  mb-3 ">
            <form>
            <h5>Coordonnées</h5>
              <p>Garage Vincent Parrot</p>
              <p>15 Rue François Larché</p>
              <p>31000 TOULOUSE</p>
              <p>Tél : 06.12.34.56.78</p>
              <p>Email : garage-parrot@parrot.fr</p>
            </form>
            </div>

            <div class="col-6 col-md-4 mb-3">
            <h5>Horaires d'ouvertures</h5>
            <ul class="nav flex-column">
            <?php
            $openDays = getAllOpenDays($pdo);
            foreach ($openDays as $open){ ?>
                <li class="nav-item mb-2">
                  <?= $open['day']; ?> : <?= $open['morning_hours']; ?> / <?= $open['afternoon_hours']; ?>
                </li>
            <?php }; ?>      
            </ul>
            </div>
            <div class="col-md-3  mb-3">
              <img src="assets/images/logo_Garage.jpg">
            </div>
          </div>

          <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 border-top">
            <p>© 2023 Company, Inc. All rights reserved.</p>
          </div>
        </footer>
      </div>
    <script src="assets/js/script.js"></script>
  </body>
</html>