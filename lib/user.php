<?php


/** Permet d'ajouter un utilisateur */
function addUser(PDO $pdo, string $first_name, string $last_name, string $email, string $password){
    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `roles`) VALUES ( :first_name, :last_name, :email, :password, :roles);";
    $query = $pdo->prepare($sql);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $role = 'Visiteur';
    $query -> bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $query -> bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $query -> bindParam(':email', $email, PDO::PARAM_STR);
    $query -> bindParam(':password', $password, PDO::PARAM_STR);
    $query -> bindParam(':roles', $role, PDO::PARAM_STR);
        
    return $query->execute();
}

/**Permet de vérifier le mail et le mot de passe d'un utilisateur */
function verifyUserLoginPassword(PDO $pdo, string $email, string $password){

    $query = $pdo -> prepare ('SELECT * FROM users WHERE email = :email');
    $query -> bindParam(':email', $email, PDO::PARAM_STR);
    $query -> execute();
    $user = $query -> fetch();

    if($user && password_verify($password, $user['password'])){
        return $user;
    } else {
        return false;
    }
    
}
/**Permet de vérifier le role d'un utilisateur et fourni les accès en fonction */
/**function verifyUserRole(PDO $pdo, string $email, string $role) {

    $query = $pdo -> prepare('SELECT * FROM users WHERE email = :email AND roles = :roles');
    $query -> bindParam(':email', $email, PDO::PARAM_STR);
    $query -> bindParam (':roles', $role, PDO::PARAM_STR);
    $query -> execute();
    $user = $query -> fetch();
    var_dump($user);
    if($user === 'Visiteur'){
        return true;
    } else {
        return false;
    }
    
}*/





