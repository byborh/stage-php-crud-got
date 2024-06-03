<?php
    require_once('./conf.php');

    if(isset($_POST['username']) && isset($_POST['password'])) {
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $reqVerif = $conn->prepare('SELECT username FROM user WHERE username = ?');
            $reqVerif->execute(Array($username));

            if($reqVerif->rowCount() == 0) {
                $req = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?);");
                $req->execute(Array($username, $password));
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header('Location: accueil.php');
            } else {
                echo "Compte existant ou doublons.";
            }
        }
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
    <h1>Game of Kingdoms</h1>
    <h3>Résumé :</h3>
    <p>
        Dans un royaume en proie aux tensions et aux conflits, chaque joueur se retrouve plongé au cœur d'une lutte de
        pouvoir sans merci.
        Game of Kingdoms est un jeu de stratégie épique où chaque décision compte et peut déterminer l'avenir de votre
        royaume.
    </p>
    <br>
    <h3>Intrigue :</h3>
    <p>
        Le royaume est gouverné par un roi impitoyable et ambitieux, dont le règne est marqué par des guerres
        incessantes et une soif insatiable de pouvoir.
        Chaque joueur incarne un seigneur, récemment établi, déterminé à bâtir un empire prospère malgré les défis
        imposés par le roi.
    </p>
    <br>
    <p>
        Vous commencez avec un petit territoire, quelques ressources et une armée modeste.
        Votre mission est simple, mais périlleuse : devez-vous jurer fidélité au roi et espérer prospérer sous sa
        protection, ou oserez-vous lever une armée pour défier son autorité et revendiquer le trône ?
    </p>
    <br>
    <p>
        Chaque heure passée est cruciale. Les ressources de votre royaume augmentent ou diminuent en fonction de vos
        décisions stratégiques.
        Vous devez gérer habilement vos ressources, renforcer vos armées et surveiller les actions du roi. Le temps est
        votre allié et votre ennemi.
    </p>
    <br>
    <p>
        Au fil de votre aventure, vous serez confronté à des dilemmes moraux et stratégiques :
        <br>
        <u>
            - Attaquer le Roi : Rassemblez vos forces, préparez vos armées et lancez une attaque audacieuse pour
            renverser
            le roi. Mais attention, une défaite pourrait signifier la ruine de votre royaume.
        </u>
        <br>
        <u>
            - Fléchir le Genou : Restez fidèle au roi, obtenez des faveurs et des ressources supplémentaires. Mais
            jusqu'à
            quand pourrez-vous supporter son joug avant de vous rebeller ?
        </u>
    </p>
    <br>
    <p>
        Les tensions montent à mesure que chaque joueur tente de se tailler une place dans ce monde impitoyable.
        Les alliances se forment et se brisent, et chaque choix fait résonner l'écho des tambours de guerre.
    </p>
    <br>
    <p>
        Game of Kingdoms est plus qu'un jeu – c'est une épopée interactive où votre intelligence, votre stratégie et
        votre bravoure seront mis à l'épreuve.
        Saurez-vous guider votre royaume vers la gloire et devenir le souverain ultime, ou succomberez-vous aux
        intrigues et aux trahisons qui se profilent à chaque coin de rue ?
    </p>
    <br>
    <p>
        Rejoignez l'aventure, prenez le contrôle de votre destinée et façonnez l'histoire de votre royaume. Le trône
        n'attend que vous.
    </p>
    <br>
    <br>
    <br>
    <br>
    <a href="carte.php">Commencez votre quête pour le pouvoir suprême !</a>

    <br>
    <br>
    <br>
    <br>
    <br>

    <form method="post">
        <h2>Inscrivez vous :</h2>
        <input type="text" name="username" placeholder="Saisir votre pseudo"
            value="<?php if(isset($_POST["username"])) {echo $_POST["username"];}?>">
        <input type="password" name="password" placeholder="Saisir votre mot de passe"
            value="<?php if(isset($_POST["password"])) {echo $_POST["password"];}?>">
        <input type="submit" name="Valider">
        <a href="connexion.php">Avez vous déjà un compte ?</a>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>

</html>