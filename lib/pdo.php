<?php
try {
$pdo = new PDO('mysql:host=mysql-julienvarachas.alwaysdata.net; dbname=julienvarachas_garage-parrot;port=3306; charset=utf8mb4','327887', 'T0mEmm@1114');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 
catch (PDOException $e){
    echo 'erreur de connexion à la base de données' . $e -> getMessage();
}

