<?php
$database = "votre compte"; // Remplacez "votre_base_de_donnees" par le nom de votre base de données
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$Prénom = isset($_POST["Prénom"]) ? $_POST["Prénom"] : "";
$Adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
$Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$Password1 = isset($_POST["Password1"]) ? $_POST["Password1"] : "";
$Password2 = isset($_POST["Password2"]) ? $_POST["Password2"] : "";
$erreur = "";

if ($Nom == "") {
    $erreur .= "Le champ Nom est vide. <br>";
}
if ($Prénom == "") {
    $erreur .= "Le champ Prénom est vide. <br>";
}
if ($Adresse == "") {
    $erreur .= "Le champ Adresse est vide. <br>";
}
if ($Email == "") {
    $erreur .= "Le champ Email est vide. <br>";
}
if ($Password1 == "" || $Password2 == "") {
    $erreur .= "Le champ Password est vide. <br>";
} elseif ($Password1 != $Password2) {
    $erreur .= "Ce n'est pas le même mot de passe. <br>";
}

if ($erreur == "") {
    if ($db_found) {
        // Échapper les caractères spéciaux pour éviter les injections SQL
        $Nom = mysqli_real_escape_string($db_handle, $Nom);
        $Prénom = mysqli_real_escape_string($db_handle, $Prénom);
        $Adresse = mysqli_real_escape_string($db_handle, $Adresse);
        $Email = mysqli_real_escape_string($db_handle, $Email);
        $Password1 = mysqli_real_escape_string($db_handle, $Password1);
        $Password2 = mysqli_real_escape_string($db_handle, $Password2);

        // Vérifier si l'adresse e-mail existe déjà
        $existingEmailQuery = "SELECT * FROM `compte client` WHERE `Email` = '$Email'";
        $existingEmailResult = mysqli_query($db_handle, $existingEmailQuery);

        if (mysqli_num_rows($existingEmailResult) > 0) {
            echo "L'adresse e-mail est déjà utilisée. Veuillez en choisir une autre.";
        } else {
            // Insérer les données dans la base de données
            $sql = "INSERT INTO `compte client`(`Nom`, `Prénom`, `Adresse`, `Email`, `Password1`, `Password2`) VALUES ('$Nom', '$Prénom', '$Adresse', '$Email', '$Password1', '$Password2')";

            // Exécuter la requête d'insertion
            if (mysqli_query($db_handle, $sql)) {
                echo "Données enregistrées avec succès dans la base de données.";
            } else {
                echo "Erreur lors de l'enregistrement des données : " . mysqli_error($db_handle);
            }
        }

        // Fermer la connexion à la base de données
        mysqli_close($db_handle);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
} else {
    echo "Erreur: <br>" . $erreur;
}
?>
