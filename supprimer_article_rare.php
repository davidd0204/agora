
<?php
// Vérification si l'ID de l'article a été fourni
if (isset($_GET["article"])) {
    $ID = $_GET["article"];

    // Connexion à la base de données
    $database = "parcourir";
    $db_handle = mysqli_connect('localhost', 'root', '', 'parcourir');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        // Suppression de l'article de la base de données
        $sql = "DELETE FROM articles_rare WHERE ID = '$ID'";
        $result = mysqli_query($db_handle, $sql);

        if ($result) {
            echo "Article ajouté au panier avec succés.";
        } else {
            echo "Une erreur s'est produite lors de la suppression de l'article.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($db_handle);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
} else {
    echo "ID d'article manquant.";
}
?>
