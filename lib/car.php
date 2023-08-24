<?php

  //Fonction qui permet de récupérer un véhicule par son identifiant
  function getCarById(PDO $pdo, int $id){
    $query = $pdo -> prepare ('SELECT * FROM cars WHERE id = :id');
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();
    return $query -> fetch();
  }

  //Fonction qui permet de récupérer l'image d'un véhicule
  function getCarImage(string|null $image){
    if($image === null){
      return _ASSETS_IMG_PATH_.'car_default.jpg';
    } else {
      return _CARS_IMG_PATH_.$image;
    }
  }

  // Fonction qui permet de tout récupérer soit de limiter (page d'accueil)
  function getCars(PDO $pdo, int $limit = null){
    $sql = 'SELECT * FROM cars ORDER BY id DESC';

    if($limit){
      $sql .= ' LIMIT :limit ';
    }

    $query = $pdo->prepare($sql);

    if($limit){
      $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }

    $query->execute();
    return $query->fetchAll();
  }

  function saveCar(PDO $pdo, string $marque, string $modele, int $prix, string|null $image, int $annee, int $kilometre, string $equipements){
    $sql = 'INSERT INTO `cars` (`id`, `marque`, `modele`, `prix`, `image`, `annee`, `kilometre`, `equipements`) VALUES (NULL, :marque, :modele, :prix, :image, :annee, :kilometre, :equipements)';
    $query = $pdo->prepare($sql);

    $query -> bindParam(':marque', $marque, PDO::PARAM_STR);
    $query -> bindParam(':modele', $modele, PDO::PARAM_STR);
    $query -> bindParam(':prix', $prix, PDO::PARAM_INT);
    $query -> bindParam(':image', $image, PDO::PARAM_STR);
    $query -> bindParam(':annee', $annee, PDO::PARAM_INT);
    $query -> bindParam(':kilometre', $kilometre, PDO::PARAM_INT);
    $query -> bindParam(':equipements', $equipements, PDO::PARAM_STR);
    
    return $query -> execute();
  }

  //Fonction qui permet de modifier un véhicule
  /**function updateCar(PDO $pdo, int $carId, string $marque, string $modele, int $prix, string|null $image, int $annee, int $kilometre, string $equipements){
    $sql = 'UPDATE `cars` SET `marque` = :marque, `modele` = :modele, `prix` = :prix, `image` = :image, `annee` = :annee, `kilometre` = :kilometre, `equipements` = :equipements WHERE `id` = :carId';
    $query = $pdo->prepare($sql);

    $query->bindParam(':marque', $marque, PDO::PARAM_STR);
    $query->bindParam(':modele', $modele, PDO::PARAM_STR);
    $query->bindParam(':prix', $prix, PDO::PARAM_INT);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    $query->bindParam(':annee', $annee, PDO::PARAM_INT);
    $query->bindParam(':kilometre', $kilometre, PDO::PARAM_INT);
    $query->bindParam(':equipements', $equipements, PDO::PARAM_STR);
    $query->bindParam(':carId', $carId, PDO::PARAM_INT);
    
    return $query->execute();
}*/

  //Fonction qui permet de supprimer un véhicule(vendu par exemple)
  /**function deleteCar(PDO $pdo, int $carId) {
    $sql = 'DELETE FROM `cars` WHERE `id` = :carId';
    $query = $pdo->prepare($sql);

    $query->bindParam(':carId', $carId, PDO::PARAM_INT);
    
    return $query->execute();

  }*/
  