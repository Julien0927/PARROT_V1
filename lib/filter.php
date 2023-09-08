<?php

/**function filter(PDO $pdo, int $kilometre, int $prix, int $annee){
    $sql = 'SELECT * FROM cars WHERE prix <= :prix AND kilometre <= :kilometre AND annee <= :annee';
    $query = $pdo -> prepare($sql);
    $query ->bindParam(':prix', $prix, PDO::PARAM_INT);
    $query ->bindParam(':kilometre', $kilometre, PDO::PARAM_INT);
    $query ->bindParam(':annee', $annee, PDO::PARAM_INT);
    $query -> execute();

   $query -> fetchAll(PDO::FETCH_ASSOC);
}
    // Construisez la requête SQL en fonction des filtres
    function filter(PDO $pdo, int $prix, int $kilometre, int $annee){
        var_dump($prix, $kilometre, $annee);
    $sql = "SELECT * FROM cars WHERE prix <= :prix AND kilometre <= :kilometre AND annee <= :annee";

    $query = $pdo->prepare($sql);

    $query->bindParam(':prix', $prix, PDO::PARAM_INT);
    $query->bindParam(':kilometre', $kilometre, PDO::PARAM_INT);
    $query->bindParam(':annee', $annee, PDO::PARAM_INT);

    // Exécutez la requête SQL
       
    if ($query->execute()){
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($results)) {
            foreach($results as $row){
                echo "<tr><td>" . htmlspecialchars($row["marque"]) . "</td><td>" . htmlspecialchars($row["modele"]) . "</td><td>" . htmlspecialchars($row["prix"]) . "</td><td>" . htmlspecialchars($row["kilometres"]) . "</td><td>" . htmlspecialchars($row["annee"]) . "</td></tr>";            }
            }
        }else {
            echo "<tr><td colspan='5'>Aucun résultat trouvé</td></tr>";
      } 
      echo "Erreur lors de l'exécution de la requête SQL.";
    }*/
    if (isset($_POST['filter'])) {
        // Récupérez les valeurs des champs du formulaire POST
        $prix = $_POST['prix'];
        $kilometre = $_POST['kilometre'];
        $annee = $_POST['annee'];

        // Construisez la requête SQL en fonction des filtres
        $sql = "SELECT * FROM cars WHERE prix <= :prix AND kilometre <= :kilometre AND annee >= :annee";

        // Préparez la requête SQL
        $stmt = $pdo->prepare($sql);

        // Liez les paramètres
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':kilometre', $kilometre);
        $stmt->bindParam(':annee', $annee);

        // Exécutez la requête SQL
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
            // Générez le contenu de la table HTML à renvoyer en réponse à la requête AJAX
            foreach ($results as $row) {
                echo "<tr><td>" . $row["marque"] . "</td><td>" . $row["modele"] . "</td><td>" . $row["prix"] . "</td><td>" . $row["kilometre"] . "</td><td>" . $row["annee"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucun résultat trouvé</td></tr>";
        }
    }
