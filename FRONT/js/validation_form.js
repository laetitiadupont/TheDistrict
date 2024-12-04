const form = document.getElementById('myForm');
// On récupère la valeur du champ input name
const nameInput = document.getElementById('name');
// On récupère la valeur du champ input prenom
const prenomInput = document.getElementById('prenom');
// On récupère la valeur du champ input email
const emailInput = document.getElementById('email');

// Lancement de la validation 
form.addEventListener('submit', function(event) {
    let errors = [];
    
    alert(nameInput.value.trim());

    // Si le champ "name" est vide
    if (nameInput.value.trim() === '') {
        // On ajoute une erreur à la constante errors
        errors.push('Veuillez saisir votre nom.');
    } else if (nameInput.value.trim().length < 4) {
        // Le nom doit avoir au minimum 3 caractères
        errors.push('Le nom doit contenir au moins 3 caractères.');
    } 
    
    // Si le champ "prenom" est vide
    if (prenomInput.value.trim() === '') {
        // On ajoute une erreur à la constante errors
        errors.push('Veuillez saisir votre nom.');
    } else if (prenomInput.value.trim().length < 4) {
        // Le nom doit avoir au minimum 3 caractères
        errors.push('Le nom doit contenir au moins 3 caractères.');
    } 

    // Validité de l'adresse mail
    if (emailInput.value.trim() === '') {
        // Si le champ est vide
        errors.push('Veuillez saisir votre email.');
    } else if (!isValidEmail(emailInput.value)) {
        // Si l'adresse n'est pas valide
        errors.push('Veuillez saisir une adresse email valide.');
    }
    
    // Gestions des erreurs
    if (errors.length > 0) {
        // On empeche l'envoi du formulaire
        event.preventDefault();
        // On appelle la fonction pour afficher les erreurs
        displayErrors(errors);
    }

});

// Fonction de validation de l'email
function isValidEmail(email) {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
}
    
// Fonction d'affichage des erreurs
function displayErrors(errors) {
    // On récupère la liste des erreurs si elle existe
    const elementsError = document.querySelectorAll('.error');
    elementsError.forEach(element => {
        element.remove();
    });
    
    
    // On créé une balise div
    const errorContainer = document.createElement('div');
    // On lui ajoute la classe .error
    errorContainer.classList.add('error');

    // On fait une boucle pour afficher toutes les erreurs
    errors.forEach(function(error) {
        // On créé un élément paragraphe p
        // à chaque tour de boucle, donc pour chaque erreur
        const errorMessage = document.createElement('p');
        errorMessage.textContent = error;
        errorContainer.appendChild(errorMessage);
    });

    // On affiche les erreurs à la fin du formulaire 
    form.appendChild(errorContainer);
}