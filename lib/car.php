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

  function getGaleryCar (PDO $pdo, int $id){
    $query = $pdo -> prepare('SELECT image_filename FROM car_images WHERE car_id = :car_id');
    $query -> bindParam(':car_id', $id, PDO::PARAM_INT);
    $query -> execute();
    return $query -> fetchAll(PDO::FETCH_ASSOC);
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

  function saveCar(PDO $pdo, string $marque, string $modele, string $prix, array|string $images, int $annee, int $kilometre, string $equipements) {
    $sql = 'INSERT INTO `cars` (`id`, `marque`, `modele`, `prix`, `annee`, `kilometre`, `equipements`) VALUES (NULL, :marque, :modele, :prix, :annee, :kilometre, :equipements)';
    $query = $pdo->prepare($sql);

    $query->bindParam(':marque', $marque, PDO::PARAM_STR);
    $query->bindParam(':modele', $modele, PDO::PARAM_STR);
    $query->bindParam(':prix', $prix, PDO::PARAM_STR);
    $query->bindParam(':annee', $annee, PDO::PARAM_INT);
    $query->bindParam(':kilometre', $kilometre, PDO::PARAM_INT);
    $query->bindParam(':equipements', $equipements, PDO::PARAM_STR);

    if ($query->execute()) {
        $carId = $pdo->lastInsertId();
        if (!empty($images)) {
          foreach ($images as $image) {
            $imageSql = 'INSERT INTO `car_images` (`car_id`, `image_filename`) VALUES (:car_id, :image_filename) ';
            $imageQuery = $pdo -> prepare($imageSql);
            $imageQuery->bindParam(':car_id', $carId, PDO::PARAM_INT);
            $imageQuery->bindParam(':image_filename', $image, PDO::PARAM_STR);
            $imageQuery->execute();
            }
       }
        return _CARS_IMG_PATH_;
    } else {
        return false;
    }
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
