<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=connexion;charset=utf8', 'admin', 'llz2703');

    $login = $_POST['login'];
    $password = $_POST['password'];

    $table_user_statements = $db->prepare('SELECT * from users WHERE login = :login AND password = :password');
    $table_user_statements->bindValue('login', $login);
    $table_user_statements->bindValue('password', hash('sha256', $password));
    $table_user_statements->execute();
    $res = $table_user_statements->fetch(PDO::FETCH_ASSOC);

    $authorized = false;
    if ($res) {
        echo 'Connexion réussi';
        $authorized = true;
    }else {
        echo "Identifiants invalides";
    }
    

    if ($authorized == true) {
        //Encryptage token
        $token = 'nqT0jUvr6RAQImzd5Vm607TB8HN9ob2RSojK';
        $_SESSION['token'] = $token;
        $_SESSION['user'] = $login;
        header('Location: accueil.php');
        exit();
    }else {
        echo '<script>alert("Identifiant ou mot de passe incorrecte"); window.location.replace("/")</script>';        
    }
?>