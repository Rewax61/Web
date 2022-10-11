<?php
    $id = $_POST['id'];
    $password = $_POST['password'];
    echo '<script src="js/script-user.js"></script>';
    if ($id == 'root' && $password == 'passwd') {
        //Encryptage token
        $token = 'nqT0jUvr6RAQImzd5Vm607TB8HN9ob2RSojK';
        setcookie('token', $token, time()+10, '/', '', true, true); //Création du cookie
        header('Location: accueil.php');
        exit();
    }else {
        echo '<script>alert("Identifiant ou mot de passe incorrecte"); window.location.replace("/")</script>';        
    }
?>