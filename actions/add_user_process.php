<?php

include '../functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifiez si le nom d'utilisateur est déjà pris
    if (isUsernameTaken($username)) {
        echo "Ce nom d'utilisateur est déjà pris. Veuillez en choisir un autre.";
    } else {
        // Hash du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insérez le nouvel utilisateur dans la table "user"
        $pdo = connectToDB();
        $query = "INSERT INTO user (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->execute();

        echo "Utilisateur ajouté avec succès.";

        // Attendez 3 secondes (ou le nombre de secondes souhaité)

    }
}
sleep(3);

// Redirigez vers la page index.php
header("Location: ../login.php");
exit();
?>
