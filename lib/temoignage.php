<?php
//Fonction qui permet d'enregistrer les témoignages clients
function saveTemoignage(PDO $pdo, string $name, string $comment, int $note ){
    $sql = 'INSERT INTO temoignages (`id`, `name`, `comment`, `note`) VALUES (NULL, :name, :comment, :note)';
    $query = $pdo -> prepare($sql);
    $query -> bindParam(':name', $name, PDO::PARAM_STR);
    $query -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $query -> bindParam(':note', $note, PDO::PARAM_INT);
    return $query -> execute();
}

//Fonction qui permet d'enregistrer les témoignages employés
function saveTemoignageEmploye(PDO $pdo, string $name, string $comment){
    $sql = 'INSERT INTO temoignages_employe (`id`, `name`, `comment`) VALUES (NULL, :name, :comment)';
    $query = $pdo -> prepare($sql);
    $query -> bindParam(':name', $name, PDO::PARAM_STR);
    $query -> bindParam(':comment', $comment, PDO::PARAM_STR);
    return $query -> execute();
}

 //Fonction qui permet de récupérer un témoignage par son identifiant
 function getTemoignageById(PDO $pdo, int $id){
    $query = $pdo -> prepare ('SELECT * FROM temoignages WHERE id = :id');
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();
    return $query -> fetch();
  }

  // Fonction qui permet de récupérer les témoignages clients 
  function getTemoignage(PDO $pdo){
    $sql = 'SELECT * FROM temoignages ORDER BY id DESC';
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
  // Fonction qui permet de récupérer les témoignages employés 
  function getTemoignageEmploye(PDO $pdo){
    $sql = 'SELECT * FROM temoignages_employe ORDER BY id DESC';
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  //Fonction qui permet de supprimer un commentaire
  function deleteTemoignage(PDO $pdo, int $id){
    $sql = 'DELETE FROM temoignages WHERE id = :id';
    $query = $pdo -> prepare($sql);
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
     return $query -> execute();
  }
  //Fonction qui permet d'approuver un commentaire
  function approveTemoignage(PDO $pdo, int $id) {
    $sql = 'UPDATE temoignages SET approved = 1 WHERE id = :id';
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    return $query->execute();
}
//Fonction qui permet d'afficher les messages 'approuvés'
  function getApprovedTestimony(PDO $pdo, $limit = null) {
    $sql = 'SELECT * FROM temoignages WHERE approved = 1 ORDER BY RAND()';

    if($limit){
      $sql .= ' LIMIT :limit ';
    }
    $query = $pdo->prepare($sql);

    if($limit){
      $query -> bindParam(':limit', $limit, PDO::PARAM_INT);
    }
    $query -> execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
  

  

?>