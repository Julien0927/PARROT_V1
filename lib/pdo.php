<?php
try {
/**$pdo = new PDO('mysql:host=localhost; dbname=garage_parrot','root', '' );*/
$pdo = new PDO ('mysql://cb9ybbmfjh9yoaza:mqek1m0d7wnmdi51@clwxydcjair55xn0.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/mdrfukoudk4r1w3o');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 
catch (PDOException $e){
    echo 'erreur de connexion à la base de données' . $e -> getMessage();
}