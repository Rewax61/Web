<?php
session_start();
if (! isset($_SESSION['token']) || $_SESSION['token'] != 'nqT0jUvr6RAQImzd5Vm607TB8HN9ob2RSojK') {
    header('Location: /');
    exit();
}else {
    $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-accueil.css">
    <title>Accueil</title>
</head>
<body>
    <h1 id="titre">Bienvenu <?php echo $user; ?></h1>
    <?php if ($user == 'root'):?>
        <form action="newUser.php" method="post">
            <input type="text" value="" name="loginUser" placeholder="Indentifiant de l'utilisateur" autocomplete="off">
            <input type="password" value="" name="passwordUser" placeholder="Mot de passe de l'utilisateur" autocomplete="off">
            <input type="submit" value="Créer un nouvel utilisateur">
        </form>
    <?php endif;?>
    
</body>
</html>