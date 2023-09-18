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

if (isset($_POST['saveCar'])) {
    $filenames = [];

    if (!empty($_FILES['file']['tmp_name'][0])) {
        foreach ($_FILES['file']['tmp_name'] as $index => $tmpName) {
            $checkImage = getimagesize($tmpName);
            if ($checkImage !== false) {
                $rawFileName = $_FILES['file']['name'][$index];
                $cleanedFileName = strip_tags($rawFileName);
                $fileName = uniqid() . '-' . slugify($cleanedFileName);
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
   $res=saveCar($pdo,$marque, $modele, $prix, $filenames, $annee, $kilometre, $equipements);
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

<h1 class="row mx-5">Ajouter une voiture</h1>

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
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" name="marque" id="marque" class="form-control" value="<?=$car['marque'];?>">
            </div>
            <div class="col">
                <label for="modele" class="form-label">Modèle</label>
                <input type="text"  name="modele" id="modele" class="form-control" value="<?=$car['modele'];?>">
            </div>
            <div class="col">
                <label for="prix" class="form-label">Prix</label>
                <input type="text"  name="prix" id="prix" class="form-control" value="<?=$car['prix'];?>">
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col">
                <label for="annee" class="form-label">Année</label>
                <input type="text"  name="annee" id="annee" class="form-control" value="<?=$car['annee'];?>">
            </div>
            <div class="col">
                <label for="kilometre" class="form-label">Kilomètres</label>
                <input type="text"  name="kilometre" id="kilometre" class="form-control" value="<?=$car['kilometre'];?>">
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col">
                <label for="equipements" class="form-label">Équipements et options</label>
                <textarea  name="equipements" id="equipements" cols="30" rows="5" class="form-control"><?=$car['equipements'];?></textarea>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col">
                <label for="file" type="form-label">Images</label>
                <input type="file" name="file[]" multiple id="file">
                
                <input type="submit" value="Enregistrer" name="saveCar" class="btn btn-primary px-5 mx-5">
            </div>
        </div>
    </div>
</form>
<script>
//Fonction qui permet de transformer les saisies (1ere lettre majuscule, le reste en minuscule)
const marqueInput = document.getElementById('marque')
const modeleInput = document.getElementById('modele')

const formatNameInput = (inputElement) => {
    const inputValue = inputElement.value.trim();
    const words = inputValue.split(' ');

const formattedWords = words.map(word => {
    return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
});
    inputElement.value = formattedWords.join(' ');
};
marqueInput.addEventListener('blur', () => {
    formatNameInput(marqueInput);
});
modeleInput.addEventListener('blur', () => {
    formatNameInput(modeleInput);
});

//Fonction qui permet de gérer les erreurs de saisie d'année
const anneeInput = document.getElementById('annee');
const anneeActuelle = new Date().getFullYear();

anneeInput.addEventListener('input', () => {
    let valeur = anneeInput.value; 
    valeur = valeur.replace(/\D/g, '');

    if (valeur.length > 4) {
        valeur = valeur.slice(0, 4)
    } 
    
    let annee = parseInt(valeur);

    if (annee > anneeActuelle) {
        annee = anneeActuelle;
    }
    anneeInput.value = annee; 
});

//Fonction qui permet de controler la saisie de prix
const prixInput = document.getElementById('prix');

prixInput.addEventListener('input', () => {
    let valPrix = prixInput.value;
    valPrix = valPrix.replace(/\D/g, ''); 

    if (valPrix.length > 6) {
        valPrix = valPrix.slice(0, 6); 
    }
    
    prixInput.value = valPrix; 
});

//Fonction qui permet de controler la saisie de kilometre
const kilometreInput = document.getElementById('kilometre');

kilometreInput.addEventListener('input', () => {
    let valKilometre = kilometreInput.value;
    valKilometre = valKilometre.replace(/\D/g, ''); 

    if (valKilometre.length > 6) {
        valKilometre = valKilometre.slice(0, 6); 
    }
    
    kilometreInput.value = valKilometre; 
});
</script>
<?php 
require_once('templates/footer.php');
?>
