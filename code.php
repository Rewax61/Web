<?php
    $id = $_POST['id'];
    $password = $_POST['password'];
    if ($id == 'armand.llz' || $password == 'motdepasse') {
        echo '<script>window.location.replace("page2.html")</script>';
    }else {
        echo '<script>alert("Identifiant ou mot de passe incorrecte"); window.location.replace("/")</script>';        
    }
?>