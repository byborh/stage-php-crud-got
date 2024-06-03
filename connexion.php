<?php
    require_once('conf.php');
    
    if(isset($_POST["username"]) && isset($_POST["password"])) {
        if(!empty($_POST["username"]) && !empty($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $req = $conn->prepare("SELECT username, password FROM user WHERE username = ? AND password = ?");
            $req->execute(Array($username, $password));

            if( $req->rowCount() == 1) {
                $_SESSION['username'] = $username;
                header("Location: carte.php");
            } else {
                echo "Cet utilisateur est non existant";
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
    <form method="post">
        <h2>Connectez vous :</h2>
        <input type="text" name="username" placeholder="Saisir votre pseudo"
            value="<?php if(isset($_POST["username"])) {echo $_POST["username"];}?>">
        <input type="password" name="password" placeholder="Saisir votre mot de passe"
            value="<?php if(isset($_POST["username"])) {echo $_POST["username"];}?>">
        <input type="submit" name="Valider">
        <?php if (isset($message)) { echo '<font color="red">'.$message.'</font>';} ?>
    </form>
</body>

</html>