function filterCars(event) {
    event.preventDefault(); // Empêche la soumission du formulaire par défaut

    // Récupérez les valeurs des champs de filtrage
    const prix = $('#prix').val();
    const kilometre = $('#kilometre').val();
    const annee = $('#annee').val();

    // Utilisez AJAX pour envoyer une requête au serveur
    $.ajax({
        url: 'lib/filter.php', // L'URL de votre script PHP
        method: 'POST',
        data: {
            prix: prix,
            kilometre: kilometre,
            annee: annee
        }, // Les données à envoyer au serveur (ici, les filtres)
        success: function (response) {
            // Mettez à jour la section de résultats avec les données renvoyées par le serveur
            $('#results').html(response);
        }
    });
}
