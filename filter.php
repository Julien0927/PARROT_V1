<?php
require_once('lib/car.php');
require_once('lib/config.php');
    
    try {
        $pdo = new PDO('mysql:host=localhost; dbname=garage_parrot','root', '' );
        } 
    catch (PDOException $e){
            echo 'erreur de connexion à la base de données' . $e -> getMessage();
        }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérez les valeurs des champs du formulaire POST
        $prix = $_POST['prix'];
        $kilometre = $_POST['kilometre'];
        $annee = $_POST['annee'];

        // Construisez la requête SQL en fonction des filtres
        $sql = 'SELECT * FROM cars WHERE prix <= :prix AND kilometre <= :kilometre AND annee >= :annee';

        // Préparez la requête SQL
        $stmt = $pdo->prepare($sql);

        // Liez les paramètres
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':kilometre', $kilometre);
        $stmt->bindParam(':annee', $annee);

        // Exécutez la requête SQL
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        if (count($results) > 0) {?>
            <h3>Résultat(s) de votre recherche</h3>
            <?php foreach ($results as $key => $car) {
               $carImages = getGaleryCar($pdo, $car['id']);
                $firstImage = isset($carImages[0]) ? $carImages[0]['image_filename'] : '_ASSETS_IMG_PATH_ .car_default.jpg ';
            include('templates/car_partial.php');}
        } else {?>
            <div class="text-center">
            <?php echo "<tr><td colspan='5'>Aucun résultat trouvé</td></tr>";?>
            </div>
    <?php } 
}
      
    