<?php
//Fonction pour récupérer tous les horaires d'ouverture
function getAllOpenDays(PDO $pdo) {
  $query = $pdo->query('SELECT * FROM open_hours');
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour modifier les horaires d'ouverture
function updateOpeningHours(PDO $pdo, $id, $morning_hours, $afternoon_hours) {
  $query = $pdo->prepare('UPDATE open_hours SET morning_hours = :morning_hours, afternoon_hours = :afternoon_hours WHERE id = :id');
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->bindParam(':morning_hours', $morning_hours, PDO::PARAM_STR);
  $query->bindParam(':afternoon_hours', $afternoon_hours, PDO::PARAM_STR);
  return $query->execute();
}



