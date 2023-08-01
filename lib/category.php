<?php

function getMarque(PDO $pdo){
    $sql = 'SELECT * FROM marque';

    $query = $pdo->prepare($sql);

    $query->execute();
    return $query->fetchAll();
  }