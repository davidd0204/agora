<?php
    $database = "votre compte";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        if (isset($_POST['id'])) {
            $vendeurID = $_POST['id'];
            $sql = "DELETE FROM `compte client` WHERE `id` = $vendeurID";
            $result = mysqli_query($db_handle, $sql);
            if ($result) {
                echo "Vendeur supprimé avec succès";
            } else {
                echo "Une erreur s'est produite lors de la suppression du vendeur";
            }
        } else {
            echo "ID du vendeur non spécifié";
        }
    } else {
        echo "Database not found";
    }
    mysqli_close($db_handle);
?>
