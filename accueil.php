<?php
    require_once('./conf.php');


    if(!$_SESSION['username']) {
        header('Location: index.php');
    }    

    // name
    // numberArmy
    // numberResource
    // attack
    
    if(isset($_POST['name']) && isset($_POST['numberArmy']) && isset($_POST['numberResource']) && isset($_POST['attack'])) {
        if(!empty($_POST['name']) && !empty($_POST['numberArmy']) && !empty($_POST['numberResource']) && !empty($_POST['attack'])) {
            $idUsername = $_SESSION['username'];
            $name = $_POST['name'];
            $numberArmy = $_POST['numberArmy'];
            $numberResource = $_POST['numberResource'];
            if($_POST['attack'] == "oui") {
                $attack = 1;
            } else {
                $attack = 0;
            }

            $reqVerif = $conn->prepare('SELECT idUsername FROM kingdom WHERE idUsername = ?');
            $reqVerif->execute(Array($idUsername));

            if($reqVerif->rowCount() == 0) {
                $req = $conn->prepare('INSERT INTO kingdom (idUsername, name, numberArmy, numberResource, attack) VALUES (?, ?, ?, ?, ?);');
                $req->execute(Array($idUsername, $name, $numberArmy, $numberResource, $attack));

                $_SESSION['idUsername'] = $idUsername;
                $_SESSION['name'] = $name;
                $_SESSION['numberArmy'] = $numberArmy;
                $_SESSION['numberResource'] = $numberResource;
                $_SESSION['attack'] = $attack;
                header('Location: carte.php');
            } else {
                echo "Vous avez déjà un royaume";
                header('Location: carte.php');
            }

        }
    }
    
    echo '<br>';
    echo $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game of Kingdoms</title>
    <style>
    input {
        width: 300px;
    }
    </style>
</head>

<body>
    <form method="post">
        <h2>Créer un royaume :</h2>
        <input type="text" name="name" placeholder="Saisir le nom de votre royaume"
            value="<?php if(isset($_POST["name"])) {echo $_POST["name"];}?>">
        <input type="text" name="numberArmy" placeholder="Saisir le nombre d'armée de votre royaume"
            value="<?php if(isset($_POST["numberArmy"])) {echo $_POST["numberArmy"];}?>">
        <input type="text" name="numberResource" placeholder="Saisir le nombre de ressources de votre royaume"
            value="<?php if(isset($_POST["numberResource"])) {echo $_POST["numberResource"];}?>">
        <input type="text" name="attack" placeholder="Voulez vous attaquer et usurper le roi ?"
            value="<?php if(isset($_POST["attack"])) {echo $_POST["attack"];}?>">
        <input type="submit" name="Valider">
        <a href="carte.php">Avez-vous déjà un royaume ?</a>
    </form>

    <br><br><br><br><br><br>

    <a href="deconnexion.php">Se déconnecter</a>
    <a href="suppression.php">Supprimer mon compte</a>
</body>

</html>