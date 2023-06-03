<?php
    $database = "votre compte"; 
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_handle) {
        $vendeurId = isset($_POST["vendeurId"]) ? $_POST["vendeurId"] : "";

        // Supprimer le vendeur de la base de données
        $sql = "DELETE FROM `compte client` WHERE `Type` = 1 AND `ID` = '$vendeurId'";
        if (mysqli_query($db_handle, $sql)) {
            echo "Le vendeur a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du vendeur.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($db_handle);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
?>
