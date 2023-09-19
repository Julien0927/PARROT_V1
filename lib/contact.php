<?php
//Fonction qui permet de récupérer le contact par son identifiant
function getContactById(PDO $pdo, int $id){
    $query = $pdo -> prepare ('SELECT * FROM contact WHERE id = :id');
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();
    return $query -> fetch();
  }

  
  // Fonction qui permet de tout récupérer (page d'accueil)
  function getContact(PDO $pdo){
    $sql = 'SELECT * FROM contact ORDER BY id DESC';
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  //Fonction qui permet de récupérer le formulaire de contact dans la BDD
  function saveContact(PDO $pdo, string $firstName, string $lastName, string $email, string $phone, $message){
    $sql = 'INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`) VALUES (NULL, :first_name, :last_name, :email, :phone, :message)';
    $query = $pdo->prepare($sql);
    $query -> bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $query -> bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $query -> bindParam(':email', $email, PDO::PARAM_STR);
    $query -> bindParam(':phone', $phone, PDO::PARAM_STR);
    $query -> bindParam(':message', $message, PDO::PARAM_STR);
    return $query -> execute();
  }
  