<?php
require_once('templates/header.php');
require_once('lib/open_close.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['modifyHours'])) {
        $id = $_POST['day_id'];
        $newMorningHours = $_POST['morning_hours'];
        $newAfternoonHours = $_POST['afternoon_hours'];
        
        $res = updateOpeningHours($pdo, $id, $newMorningHours, $newAfternoonHours);
        if ($res) {
            $messages[] = 'Les horaires ont bien été modifiés';
        } else {
            $errors[] = 'Les horaires n\'ont pas été modifiés';
        }
    }
  }
  $openDays = getAllOpenDays($pdo);
?>
<div class="row mx-4">
    <?php foreach ($openDays as $open){ ?>
        <article class="mt-3 col-md-4">
            <div class="card_hours">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title "><?= $open['day']; ?></h5>
                    <p class="card-text">Matin : <?= $open['morning_hours']; ?></p>
                    <p class="card-text">Après-midi : <?= $open['afternoon_hours']; ?></p>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="day_id" value="<?= $open['id']; ?>">
                    <div class="mb-2 px-5">
                        <label for="morning_hours" class="form-label">Matin</label>
                        <input type="text" name="morning_hours" id="morning_hours" class="form-control" value="<?= $open['morning_hours']; ?>">
                    </div>
                    <div class="mb-3 px-5">
                        <label for="afternoon_hours" class="form-label">Après-midi</label>
                        <input type="text" name="afternoon_hours" id="afternoon_hours" class="form-control" value="<?= $open['afternoon_hours']; ?>">
                    </div>
                        <input type="submit" value="Modifier" name="modifyHours" class="btn btn-primary">
                    </form>
                </div>
            </div>
            </div>
        </article>
    <?php }; ?>
</div>
<?php require_once('templates/footer.php')
?>