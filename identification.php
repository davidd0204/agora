<?php
$database = "votre compte";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$ID = isset($_POST["Login"]) ? $_POST["Login"] : "";
$MDP = isset($_POST["Mot de passe"]) ? $_POST["Mot de passe"] : "";
$erreur = "";

if ($ID == "") {
    $erreur .= "Le champ Login est vide. <br>";
}
if ($MDP == "") {
    $erreur .= "Le champ Mot de passe est vide. <br>";
} else {
    echo "Erreur: <br>" . $erreur;
}

if ($db_found) {
    // Échapper les caractères spéciaux pour éviter les injections SQL
    $ID = mysqli_real_escape_string($db_handle, $ID);
    $MDP = mysqli_real_escape_string($db_handle, $MDP);
    

    // Créer la requête d'insertion
    $sql = "INSERT INTO `identification`(`Login`, `Mot de passe`) VALUES ('[$ID]','[$MDP]')";

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

