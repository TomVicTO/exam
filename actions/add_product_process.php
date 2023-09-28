<?php

require_once '../functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST["title"]);
    $price = htmlspecialchars($_POST["price"]);
    $description = htmlspecialchars($_POST["description"]);
    $platform = htmlspecialchars($_POST["platform"]);
    $image = htmlspecialchars($_POST["image"]);
    $released_at = htmlspecialchars($_POST["released_at"]);

    $pdo = connectToDB();
    $query = "INSERT INTO product (title, price, description, platform, image, released_at)
VALUES (:title, :price, :description, :platform, :image, :released_at)";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":platform", $platform);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":released_at", $released_at);

    $stmt->execute();


    header("Location: ../product.php");
    exit();
}
?>