<?php
    $id = $_POST['id'];
    $password = $_POST['password'];
    echo '<script src="js/script-user.js"></script>';
    if ($id == 'root' && $password == 'passwd') {
        //echo '<script>defineUser("Armand","Lelaizant")</script>';
        echo '<script>window.location.replace("accueil.html")</script>';
    }else {
        echo '<script>alert("Identifiant ou mot de passe incorrecte"); window.location.replace("/")</script>';        
    }
?>