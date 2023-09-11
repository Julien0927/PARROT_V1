document.getElementById('filter-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Empêche la soumission du formulaire par défaut

    const prix = document.getElementById('prix').value;
    const kilometre = document.getElementById('kilometre').value;
    const annee = document.getElementById('annee').value;

    const xhr = new XMLHttpRequest();

    // Spécifiez la méthode et l'URL du script PHP de traitement côté serveur.
    xhr.open('POST', 'filter.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Configurez la fonction de rappel pour gérer la réponse AJAX.
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Mettez à jour le contenu de la division "results" avec les données filtrées.
            document.getElementById('results').innerHTML = xhr.responseText;
        }
    };

    // Envoyez la requête AJAX avec les données du formulaire.
    xhr.send(`prix=${prix}&kilometre=${kilometre}&annee=${annee}`);
});

