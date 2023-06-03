<!DOCTYPE html>
<html>
<head>
    <title>Article</title>
</head>
<body>
    <h1>Article</h1>

    <?php
    // Connexion à la base de données
    $database = "parcourir"; 
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    // Vérification de la connexion à la base de données
    if ($db_found) {
        // Récupération des informations de l'article depuis la base de données
        $sql = "SELECT * FROM articles_reg";
        $result = mysqli_query($db_handle, $sql);

        // Vérification si des résultats ont été trouvés
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $ID = $row["ID"];
                $Nom_Article = $row["nom"];
                $Photo_article = $row["image"];
                $Video = $row["video"];
                $Description_article = $row["description"];
                $Prix_article = $row["prix"];
                $categorie = $row["categorie"];
                ?>

                <h2>ID de l'article : <?php echo $ID; ?></h2>
                <h2>Nom de l'article : <?php echo $Nom_Article; ?></h2>
                <img src="<?php echo $Photo_article; ?>" alt="Image de l'article">
                <video src="<?php echo $Video; ?>" controls></video>
                <p>Description : <?php echo $Description_article; ?></p>
                <p>Prix : <?php echo $Prix_article; ?></p>
                <p>Catégorie : <?php echo $categorie; ?></p>
                <hr>

                <?php
            }
        } else {
            echo "Aucun article trouvé dans la base de données.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($db_handle);
    } else {
        echo "Erreur de connexion à la base de données.";
    }
    ?>
</body>
</html>