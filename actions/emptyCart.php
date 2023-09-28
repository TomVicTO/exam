<?php
session_start();

$_SESSION = [];

session_destroy();

header("Location: ../index.php"); // Vous pouvez ajuster l'URL de redirection si nécessaire
exit();
?>
