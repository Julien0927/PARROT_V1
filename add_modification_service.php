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

if (isset ($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != ''){

    $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            
            $fileName = uniqid().'-'.slugify(strip_tags($_FILES['file']['name']));
            
            move_uploaded_file($_FILES['file']['tmp_name'], _REPAR_IMG_PATH_ .$fileName);

        } else {
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
<h2 class="row px-5">Ajouter une prestation</h2>
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
<div class="container mt-3">
        <div class="row align-items-center">
            <div class="col">
        <label for="name" class="form-label">Service</label>
        <input type="text" name="name" id="name" class="form-control" value="<?=$service['name'];?>">
        <label for="description" class="form-label">Nos prestations</label>
        <textarea  name="description" id="description" cols="30" rows="5" class="form-control"><?=$service['description'];?></textarea>
            </div>
        </div>
</div>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col">
        <label for="file" type="form-label">Image</label>
        <input type="file" name="file" id="file">
        <?php addCSRFTokenToForm(); ?>
        <input type="submit" value="Enregistrer" name="saveService" class="btn btn-primary mx-5 px-5 ">
            </div>
        </div>
    </div>            
</form>

<h2 class="row px-5 mt-5">Modifier une prestation</h2>
<?php 
$updateService = getService($pdo);
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
<div class="row mx-4">
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
<?php foreach ($updateService as $updateService){ ?>
    <article class="mt-3 col-md-4">
        <div class="card_services">
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
                    <?php addCSRFTokenToForm(); ?>
                    <input type="submit" value="Modifier" name="updateService" class="btn btn-primary mx-5 px-5">
                </form>
            </div>
        </div>
        </div>
    </article>
<?php };?>

<script>
const serviceInput = document.getElementById('name');

const formatNameInput = (inputElement) => {
    const inputValue = inputElement.value.trim();
    const words = inputValue.split(' ');

const formattedWords = words.map(word => {
    return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
});
    inputElement.value = formattedWords.join(' ');
};

serviceInput.addEventListener('blur', () => {
    formatNameInput(serviceInput);
});
</script>

<?php 
require_once('templates/footer.php');
?>
    

 