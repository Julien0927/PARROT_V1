<?php
try {

} 
catch (PDOException $e){
    echo 'erreur de connexion à la base de données' . $e -> getMessage();
}

