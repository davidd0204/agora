<!DOCTYPE html>
<html>
<head>
    <title>Caractéristiques de l'article</title>
</head>
<body>
    <h1>Caractéristiques de l'article</h1>

    <?php
    // Récupération de l'ID de l'article sélectionné
    $ID = isset($_POST["article"]) ? $_POST["article"] : "";

    // Connexion à la base de données
    $database = "parcourir";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if ($db_found) {
        // Récupération des caractéristiques de l'article depuis la base de données
        $sql = "SELECT * FROM articles_reg WHERE ID = '$ID'";
        $result = mysqli_query($db_handle, $sql);

        // Vérification si un résultat a été trouvé
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Récupération des caractéristiques de l'article
            $ID = $row["ID"];
            $Nom_article = $row["nom"];
            $Photo_article = $row["image"];
            $Video = $row["video"];
            $Description_article = $row["description"];
            $Prix_article = $row["prix"];                $categorie = $row["categorie"];
            ?>

            <h2>Nom de l'article : <?php echo $Nom_article; ?></h2>
            <img src="<?php echo $Photo_article; ?>" alt="Image de l'article">
            <video src="<?php echo $Video; ?>" controls></video>
            <p>Description : <?php echo $Description_article; ?></p>
            <p>Prix : <?php echo $Prix_article; ?></p>
            <p>Catégorie : <?php echo $categorie; ?></p>

            <?php
        } else {
            echo "Aucun article trouvé.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($db_handle);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
    ?>
</body>
</html>
