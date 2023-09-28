<?php

include '../functions.php';

// Vérifier s'il y a un paramètre "article" dans l'URL
if (isset($_GET['id'])) {
deleteArticle($_GET['id']);
}


header('Location: ../product.php');

?>