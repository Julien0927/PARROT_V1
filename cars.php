<?php

require_once('templates/header.php');
require_once('lib/car.php');

$cars = getCars($pdo);

?>
<div class="filter">
  <div class="container">
    <div class="row ">
      <div class="col-md-4">
        <form method="POST" action="<?=$_SERVER['PHP_SELF'];?>" id='filter-form' class="">
        <label for="prix">Prix maximum :</label>
        <input type="text" id="prix" name="prix">
      </div>
      <div class="col-md-4">
        <label for="kilometre">Kilomètres maximum : </label>
        <input type="text" id="kilometre" name="kilometre">
      </div>
      <div class="col-md-4">
        <label for="annee">Année de mise en circulation :</label>
        <input type="text" id="annee" name="annee">
      </div>
        <input type="submit" name="filter" value="Filtrer" class="btn btn-primary px-5 mt-3">
        </form>
    </div>
  </div>
</div>

<div id="results" class="row flex-lg-row align-items-center g-5 p-5" ></div>

<div class="row flex-lg-row align-items-center g-5 mx-4">
  <h1>Liste des voitures</h1>
</div>
<div class="row mx-5">
    <?php foreach($cars as $key => $car){
       $carImages = getGaleryCar($pdo, $car['id']);
       $firstImage = isset($carImages[0]) ? $carImages[0]['image_filename'] : '_ASSETS_IMG_PATH_.car_default.jpg ';
      include('templates/car_partial.php');
    }?>
</div>
<script>
  //Fonction qui permet de filtrer les véhicules
const filtre = document.getElementById('filter-form')
filtre.addEventListener('submit', (e) => {
    e.preventDefault(); // Empêche la soumission du formulaire par défaut

    const prix = document.getElementById('prix').value;
    const kilometre = document.getElementById('kilometre').value;
    const annee = document.getElementById('annee').value;

    const xhr = new XMLHttpRequest();

    // Spécifiez la méthode et l'URL du script PHP de traitement côté serveur.
    xhr.open('POST', 'filter.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Configurez la fonction de rappel pour gérer la réponse AJAX.
    xhr.onreadystatechange =  () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Mettez à jour le contenu de la division "results" avec les données filtrées.
            document.getElementById('results').innerHTML = xhr.responseText;
        }
    };

    // Envoyez la requête AJAX avec les données du formulaire.
    xhr.send(`prix=${prix}&kilometre=${kilometre}&annee=${annee}`);
});
</script>

<?php
require_once('templates/footer.php');
?>

    

 