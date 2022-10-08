var user = JSON.parse(localStorage.getItem('user'));
document.getElementById('titre').innerHTML += " " + user.prenom + " " + user.nom;