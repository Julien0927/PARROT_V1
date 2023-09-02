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
if (isset($_POST['saveCar'])) {
    $filenames = [];

    if (!empty($_FILES['file']['tmp_name'][0])) {
        foreach ($_FILES['file']['tmp_name'] as $index => $tmpName) {
            $checkImage = getimagesize($tmpName);
            if ($checkImage !== false) {
                $fileName = uniqid() . '-' . slugify($_FILES['file']['name'][$index]);
                move_uploaded_file($tmpName, _CARS_IMG_PATH_ . $fileName);
                $filenames[] = $fileName;
            } else {
                $errors[] = 'Le fichier ' . $_FILES['file']['name'][$index] . ' doit être une image';
            }
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
   $res=saveCar($pdo,$_POST['marque'], $_POST['modele'], $_POST['prix'], $filenames, $_POST['annee'], $_POST['kilometre'], $_POST['equipements']);
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
    <div class="col-lg-4 col-md-8 col-sm-12 mb-2 px-5">
        <label for="marque" class="form-label">Marque</label>
        <input type="text" name="marque" id="marque" class="form-control" value="<?=$car['marque'];?>">
        
        <label for="modele" class="form-label">Modèle</label>
        <input type="text"  name="modele" id="modele" class="form-control" value="<?=$car['modele'];?>">
        
        <label for="prix" class="form-label">Prix</label>
        <input type="text"  name="prix" id="prix" class="form-control" value="<?=$car['prix'];?>">
        
        <label for="annee" class="form-label">Année</label>
        <input type="text"  name="annee" id="annee" class="form-control" value="<?=$car['annee'];?>">
        
        <label for="kilometre" class="form-label">Kilomètres</label>
        <input type="text"  name="kilometre" id="kilometre" class="form-control" value="<?=$car['kilometre'];?>">
        
        <label for="equipements" class="form-label">Équipements et options</label>
        <textarea  name="equipements" id="equipements" cols="30" rows="" class="form-control"><?=$car['equipements'];?></textarea>
    </div>
    <div class="mb-3 p-5">
        <label for="file" type="form-label">Images</label>
        <input type="file" name="file[]" multiple id="file">
    </div>
    <input type="submit" value="enregistrer" name="saveCar" class="btn btn-primary px-5 mx-5">
    
</form>

<?php 
require_once('templates/footer.php');
?>
