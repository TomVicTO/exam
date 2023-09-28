<?php

include 'templates/Header.php';

require_once 'functions.php';

$produits = fetchAllProduct();

// Vérifiez si l'utilisateur est un administrateur (isAdmin = 1)
$pdo = connectToDB();
$stmt = $pdo->prepare("SELECT isAdmin FROM user WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produits</title>
</head>
<body>
<?php if ($user && $user['isAdmin'] == 1) : ?>
<a href="/actions/new_product.php">Nouveau produit</a>
<?php endif; ?>

<h1>Articles : </h1>

<?php foreach ($produits as $produit):
    $detail = [
        $produit['id']
    ];
    ?>
    <h2><?= $produit['title'] ?></h2>
    <p><?= $produit['price'] ?></p>
    <a href="/actions/detail.php?id=<?= $produit['id'] ?>">Détail</a>

    <!-- Ajoutez un formulaire pour ajouter au panier -->
    <form method="get" action="actions/add_to_cart.php">

        <input type="hidden" name="produit_id" value="<?= $produit['id'] ?>">
        <label for="quantite">Quantité:</label>

        <input type="number" name="quantite" required>
        <button type="submit" name="ajouter">Ajouter au Panier</button>

    </form>

<?php if ($user && $user['isAdmin'] == 1) : ?>
    <a href="actions/delete_product.php?id=<?= $produit['id'] ?>">Supprimer</a>
<?php endif; ?>
<?php endforeach; ?>

</body>
</html>