<!DOCTYPE html>
<html>
<head>
    <title>Caractéristiques de l'article</title>
</head>
<body>
    <h1>Caractéristiques de l'article</h1>

    <?php
    // Vérification si l'article a été sélectionné
    if (isset($_POST["article"])) {
        // Récupération de l'ID de l'article sélectionné
        $ID = $_POST["article"];

        // Connexion à la base de données
        $database = "parcourir";
        $db_handle = mysqli_connect('localhost', 'root', '', 'parcourir');
        $db_found = mysqli_select_db($db_handle, $database);

        if ($db_found) {
            // Récupération des caractéristiques de l'article depuis la base de données
            $sql = "SELECT * FROM articles_HDF WHERE ID = '$ID'";
            $result = mysqli_query($db_handle, $sql);

            // Vérification si un résultat a été trouvé
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Récupération des caractéristiques de l'article
                $Nom_article = $row["Nom_article"];
                $Photo_article = $row["Photo_article"];
                $Video = $row["Video"];
                $Description_article = $row["Description_article"];
                $Prix_article = $row["Prix_article"];
                $categorie = $row["categorie"];

                ?>

                <h2>Nom de l'article : <?php echo $Nom_article; ?></h2>
                <img src="<?php echo $Photo_article; ?>" width="500" height="400" alt="Image de l'article">
                <video src="<?php echo $Video; ?>" width="500" height="500" autoplay loop muted controls>
                Votre navigateur ne prend pas en charge la lecture de vidéos au format MP4.
                </video>
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
    } else {
        echo "Aucun article sélectionné.";
    }
    ?>
</body>
</html>