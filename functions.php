<?php

require_once 'templates/Header.php';

function connectToDB(): ?PDO
{
    try {
        $host = "localhost";
        $dbname = "magasin";
        $username = "root";
        $pass = "";
        // Connexion à la base de données MySQL
        $pdo = new PDO(
            "mysql:host=$host;port=3306;dbname=$dbname",
            $username,
            $pass
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;

    } catch (PDOException $e) {
        // En cas d'erreur de connexion ou d'exécution de requête
        echo "Erreur : " . $e->getMessage();
        return null;
    }
}

function fetchAllProduct(): array {
    $pdo = connectToDB();

    $query = "SELECT * FROM product";
    $stmt = $pdo->query($query);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductById($id) {
    $pdo = connectToDB();

    // Utilisez une requête préparée pour éviter les injections SQL
    $query = "SELECT * FROM product WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteArticle($id)
{
    $pdo = connectToDB();
    $stmt = $pdo->prepare("DELETE FROM product WHERE id = :id");

    // Liez la valeur de l'ID de l'article au paramètre de liaison
    $stmt->bindParam(':id', $id);

    // Exécutez la requête
    $stmt->execute();

}

function isUsernameTaken($username) {
    $pdo = connectToDB();

    $query = "SELECT COUNT(*) FROM user WHERE username = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username]);

    return $stmt->fetchColumn() > 0;
}

function fetchProduct(int $id): array
{
    $sql = "SELECT * FROM product WHERE id = :id";
    $pdo = connectToDB();
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}