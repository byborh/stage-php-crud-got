<?php
session_start();
require_once('./conf.php');

if (isset($_SESSION['username'])) {
    $idUsername = $_SESSION['idUsername'];

    try {
        $req = $conn->prepare("DELETE FROM kingdom WHERE idUsername = ?");
        $req->execute([$idUsername]);

        $_SESSION = array();
        $_SESSION["username"] = $idUsername;


        // session_destroy();

        header('Location: accueil.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    header('Location: accueil.php');
    exit();
}