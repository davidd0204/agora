<?php
$database = "votre compte";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
$Prénom = isset($_POST["Prénom"]) ? $_POST["Prénom"] : "";
$Adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
$Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
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
if ($erreur == "") {
    echo "Formulaire valide.";
} else {
    echo "Erreur: <br>" . $erreur;
}

if ($db_found) {
    // Échapper les caractères spéciaux pour éviter les injections SQL
    $Nom = mysqli_real_escape_string($db_handle, $Nom);
    $Prénom = mysqli_real_escape_string($db_handle, $Prénom);
    $Adresse = mysqli_real_escape_string($db_handle, $Adresse);
    $Email = mysqli_real_escape_string($db_handle, $Email);

    // Créer la requête d'insertion
    $sql = "INSERT INTO `compte client`(`Nom`, `Prénom`, `Adresse`, `Email`) VALUES ('$Nom','$Prénom','$Adresse','$Email')";

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


