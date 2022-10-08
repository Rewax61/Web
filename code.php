<?php
    $id = $_POST['id'];
    $password = $_POST['password'];
    echo '<script src="script-user.js"></script>';
    if ($id == 'armand.llz' && $password == 'motdepasse') {
        echo '<script>defineUser("Armand","Lelaizant")</script>';
        echo '<script>window.location.replace("accueil.html")</script>';
    }elseif ($id == 'titi' && $password == 'salut') {
        echo '<script>defineUser("Tristan","Lelaizant")</script>';
        echo '<script>window.location.replace("accueil.html")</script>';
    }else {
        echo '<script>alert("Identifiant ou mot de passe incorrecte"); window.location.replace("/")</script>';        
    }
?>