<?php
    $db = new PDO('mysql:host=localhost;dbname=connexion;charset=utf8', 'admin', 'llz2703');

    $login = $_POST['login'];
    $password = $_POST['password'];
    
    /*$passwordHash = hash('sha256', $password);
    $q = $db->prepare('UPDATE users set password=:password WHERE login=:login');
    $q->bindValue('login', $login);
    $q->bindValue('password', $passwordHash);
    $q->execute();
    echo 'ok';*/

    $table_user_statements = $db->prepare('SELECT * from users WHERE login = :login AND password = :password');
    $table_user_statements->bindValue('login', $login);
    $table_user_statements->bindValue('password', hash('sha256', $password));
    $table_user_statements->execute();
    $res = $table_user_statements->fetch(PDO::FETCH_ASSOC);

    $authorized = false;
    if ($res) {
        if (password_verify($password, $res['password'])) {
            echo "Connexion réussi";
        }else{
            echo "Identifiants invalide";
        }
    }else {
        echo "Identifiants invalides";
    }
    

    if ($authorized == true) {
        //Encryptage token
        $token = 'nqT0jUvr6RAQImzd5Vm607TB8HN9ob2RSojK';
        setcookie('user',$login, time()+10,'/','',true, true); //Création du cookie user
        setcookie('token', $token, time()+10, '/', '', true, true); //Création du cookie token
        header('Location: accueil.php');
        exit();
    }else {
        echo '<script>alert("Identifiant ou mot de passe incorrecte"); window.location.replace("/")</script>';        
    }
?>