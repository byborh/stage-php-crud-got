<?php
require_once('./conf.php');
$idUsername = $_SESSION['idUsername'];

if(isset($_POST['name']) || isset($_POST['numberArmy']) || isset($_POST['numberResource']) || isset($_POST['attack'])) {
    if(!empty($_POST['name'])) {
        $modifiName = $_POST['name'];
    } else {
        $modifiName = $_SESSION['name'];
    }

    if(!empty($_POST['numberArmy'])) {
        $modifNumberArmy = $_POST['numberArmy'];
    } else {
        $modifNumberArmy = $_SESSION['numberArmy'];
    }

    if(!empty($_POST['numberResource'])) {
        $modifNumberResource = $_POST['numberResource'];
    } else {
        $modifNumberResource = $_SESSION['numberResource'];
    }

    if(!empty($_POST['attack'])) {
        if($_POST['attack'] == "oui") {
            $modifAttack = 1;
        } else {
            $modifAttack = 0;
        }
    } else {
        $modifAttack = $_SESSION['attack'];
    }


    $req = $conn->prepare('UPDATE kingdom SET name=?, numberArmy=?, numberResource=?, attack=? WHERE idUsername = ?');
    $req->execute(Array($modifiName, $modifNumberArmy, $modifNumberResource, $modifAttack, $idUsername));

    $_SESSION['name'] = $modifiName;
    $_SESSION['numberArmy'] = $modifNumberArmy;
    $_SESSION['numberResource'] = $modifNumberResource;
    $_SESSION['attack'] = $modifAttack;

    echo "Le royaume est bien mise à jour !";

    //     echo "Vous n'avez effectué de modification de votre royaume";



}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    input {
        min-width: 300px;
    }
    </style>
    <title>Game of Kingdoms</title>
</head>

<body>
    <a href="carte.php">Revenir dans mon royaume</a>

    <form method="post">
        <h2>Modifier mon <u><?php echo $_SESSION['name']; ?></u> :</h2>
        <input type="text" name="name" placeholder="<?php echo $_SESSION['name'] ?>"
            value="<?php if(isset($_POST["name"])) {echo $_POST["name"];}?>">
        <input type="text" name="numberArmy" placeholder="<?php echo $_SESSION['numberArmy'] ?>"
            value="<?php if(isset($_POST["numberArmy"])) {echo $_POST["numberArmy"];}?>">
        <input type="text" name="numberResource" placeholder="<?php echo $_SESSION['numberResource'] ?>"
            value="<?php if(isset($_POST["numberResource"])) {echo $_POST["numberResource"];}?>">
        <input type="text" name="attack"
            placeholder="Voulez vous toujours <?php if($_SESSION['attack'] == 'oui') {echo "attaquer";} else {echo 'rester ami';} ?> le roi ?"
            value="<?php if(isset($_POST["attack"])) {echo $_POST["attack"];}?>">
        <input type="submit" name="Valider">
    </form>
</body>

</html>