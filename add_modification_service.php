<?php

require_once('templates/header.php');


if(!isset ($_SESSION['user'])){
   header('location: login.php');
}


require_once('lib/tools.php');
require_once('lib/service.php');

$errors = [];
$messages = [];
$service = [
    'name' =>'',
    'description' =>'',
];

if(isset ($_POST['saveService'])){
$filename = null;

//Si un fichier a été envoyé
if (isset ($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != ''){

    //La méthode getimagesize retourne false si le fichier n'est pas une image
    $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite

            // uniqid() évitera l'écrasement de fichier
            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            
            move_uploaded_file($_FILES['file']['tmp_name'], _REPAR_IMG_PATH_ .$fileName);

        } else {
            // Sinon on affiche un message erreur
            $errors[] = 'Le fichier doit être une image';
        }

}

    if(isset($_POST['saveService'])){
        $name = $_POST['name'];
        $description = $_POST['description'];

        if (empty($name) || empty($description) || empty($fileName)) {
        $errors[] = 'Tous les champs sont obligatoires.';
    } else {
   $res=saveService($pdo,$_POST['name'], $_POST['description'], $fileName);
    if($res){
        $messages[] = 'La prestation a bien été enregistrée';
    } else {
        $errors[] = 'La prestation n\'a pas été sauvegardée';
    }
    
    
    $service = [
        'name' =>'',
        'description' =>'',
    ];
}
    }
}
?>

<h1>Ajouter une prestation</h1>

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

<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
    <div class="mb-2 px-5">
        <label for="name" class="form-label">Service</label>
        <input type="text" name="name" id="name" class="form-control" value="<?=$service['name'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="description" class="form-label">Nos prestations</label>
        <textarea  name="description" id="description" cols="30" rows="" class="form-control"><?=$service['description'];?></textarea>
    </div>
    <div class="mb-3 p-5">
        <label for="file" type="form-label">Image</label>
        <input type="file" name="file" id="file">
    </div>
    <input type="submit" value="enregistrer" name="saveService" class="btn btn-primary">
</form>

<h1>Modifier une prestation</h1>

<?php 
$updateService = getService($pdo/*, _HOME_CARS_LIMIT_*/);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['updateService'])) {
        $id = $_POST['id'];
        $newName = $_POST['name'];
        $newDescription = $_POST['description'];
        
        $res = updateService($pdo, $id, $newName, $newDescription);
        if ($res) {
            $messages[] = 'Le service bien été modifié';
        } else {
            $errors[] = 'Le service n\'a pas été modifié';
        }
    }
  }
?>

<?php foreach ($updateService as $updateService){ ?>
    <article class="mt-3 col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $updateService['name']; ?></h5>
                <p class="card-text"><?= $updateService['description']; ?></p>
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $updateService['id']; ?>">
                    <div class="mb-2 px-5">
                        <label for="name" class="form-label">Prestation</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $updateService['name']; ?>">
                    </div>
                    <div class="mb-3 px-5">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" name="description" id="description" class="form-control" value="<?= $updateService['description']; ?>"cols="30" rows="5"></textarea>
                    </div>
                    <input type="submit" value="Modifier" name="updateService" class="btn btn-primary">
                </form>
            </div>
        </div>
    </article>
<?php };
?>


<?php 
require_once('templates/footer.php');
?>
    

 