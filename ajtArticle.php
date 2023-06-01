<?php
$database = "script";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$nom = isset($_POST["name"]) ? $_POST["name"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";
$photo = isset($_POST["photo"]) ? $_POST["photo"] : "";
$categorie = isset($_POST["category"]) ? $_POST["category"] : "";
$prix = isset($_POST["price"]) ? $_POST["price"] : "";
$typeVente = isset($_POST["sale_type"]) ? $_POST["sale_type"] : "";
$erreur = "";

if ($nom == "") {
    $erreur .= "Le champ Nom est vide. <br>";
}
if ($description == "") {
    $erreur .= "Le champ Description est vide. <br>";
}
if ($photo == "") {
    $erreur .= "Le champ Photo est vide. <br>";
}
if ($categorie == "") {
    $erreur .= "Le champ Catégorie est vide. <br>";
}
if ($prix == "") {
    $erreur .= "Le champ Prix est vide. <br>";
}
if ($typeVente == "") {
    $erreur .= "Le champ Type de vente est vide. <br>";
}
if ($erreur == "") {
    echo "Formulaire valide.";
} else {
    echo "Erreur: <br>" . $erreur;
}

if ($db_found) {
    // Échapper les caractères spéciaux pour éviter les injections SQL
    $nom = mysqli_real_escape_string($db_handle, $nom);
    $description = mysqli_real_escape_string($db_handle, $description);
    $photo = mysqli_real_escape_string($db_handle, $photo);
    $categorie = mysqli_real_escape_string($db_handle, $categorie);
    $prix = mysqli_real_escape_string($db_handle, $prix);
    $typeVente = mysqli_real_escape_string($db_handle, $typeVente);

    // Créer la requête d'insertion
    $sql = "INSERT INTO articles (nom, description, photo, categorie, prix, type_vente) VALUES ('$nom','$description','$photo','$categorie','$prix','$typeVente')";

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
