<?php
$token = $_COOKIE['token'];
if ($token != 'nqT0jUvr6RAQImzd5Vm607TB8HN9ob2RSojK') {
    header('Location: /');
    exit();
}else {
    setcookie('token');
    unset($_COOKIE['token']);
}
$user = $_COOKIE['user'];
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
    
</body>
</html>