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

function openGarage (PDO $pdo){
    $query = $pdo -> prepare('SELECT * FROM open_hours');
    /**$query -> bindParam(':day', $day, PDO::PARAM_STR);
    $query -> bindParam(':morning_hours', $morningH, PDO::PARAM_STR);
    $query -> bindParam(':afternoon_hours', $afternoonH, PDO::PARAM_STR);*/
    $query -> execute();
    return $query -> fetch();
};

function selectDay (PDO $pdo){
    $sql = 'SELECT * FROM open_hours WHERE day = :day';
    $query = $pdo->prepare($sql);
    $query -> bindParam(':day', $day, PDO::PARAM_STR);
    $query -> execute();

    return $query->fetchAll(PDO::FETCH_COLUMN);
}

