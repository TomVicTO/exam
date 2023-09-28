<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
</head>
<body>
<h2>Ajouter un utilisateur</h2>
<form action="actions/add_user_process.php" method="POST">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" required><br><br>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required><br><br>

    <!-- Ajoutez d'autres champs du formulaire (nom, prénom, etc.) si nécessaire -->

    <button type="submit">Ajouter l'utilisateur</button>
</form>
</body>
</html>
