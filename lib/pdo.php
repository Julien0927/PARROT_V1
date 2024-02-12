<?php
try {
/*$pdo = new PDO ('mysql:host=localhost; dbname=julienvarachas_garage-parrot; port=3306; charset=utf8mb4', 'root', '');*/
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 
catch (PDOException $e){
    echo 'erreur de connexion à la base de données' . $e -> getMessage();
}

