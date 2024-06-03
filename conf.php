<?php

// lancer la session au chargement de la page
session_start();

// déclarer les variables avant de se connecter dans la base de donnée
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=got", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo "Une erreur s'est produite, la voici : " . $err->getMessage();
    exit();
}