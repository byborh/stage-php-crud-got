<?php
session_start();
require_once('./conf.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    try {
        $req = $conn->prepare("DELETE FROM user WHERE username = ?");
        $req->execute([$username]);

        $_SESSION = array();


        session_destroy();

        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    header('Location: index.php');
    exit();
}