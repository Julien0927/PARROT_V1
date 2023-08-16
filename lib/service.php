<?php

function getServiceById(PDO $pdo, int $id){
    $query = $pdo -> prepare ('SELECT * FROM services WHERE id = :id');
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();
    return $query -> fetch();
  }

  function getServiceImage(string|null $image){
    if($image === null){
      return _ASSETS_IMG_PATH_.'car_default.jpg';
    } else {
      return _CARS_IMG_PATH_.$image;
    }
  }
  // Fonction qui permet de tout récupérer soit de limiter (page d'accueil)
  function getService(PDO $pdo){
    $sql = 'SELECT * FROM services';
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  function saveService(PDO $pdo, string $name, string $description, string|null $image){
    $sql = 'INSERT INTO `services` (`id`, `name`, `description`, `image`) VALUES (NULL, :name, :description, :image)';
    $query = $pdo->prepare($sql);
    $query -> bindParam(':name', $name, PDO::PARAM_STR);
    $query -> bindParam(':description', $description, PDO::PARAM_STR);
    $query -> bindParam(':image', $image, PDO::PARAM_STR);
    
    return $query -> execute();
  }
  