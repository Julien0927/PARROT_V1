<?php

function getOpenGarageById(PDO $pdo, int $id){
    $query = $pdo -> prepare ('SELECT * FROM open_hours WHERE id = :id');
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();
    return $query -> fetch();
  }
function getOpenGarage(PDO $pdo,){
    $sql = 'SELECT * FROM open_hours ';
    $query = $pdo -> prepare ($sql);
    $query -> execute();
    return $query -> fetchAll();
  }

function modifyHours (PDO $pdo, $id, string $newMorningHours, string $newAfternoonHours ){
    $sql= 'UPDATE open_hours SET morning_hours = :morning_hours, afternoon_hours = :afternoon_hours WHERE id =:id';
    $query = $pdo -> prepare($sql);
    $query -> bindParam (':id', $id, PDO::PARAM_INT);
    $query -> bindParam (':morning_hours', $newMorningHours, PDO::PARAM_STR);
    $query -> bindParam (':afternoon_hours', $newAfternoonHours, PDO::PARAM_STR);
    $query -> execute();
    
}

