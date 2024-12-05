document.getElementById("form").addEventListener("submit", function (event) {
    // Empêche l'envoi du formulaire pour effectuer les validations
    event.preventDefault();

    // Récupérer les éléments du formulaire
    const name = document.getElementById("name");
    const prenom = document.getElementById("prenom");
    const email = document.getElementById("email");
    const comment = document.getElementById("comment");

    // Messages d'erreur
    let errors = [];

    // Vérification du nom
    if (name.value.trim().length < 2) {
        errors.push("Le nom doit contenir au moins 2 caractères.");
        name.classList.add("is-invalid");
    } else {
        name.classList.remove("is-invalid");
        name.classList.add("is-valid");
    }

    // Vérification du prénom
    if (prenom.value.trim().length < 2) {
        errors.push("Le prénom doit contenir au moins 2 caractères.");
        prenom.classList.add("is-invalid");
    } else {
        prenom.classList.remove("is-invalid");
        prenom.classList.add("is-valid");
    }

    // Vérification de l'email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value.trim())) {
        errors.push("Veuillez saisir une adresse email valide.");
        email.classList.add("is-invalid");
    } else {
        email.classList.remove("is-invalid");
        email.classList.add("is-valid");
    }

    // Vérification du commentaire
    if (comment.value.trim().length === 0) {
        errors.push("Le champ de message ne peut pas être vide.");
        comment.classList.add("is-invalid");
    } else {
        comment.classList.remove("is-invalid");
        comment.classList.add("is-valid");
    }

    // Si des erreurs existent, affichez-les et arrêtez l'envoi
    if (errors.length > 0) {
        alert(errors.join("\n"));
    } else {
        // Si tout est valide, soumet le formulaire
        alert("Formulaire envoyé avec succès !");
        event.target.submit();
    }
});
