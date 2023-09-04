<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des filtres depuis la requête POST
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];
    $maxKilometre = $_POST['maxKilometre'];
    $annee = $_POST['annee'];

    // Requête SQL pour obtenir les résultats filtrés
    $sql = "SELECT * FROM cars WHERE 
            (prix >= :minPrice OR :minPrice IS NULL) AND
            (prix <= :maxPrice OR :maxPrice IS NULL) AND
            (kilometre <= :maxKilometre OR :maxKilometre IS NULL) AND
            (annee = :annee OR :annee IS NULL)";

    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Remplacement des paramètres avec les valeurs postées
    $stmt->bindParam(':minPrice', $minPrice, PDO::PARAM_INT);
    $stmt->bindParam(':maxPrice', $maxPrice, PDO::PARAM_INT);
    $stmt->bindParam(':maxKilometre', $maxKilometre, PDO::PARAM_INT);
    $stmt->bindParam(':annee', $annee, PDO::PARAM_INT);

    // Exécution de la requête
    $stmt->execute();

    // Récupération des résultats
    $filteredResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les résultats au format JSON
    header('Content-Type: application/json');
    echo json_encode($filteredResults);
}
?>