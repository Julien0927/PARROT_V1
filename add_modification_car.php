<?php

require_once('templates/header.php');


if(!isset ($_SESSION['user'])){
    header('location: login.php');
}


require_once('lib/tools.php');
require_once('lib/car.php');



$errors = [];
$messages = [];
$car = [
    'marque' =>'',
    'modele' =>'',
    'prix' =>'',
    'annee' =>'',
    'kilometre' =>'',
    'equipements' =>'',
    
];

//$categories = getCategories($pdo);
if(isset ($_POST['saveCar'])){
$filename = null;

//Si un fichier a été envoyé
if (isset ($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != ''){

    //La méthode getimagesize retourne false si le fichier n'est pas une image
    $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite

            // uniqid() évitera l'écrasement de fichier
            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            
            move_uploaded_file($_FILES['file']['tmp_name'], _CARS_IMG_PATH_ .$fileName);

        } else {
            // Sinon on affiche un message erreur
            $errors[] = 'Le fichier doit être une image';
        }

}

    if(isset($_POST['saveCar'])){
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $prix = $_POST['prix'];
        $annee = $_POST['annee'];
        $kilometre = $_POST['kilometre'];
        $equipements = $_POST['equipements'];
        

        if (empty($marque) || empty($modele) || empty($prix) || empty($annee) || empty($kilometre) || empty($equipements)) {
        $errors[] = 'Tous les champs sont obligatoires.';
    } else {
   $res=saveCar($pdo,$_POST['marque'], $_POST['modele'], $_POST['prix'], $fileName, $_POST['annee'], $_POST['kilometre'], $_POST['equipements']);
    if($res){
        $messages[] = 'La voiture a bien été enregistrée';
    } else {
        $errors[] = 'La voiture n\'a pas été sauvegardée';
    }
    
    
    $car = [
        'marque' => $_POST['marque'],
        'modele' => $_POST['modele'],
        'prix' => $_POST['prix'],
        'annee' => $_POST['annee'],
        'kilometre' => $_POST['kilometre'],
        'equipements' => $_POST['equipements'],
    ];
}
    }
}

?>

<h1>Ajouter une voiture</h1>

<?php foreach($messages as $message) {?>
    <div class="alert alert-success">
        <?=$message;?>
    </div>
<?php } ?>
<?php foreach($errors as $error) {?>
    <div class="alert alert-danger">
        <?=$error;?>
    </div>
<?php } ?>

<form method="POST" enctype="multipart/form-data" >
    <div class="mb-2 px-5">
        <label for="marque" class="form-label">Marque</label>
        <input type="text" name="marque" id="marque" class="form-control" value="<?=$car['marque'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="modele" class="form-label">Modèle</label>
        <input type="text"  name="modele" id="modele" class="form-control" value="<?=$car['modele'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="prix" class="form-label">Prix</label>
        <input type="text"  name="prix" id="prix" class="form-control" value="<?=$car['prix'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="annee" class="form-label">Année</label>
        <input type="text"  name="annee" id="annee" class="form-control" value="<?=$car['annee'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="kilometre" class="form-label">Kilomètres</label>
        <input type="text"  name="kilometre" id="kilometre" class="form-control" value="<?=$car['kilometre'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="equipements" class="form-label">Équipements et options</label>
        <textarea  name="equipements" id="equipements" cols="30" rows="" class="form-control"><?=$car['equipements'];?></textarea>
    </div>
    <div class="mb-3 p-5">
        <label for="file" type="form-label">Image</label>
        <input type="file" name="file" id="file">
    </div>
    <input type="submit" value="enregistrer" name="saveCar" class="btn btn-primary">
</form>

<?php 
require_once('templates/footer.php');
?>
    
