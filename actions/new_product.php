<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau produit</title>
</head>
<body>

<form action="add_product_process.php" method="POST">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" required><br>

    <label for="price">Prix :</label>
    <input type="number" name="price" id="price" required><br>

    <label for="description">Description :</label>
    <input type="text" name="description" id="description" required><br>

    <label for="platform">Platforme :</label>
    <input type="text" name="platform" id="platform" required><br>

    <label for="released_at">Date de sortie :</label>
    <input type="date" name="released_at" id="released_at" required><br>

    <label for="image">Image :</label>
    <input type="text" name="image" id="image" required><br>

    <button type="submit">Ajouter le produit</button>
</form>

</body>
</html>