<?php
require_once('conf.php');

if(!$_SESSION['idUsername']) {
    header('Location: accueil.php');
}

echo $_SESSION['idUsername'] . "<br>";
echo $_SESSION['name'] . "<br>";
echo $_SESSION['numberArmy'] . "<br>";
echo $_SESSION['numberResource'] . "<br>";
if($_SESSION['attack'] == 1) {
    echo 'attaquer <br>';
} else {
    echo 'rester amis <br>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game of Kingdoms</title>
</head>

<body>
    <a href="accueil.php">Revenir à l'accueil</a>
    <a href="modifierKingdom.php">Modifier mon royaume</a>
    <a href="suppressionKingdom.php">Détruire mon royaume</a>
</body>

</html>