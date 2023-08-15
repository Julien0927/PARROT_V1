<?php
require_once('templates/header.php');
require_once('lib/user.php');

$errors = [];
$messages = [];

if(isset($_POST['loginUser'])){

    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    
    if($user) {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'roles' => $user['roles'], 
        ];
        if($_SESSION['user']['roles'] === 'Admin'){
            header('location: index_intra.php');
        }
        elseif($_SESSION['user']['roles'] === 'Visiteur'){
           
            header('location: index.php');
        }
    } else {
       $errors[] = 'Email ou mot de passe incorrect';
    }
}


    
?>

<h1>Connexion</h1>

<?php foreach($messages as $message) {?>
    <div class="alert alert-success">
        <?=$message;?>
    </div>
<?php } ?>
<?php foreach ($errors as $error) {?>
    <div class="alert alert-danger">
        <?=$error;?>
    </div>
<?php } ?>

<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>">
    <div class="mb-2 px-5">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="mb-2 px-5">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
   
    <input type="submit" value="connexion" name="loginUser" class="btn btn-primary">
</form>


<?php
require_once('templates/footer.php');

?>