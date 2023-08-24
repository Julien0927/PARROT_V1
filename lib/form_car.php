<?php

// Fonction qui permet de récupérer les formulaires de contact automobile par identifiant
  function getFormAutoById(PDO $pdo, int $id){
    $query = $pdo->prepare('SELECT 
        fa.cars_id, c.marque, c.modele, c.annee, c.image, fa.first_name, 
        fa.last_name, fa.email, fa.phone, fa.message 
        FROM formauto AS fa
        JOIN cars AS c ON fa.cars_id = c.id
        WHERE fa.cars_id = :id');
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

  // Fonction qui permet de récupérer les formulaires de contact automobile
  function getFormAuto(PDO $pdo){
    $statement = 'SELECT 
    fa.cars_id, c.marque, c.modele, c.annee, c.image, fa.first_name, 
    fa.last_name, fa.email, fa.phone, fa.message 
    FROM formauto AS fa
    JOIN cars AS c ON fa.cars_id = c.id';
    $query = $pdo->prepare($statement);
    $query->execute();
    return $query->fetchAll();
  }
  //Fonction qui permet d'insérer  et sauvegarder un véhicule en BDD
  function saveFormAuto(PDO $pdo, int $cars_id, string $firstName, string $lastName, string $email, string $phone, $message){
    $sql = 'INSERT INTO `formauto` (`id`, `cars_id`, `first_name`, `last_name`, `email`, `phone`, `message`) VALUES (NULL, :cars_id, :first_name, :last_name, :email, :phone, :message)';
    $query = $pdo->prepare($sql);
    $query -> bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
    $query -> bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $query -> bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $query -> bindParam(':email', $email, PDO::PARAM_STR);
    $query -> bindParam(':phone', $phone, PDO::PARAM_STR);
    $query -> bindParam(':message', $message, PDO::PARAM_STR);
    return $query -> execute();
  }

  //Fonction qui permet de récupérer l'image du formulaire
  function getFormAutoImage(string|null $image){
    if($image === null){
      return _ASSETS_IMG_PATH_.'car_default.jpg';
    } else {
      return _CARS_IMG_PATH_.$image;
    }
  }