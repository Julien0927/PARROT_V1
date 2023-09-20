document.addEventListener('DOMContentLoaded', () => {
/*
//Fonction qui permet de transformer les saisies (1ere lettre majuscule, le reste en minuscule)
const firstNameInput = document.getElementById('first_name');
const lastNameInput = document.getElementById('last_name');
const nameInput = document.getElementById('name');
const marqueInput = document.getElementById('marque')
const modeleInput = document.getElementById('modele')

const formatNameInput = (inputElement) => {
    const inputValue = inputElement.value.trim();
    const words = inputValue.split(' ');

const formattedWords = words.map(word => {
    return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
});
    inputElement.value = formattedWords.join(' ');
};

firstNameInput.addEventListener('blur', () => {
    formatNameInput(firstNameInput);
});

lastNameInput.addEventListener('blur', () => {
    formatNameInput(lastNameInput);
});
nameInput.addEventListener('blur', () => {
    formatNameInput(nameInput);
});
marqueInput.addEventListener('blur', () => {
    formatNameInput(marqueInput);
});
modeleInput.addEventListener('blur', () => {
    formatNameInput(modeleInput);
});

//Fonction qui permet de normaliser un numero de telephone
const phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', () => {
    let phoneNumber = phoneInput.value.replace(/\D/g, ''); // Supprime tous les caractères non numériques

    if (phoneNumber.length > 10) {
        phoneNumber = phoneNumber.slice(0, 10); // Si le numéro dépasse 10 chiffres, tronque-le à 10 chiffres
    }
    phoneInput.value = phoneNumber.replace(/(\d{2})(?=\d{2})/g, '$1 ');
});

//Fonction qui permet de gérer les erreurs de saisie d'année
const anneeInput = document.getElementById('annee');
const anneeActuelle = new Date().getFullYear();

anneeInput.addEventListener('input', () => {
    let valeur = anneeInput.value; 
    valeur = valeur.replace(/\D/g, '');

    if (valeur.length > 4) {
        valeur = valeur.slice(0, 4);
    }
    let annee = parseInt(valeur);

    if (annee > anneeActuelle) {
        annee = anneeActuelle;
    }
    anneeInput.value = annee; 
});
//Fonction qui permet de controler la saisie de prix
const prixInput = document.getElementById('prix');

prixInput.addEventListener('input', () => {
    let valPrix = prixInput.value;
    valPrix = valPrix.replace(/\D/g, ''); 

    if (valPrix.length > 6) {
        valPrix = valPrix.slice(0, 6); 
    }
    
    prixInput.value = valPrix; 
});

//Fonction qui permet de controler la saisie de kilometre
const kilometreInput = document.getElementById('kilometre');

kilometreInput.addEventListener('input', () => {
    let valPrix = kilometreInput.value;
    valKilometre = valkilometre.replace(/\D/g, ''); 

    if (valKilometre.length > 6) {
        valKilometre = valKilometre.slice(0, 6); 
    }
    
    kilometreInput.value = valKilometre; 
});


/*function refresh(){
const refreshButton = document.getElementById('refresh');

// Ajoutez un gestionnaire d'événements au clic sur le bouton
refreshButton.addEventListener('click',  (e) => {
    // Rafraîchissez la page
    location.reload();
});
}*/
//Fonction qui permet de filtrer les véhicules
const filtre = document.getElementById('filter-form');

filtre.addEventListener('submit', async (e) => {
    e.preventDefault(); // Empêche la soumission du formulaire par défaut

    const prix = document.getElementById('prix').value;
    const kilometre = document.getElementById('kilometre').value;
    const annee = document.getElementById('annee').value;

    try {
        const response = await fetch('filter.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `prix=${prix}&kilometre=${kilometre}&annee=${annee}`,
        });

        if (response.ok) {
            const data = await response.text();
            document.getElementById('results').innerHTML = data;
        } else {
            console.error('La requête a échoué avec le statut :', response.status);
        }
    } catch (error) {
        console.error('Une erreur s\'est produite :', error);
    }
});

});
