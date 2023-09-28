<?php
session_start();

$_SESSION=[];
// Détruit la session actuelle
session_destroy();

// Redirigez l'utilisateur vers la page d'accueil ou une autre page après la déconnexion
header("Location: ../index.php"); // Vous pouvez ajuster l'URL de redirection si nécessaire
exit();
?>
