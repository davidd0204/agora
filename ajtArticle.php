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

if ($nom == "" || $description == "" || $photo == "" || $categorie == "" || $prix == "" || $typeVente == "") {
    $erreur = "Veuillez remplir tous les champs du formulaire.";
} else {
    if ($db_found) {

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

        mysqli_close($db_handle);

        if (mysqli_errno($db_handle) == 0) {
            echo "<script>alert('Article ajouté avec succès.');</script>";
        } else {
            echo "<script>alert('Article non ajouté.');</script>";
        }

        echo "<script>window.location.href = 'vendeur.php';</script>";
        exit();
    } else {
        echo "Erreur de connexion à la base de données.";
    }
}

echo "Erreur: <br>" . $erreur;
?>
