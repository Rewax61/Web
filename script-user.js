function defineUser(prenom, nom) {
    const user = {
        nom: nom,
        prenom: prenom
    }
    localStorage.setItem('user', JSON.stringify(user));
}