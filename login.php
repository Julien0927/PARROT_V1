<?php
//require_once ('lib/session.php');
require_once('templates/header.php');
require_once('lib/user.php');
?>


<h1 class="px-5">Connexion</h1>

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

<form method="POST" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']?>">
    <div class="col-lg-4 col-md-8 col-sm-12 mb-2 px-5">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="col-lg-4 col-md-8 col-sm-12 mb-3 px-5">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
   
    <input type="submit" value="connexion" name="loginUser" class="btn btn-primary px-5 mx-5">
</form>


<?php
require_once('templates/footer.php');

