<?php
$database = "parcourir";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    if (isset($_POST['id'])) {
        $articleID = $_POST['id'];
        

        $sql_reg = "DELETE FROM articles_reg WHERE ID = $articleID";
        $result_reg = mysqli_query($db_handle, $sql_reg);

        $sql_hdg = "DELETE FROM articles_hdg WHERE ID = $articleID";
        $result_hdg = mysqli_query($db_handle, $sql_hdg);

        $sql_rare = "DELETE FROM articles_rare WHERE ID = $articleID";
        $result_rare = mysqli_query($db_handle, $sql_rare);

        if ($result_reg || $result_hdg || $result_rare) {
            echo "Article supprimé avec succès";
        } else {
            echo "Une erreur s'est produite lors de la suppression de l'article";
        }
    } else {
        echo "ID de l'article non spécifié";
    }
} else {
    echo "Database not found";
}

mysqli_close($db_handle);
?>
