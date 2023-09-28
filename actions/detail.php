<?php

include 'templates/Header.php';

require_once '../functions.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$detail = getProductById($id);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du Produit</title>
</head>
<body>
<?php if ($detail): ?>
    <h1><?= $detail['title'] ?></h1>
    <p>Description : <?= $detail['description'] ?></p>
    <p>Platforme : <?= $detail['platform'] ?></p>
    <p>Date de sortie : <?= $detail['released_at'] ?></p>
    <p>Prix : <?= $detail['price'] ?></p>
<br>
    <a href="../product.php?>">Retour</a>
<?php endif; ?>
</body>
</html>