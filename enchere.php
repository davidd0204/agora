<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Détails de l'article</title>
</head>
<body>
<?php
// Connexion à la base de données
$database = "script";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    // Récupération des informations de l'article depuis la base de données
    $id_article = 7; // ID de l'article à afficher (remplacez par la valeur souhaitée)
    $sql = "SELECT * FROM articles WHERE id_article = $id_article";
    $result = mysqli_query($db_handle, $sql);

    // Vérification si l'article existe
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nom = $row['nom'];
        $description = $row['description'];
        $photo = $row['photo'];
        $prix = $row['prix'];

        // Chemin vers le dossier contenant les images
        $imageFolder = "images/1.jpg";

        // Affichage des informations de l'article
        echo '<h1>Détails de l\'article</h1>';
        echo '<img src="' . $imageFolder . $photo . '" alt="Photo de l\'article">';
        echo '<h2>' . $nom . '</h2>';
        echo '<p>' . $description . '</p>';
        echo '<label for="prix">Prix:</label>';
        echo '<input type="number" id="prix" name="prix" value="' . $prix . '">';
    } else {
        echo 'Aucun article trouvé.';
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($db_handle);
} else {
    echo 'Erreur de connexion à la base de données.';
}
?>
</body>
</html>


