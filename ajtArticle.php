<?php
$database = "parcourir";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$nom = isset($_POST["name"]) ? $_POST["name"] : "";
$description = isset($_POST["description"]) ? $_POST["description"] : "";
$photo = isset($_POST["photo"]) ? $_POST["photo"] : "";
$categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : "";
$prix = isset($_POST["prix"]) ? $_POST["prix"] : "";
$typeVente = isset($_POST["type_v"]) ? $_POST["type_v"] : "";
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

        switch ($categorie) {
            case "article_regulier":
                $sql_reg = "INSERT INTO articles_reg (Nom_article, Description_article, Photo_article, Prix_article, categorie) 
                            VALUES ('$nom', '$description', '$photo', '$prix', '$categorie')";
                mysqli_query($db_handle, $sql_reg);
                break;

            case "article_haut_de_gamme":
                $sql_hdg = "INSERT INTO articles_hdg (Nom_article, Description_article, Photo_article, Prix_article, categorie) 
                            VALUES ('$nom', '$description', '$photo', '$prix', '$categorie')";
                mysqli_query($db_handle, $sql_hdg);
                break;

            case "article_rare":
                $sql_rare = "INSERT INTO articles_rare (Nom_article, Description_article, Photo_article, Prix_article, categorie) 
                              VALUES ('$nom', '$description', '$photo', '$prix', '$categorie')";
                mysqli_query($db_handle, $sql_rare);
                break;

            default:
                echo "Catégorie invalide.";
                break;
        }


    // Fermer la connexion à la base de données
    mysqli_close($db_handle);
} else {
    echo "Erreur de connexion à la base de données.";
}
?>
