<?php 

require_once ('lib/open_close.php');
require_once ('open_close.php');
$id = $_GET['id'];

if(isset($_POST['modifyHours'])){
    $newMorningHours = $_POST['morning_hours'];
    $newAfternoonHours = $_POST['afternoon_hours'];
    
$res = modifyHours($pdo, $id, $newMorningHours, $newAfternoonHours);
if($res){
    $messages[] = 'Les horaires ont bien été modifiés';
} else {
    $errors[] = 'Les horaires n\'ont pas été modifiés';
}
    $openHours = [
        'morning_hours' => $_POST['morning_hours'],
        'afternoon_hours' => $_POST['afternoon_hours'],
    ];
    var_dump($res);
}

?>

<article class="mt-3 col-md-4">
    <div class="card ">
        <div class="card-body">
            <h5 class="card-title"><?=$open['day']; ?></h5>
            <p class="card-text"><?=$open['morning_hours']; ?></p>
            <p class="card-text"><?=$open['afternoon_hours']; ?></p>
            <a href="open_close.php?id=<?=$open['id'];?>" class="btn btn-primary">Modifier</a>
        </div>
    </div>
    <form method="POST" enctype="multipart/form-data" >
    <div class="mb-2 px-5">
        <label for="morning_hours" class="form-label">Matin</label>
        <input type="text" name="morning_hours" id="open_hours" class="form-control" value="<?=$open['morning_hours'];?>">
    </div>
    <div class="mb-3 px-5">
        <label for="afternoon_hours" class="form-label">Après-midi</label>
        <input type="text"  name="afternoon_hours" id="open_hours" class="form-control" value="<?=$open['afternoon_hours'];?>">
    </div>
    <input type="submit" value="Modifier" name="modifyHours" class="btn btn-primary">
</form>
</article>