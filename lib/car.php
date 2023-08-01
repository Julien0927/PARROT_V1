<?php

function getCarById(PDO $pdo, int $id){
    $query = $pdo -> prepare ('SELECT * FROM cars WHERE id = :id');
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();
    return $query -> fetch();
  }

  function getCarImage(string|null $image){
    if($image === null){
      return _ASSETS_IMG_PATH_.'car_default.jpg';
    } else {
      return _CARS_IMG_PATH_.$image;
    }
  }

  function getCars(PDO $pdo, int $limit = null){
    $sql = 'SELECT * FROM cars ORDER BY id DESC';

    if($limit){
      $sql = ' LIMIT :limit ';
    }

    $query = $pdo->prepare($sql);

    if($limit){
      $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }

    $query->execute();
    return $query->fetchAll();
  }

  function saveCar(PDO $pdo, string $marque,string $modele, string $prix, string|null $image, int $annee, int $kilometre, array $equipements, array $options){
    $sql = 'INSERT INTO `cars` (`id`, `marque`, `modele`, `prix`, `image`, `annee`, `kilometre`, `equipements`, `options`) VALUES (NULL, :marque, :modele, :prix, :image, :annee, :kilometre, :equipements, :options)';
    $query = $pdo->prepare($sql);
    $query -> bindParam(':category_id', $category, PDO::PARAM_INT);
    $query -> bindParam(':title', $title, PDO::PARAM_STR);
    $query -> bindParam(':description', $description, PDO::PARAM_STR);
    $query -> bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
    $query -> bindParam(':instructions', $instructions, PDO::PARAM_STR);
    $query -> bindParam(':image', $image, PDO::PARAM_STR);
    
    return $query -> execute();
  }