<?php

require_once '../templates/Header.php';
require_once '../functions.php';


// Vérifie si un article doit être ajouté au panier
if(isset($_GET['produit_id'])) {

    $articleId = $_GET['produit_id'];

    // Obtient les détails de l'article à partir de votre base de données
    $article = getProductById($articleId);

    if (!$article) {
        // L'article n'existe pas, redirigez vers la page du panier ou affichez un message d'erreur
        header('Location: ../cart.php');
        exit;
    } else {
        // Initialisez le panier s'il n'existe pas encore dans la session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Vérifie si l'article est déjà dans le panier
        $itemIndex = -1;
        foreach ($_SESSION['cart'] as $index => $cartItem) {
            if ($cartItem['id'] == $articleId) {
                $itemIndex = $index;
                break;
            }
        }

        if ($itemIndex !== -1) {
            // L'article est déjà dans le panier, augmentez la quantité
            $_SESSION['cart'][$itemIndex]['quantity'] += $_GET['quantity'];
        } else {
            // Ajoutez l'article au panier avec une quantité initiale de 1
            $_SESSION['cart'][$articleId] = [
                'title' => $article['title'],
                'desc' => $article['description'],
                'price' => $article['price'],
                'platform' => $article['platform'],
                'released_at' => $article['released_at'],
                'image' => $article['image'],
                'quantity' => $_GET['quantite']
            ];
        }

        // Redirigez vers la page du panier
        header('Location: ../cart.php');
        exit();
    }
}