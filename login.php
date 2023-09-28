<?php

include 'functions.php';

include 'templates/Header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Effectuez la validation des données d'authentification en vérifiant la table "user".
    $pdo = connectToDB();
    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Authentification réussie
        $_SESSION['user_id'] = $user['id'];

        // Redirigez l'utilisateur vers la page de destination après la connexion
        header("Location: index.php");
        exit();
    } else {
        // Authentification échouée
        $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
<h2>Connexion</h2>
<?php if (isset($error_message)) : ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>
<form action="login.php" method="POST">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" required><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Se connecter</button>
</form>
</body>
</html>
