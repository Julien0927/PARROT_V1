<?php

require_once('templates/header.php');

if(!isset ($_SESSION['user'])){
    header('location: login.php');
 }
 
require_once('lib/tools.php');
require_once('lib/car.php');
require_once('lib/category.php');



$errors = [];
$messages = [];
$car = [
    'title' =>'',
    'description' =>'',
    'ingredients' =>'',
    'instructions' =>'',
    'category_id' =>'',
];

$categories = getCategories($pdo);


if(isset ($_POST['saveCar'])){
$filename = null;

if (isset ($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != ''){
    $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite

            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            
            move_uploaded_file($_FILES['file']['tmp_name'], _CARS_IMG_PATH_.$fileName);

        } else {
            // Sinon on affiche un message erreur
            $errors[] = 'Le fichier doit être une image';
        }

}

   if (!$errors) {
   $res=saveCar($pdo, $_POST['category'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $fileName);
    if($res){
        $messages[] = 'La voiture a bien été enregistrée';
    } else {
        $errors[] = 'La voiture n\'a pas été sauvegardée';
    }
    }
    $car = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'ingredients' => $_POST['ingredients'],
        'instructions' => $_POST['instructions'],
        'category_id' => $_POST['category'],
    ];
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
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" id="title" class="form-control" value="<?=$car['title'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="description" class="form-label">Description</label>
        <textarea  name="description" id="description" cols="20" rows="" class="form-control"><?=$car['description'];?></textarea>
    </div>
    <div class="mb-3 px-5">
        <label for="ingredients" class="form-label">Ingrédients</label>
        <textarea  name="ingredients" id="ingredients" cols="30" rows="" class="form-control"><?=$car['ingredients'];?></textarea>
    </div>
    <div class="mb-3 px-5">
        <label for="instructions" class="form-label">Instructions</label>
        <textarea  name="instructions" id="instructions" cols="30" rows="" class="form-control"><?=$car['instructions'];?></textarea>
    </div>
    <div class="mb-3 p-5">
        <label for="category" class="form-label">Catégorie</label>
        <select  name="category" id="category" class="form-select">
            <?php foreach($categories as $category){
                
                ?>
            <option value="<?=$category['id'];?>" <?php if($car['category_id'] == $category['id']) {echo 'selected= "selected"';}?>><?=$category['name'];?></option>
            <?php } ?>
            
        </select>
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
    

 