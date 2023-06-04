<?php

if (isset($_GET["article"])) {
    $ID = $_GET["article"];


    $database = "parcourir";
    $db_handle = mysqli_connect('localhost', 'root', '', 'parcourir');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {

        $sql = "DELETE FROM articles_hdg WHERE ID = '$ID'";
        $result = mysqli_query($db_handle, $sql);

        if ($result) {
            echo "Article ajouté au panier avec succés.";
        } else {
            echo "Une erreur s'est produite lors de la suppression de l'article.";
        }

        mysqli_close($db_handle);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
} else {
    echo "ID d'article manquant.";
}
?>
