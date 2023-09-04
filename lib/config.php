<?php
define('_CARS_IMG_PATH_','uploads/cars/');
define('_REPAR_IMG_PATH_','uploads/Entretien_reparations');
define('_ASSETS_IMG_PATH_','assets/images/');
define('_HOME_CARS_LIMIT_', 6);
define('_HOME_COMMENT_LIMIT_', 4);

    $mainMenu = [
        'index.php' => 'Accueil', 
        'inscription_employe.php' => 'Gestion des employés',
        'open_close.php' => 'Gestion des horaires',
        //'services.php' => 'Entretien et réparations',
        'add_modification_service.php' => 'Ajout/Modification services',
        //'cars.php' => 'Nos voitures',
        'add_modification_car.php' => 'Ajout/Suppression voitures',
      ];

    $visitMenu = [
      'index.php' => 'Accueil', 
      'services.php' => 'Entretien et réparations',
      'cars.php' => 'Nos voitures',
      'add_temoignage.php' => 'Témoignages',
      'contact.php' => 'Contact',
    ];

    $employeMenu = [
      'index.php' => 'Accueil', 
      //'services.php' => 'Entretien et réparations',
      //'cars.php' => 'Nos voitures',
      'add_modification_car.php' => 'Ajout/Suppression voitures',
      'approved_temoignage.php' => 'Témoignages',
      'form_auto_index.php' => 'Contact',
    ];

    