<?php
    $db = new PDO('mysql:host=localhost;dbname=connexion;charset=utf8', 'admin', 'llz2703'); //Connexion

    $loginUser = $_POST['loginUser'];
    $passwordUser = $_POST['passwordUser'];

    if (strlen($passwordUser) < 5) {
        echo '<script>alert("Mot de passe trop court ! Veuillez choisir un mot de passe d\'au moins 5 caractères")</script>';
        $token = 'nqT0jUvr6RAQImzd5Vm607TB8HN9ob2RSojK';
        setcookie('user','root', time()+10,'/','',true, true); //Création du cookie user
        setcookie('token', $token, time()+10, '/', '', true, true); //Création du cookie token
        header('Location: accueil.php');
        exit();
    }else {
        $q = $db->prepare('SELECT login FROM users WHERE login = :login');
        $q->bindValue('login', $loginUser);
        $q->execute();
        $res = $q->fetch(PDO::FETCH_ASSOC);
    
        if ($res) {
            echo '<script>alert("Identifiant déjà existant")</script>';
            $token = 'nqT0jUvr6RAQImzd5Vm607TB8HN9ob2RSojK';
            setcookie('user','root', time()+10,'/','',true, true); //Création du cookie user
            setcookie('token', $token, time()+10, '/', '', true, true); //Création du cookie token
            header('Location: accueil.php');
            exit();
        }else {
            $q = $db->prepare('INSERT INTO users (login,password)values(:login,:password)');
            $q->bindValue('login', $loginUser);
            $q->bindValue('password', hash('sha256', $passwordUser));
            $q->execute();
            echo '<script>alert("Utilisateur créé avec succès")</script>';
            $token = 'nqT0jUvr6RAQImzd5Vm607TB8HN9ob2RSojK';
            setcookie('user','root', time()+10,'/','',true, true); //Création du cookie user
            setcookie('token', $token, time()+10, '/', '', true, true); //Création du cookie token
            header('Location: accueil.php');
            exit();
        }
    }  
?>