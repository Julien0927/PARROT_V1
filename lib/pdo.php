<?php
try {
$pdo = new PDO('mysql:host=localhost; dbname=garage_parrot','root', '' );
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 
catch (PDOException $e){
    echo 'erreur de connexion à la base de données' . $e -> getMessage();
}