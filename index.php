<?php

include 'functions.php';

include 'templates/Header.php';

if (isset($_SESSION['user_id'])) {
    // L'utilisateur est connecté, affichez un message de bienvenue et un lien de déconnexion
    $pdo = connectToDB();
    $stmt = $pdo->prepare("SELECT username FROM user WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Bienvenue, " . htmlspecialchars($user['username']) . "! <a href='actions/logout.php'>Déconnexion</a>";
    }
} else {
    // L'utilisateur n'est pas connecté, affichez les liens de connexion et d'inscription
    echo "<a href='login.php'>Se connecter</a> | <a href='register.php'>S'inscrire</a>";
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<br>
<?php // Vérifiez si l'utilisateur est connecté en vérifiant la présence de la variable de session 'user_id'
if (isset($_SESSION['user_id'])) {
    // L'utilisateur est connecté, affichez un message de bienvenue
    $pdo = connectToDB();
    $stmt = $pdo->prepare("SELECT username FROM user WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Bienvenue, " . htmlspecialchars($user['username']) . "!";
    }
} else {
    // L'utilisateur n'est pas connecté, vous pouvez afficher un message différent ou un lien de connexion
    echo "Bienvenue sur notre site. Veuillez vous connecter pour accéder à votre compte.";
}
?>
<br>
<br>
<a href=product.php>Produit</a>
<br>
<a href=cart.php>Panier</a>


</body>
</html>