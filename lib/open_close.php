<?php

function getAllOpenDays(PDO $pdo) {
  $query = $pdo->query('SELECT * FROM open_hours');
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Function to update opening hours for a specific day
function updateOpeningHours(PDO $pdo, $id, $morning_hours, $afternoon_hours) {
  $query = $pdo->prepare('UPDATE open_hours SET morning_hours = :morning_hours, afternoon_hours = :afternoon_hours WHERE id = :id');
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->bindParam(':morning_hours', $morning_hours, PDO::PARAM_STR);
  $query->bindParam(':afternoon_hours', $afternoon_hours, PDO::PARAM_STR);
  return $query->execute();
}

// Gérer la soumission du formulaire

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['modifyHours'])) {
      $id = $_POST['day_id'];
      $newMorningHours = $_POST['morning_hours'];
      $newAfternoonHours = $_POST['afternoon_hours'];
      
      $res = updateOpeningHours($pdo, $id, $newMorningHours, $newAfternoonHours);
      if ($res) {
          $messages[] = 'Les horaires ont bien été modifiés';
      } else {
          $errors[] = 'Les horaires n\'ont pas été modifiés';
      }
  }
}
$openDays = getAllOpenDays($pdo);
