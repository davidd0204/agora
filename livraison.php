<?php
$database = "votre compte";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$Prénom = isset($_POST["Prénom"]) ? $_POST["Prénom"] : "";
$Adresse1 = isset($_POST["Adresse ligne 1"]) ? $_POST["Adresse ligne 1"] : "";
$Adresse2 = isset($_POST["Adresse ligne 2"]) ? $_POST["Adresse ligne 2"] : "";
$Ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";
$CodeP = isset($_POST["Code postale"]) ? $_POST["Code postale"] : "";
$Pays = isset($_POST["Pays"]) ? $_POST["Pays"] : "";
$NumClient = isset($_POST["Numéro de téléphone du client"]) ? $_POST["Numéro de téléphone du client"] : "";
$erreur = "";

if ($Nom == "") {
    $erreur .= "Le champ Nom est vide. <br>";
}
if ($Prénom == "") {
    $erreur .= "Le champ Prénom est vide. <br>";
}
if ($Adresse1 == "") {
    $erreur .= "Le champ Adresse ligne 1 est vide. <br>";
}
if ($Adresse2 == "") {
    $erreur .= "Le champ Adresse ligne 2 est vide. <br>";
}
if ($Ville == "") {
    $erreur .= "Le champ Ville est vide. <br>";
}
if ($CodeP == "") {
    $erreur .= "Le champ Code postal est vide. <br>";
}
if ($Pays == "") {
    $erreur .= "Le champ Pays est vide. <br>";
}
if ($NumClient == "") {
    $erreur .= "Le champ Numéro de téléphone du client est vide. <br>";
}
if ($erreur == "") {
    echo "Formulaire valide.";
} else {
    echo "Erreur: <br>" . $erreur;
}

if ($db_found) {
    // Échapper les caractères spéciaux pour éviter les injections SQL
    $Nom = mysqli_real_escape_string($db_handle, $Nom);
    $Prénom = mysqli_real_escape_string($db_handle, $Prénom);
    $Adresse1 = mysqli_real_escape_string($db_handle, $Adresse1);
    $Adresse2 = mysqli_real_escape_string($db_handle, $Adresse2);
    $Ville = mysqli_real_escape_string($db_handle, $Ville);
    $CodeP = mysqli_real_escape_string($db_handle, $CodeP);
    $Pays = mysqli_real_escape_string($db_handle, $Pays);
    $NumClient = mysqli_real_escape_string($db_handle, $NumClient);

    // Créer la requête d'insertion
    $sql = "INSERT INTO `compte_client` (Nom, Prénom, Adresse1, Adresse2, Ville, CodeP, Pays, NumClient) 
            VALUES ('$Nom', '$Prénom', '$Adresse1' , '$Adresse2', '$Ville', '$CodeP', '$Pays', '$NumClient')";

    // Exécuter la requête d'insertion
    if (mysqli_query($db_handle, $sql)) {
        echo "Données enregistrées avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'enregistrement des données : " . mysqli_error($db_handle);
    }

    // Fermer la connexion à la base de données
    mysqli_close($db_handle);
} else {
    echo "Erreur de connexion à la base de données.";
}
?>