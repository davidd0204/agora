<!DOCTYPE html>
<html>
<head>
    <title>Sélection d'article</title>
</head>
<body>
    <h1>Selection d'article</h1>

    <form action="afficher_article.php" method="POST">
        <label for="article">Selectionnez un article :</label>
        <select name="article" id="article">
            <?php
            // Connexion à la base de données
            $database = "parcourir";
            $db_handle = mysqli_connect('localhost', 'root', '', 'parcourir');
            $db_found = mysqli_select_db($db_handle, $database);

            if ($db_found) {
                // Récupération des articles depuis la base de données
                $sql = "SELECT * FROM articles_reg";
                $result = mysqli_query($db_handle, $sql);

                // Vérification si des résultats ont été trouvés
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ID = $row["ID"];
                        $Nom_article = $row["Nom_article"];
                        ?>
                        <option value="<?php echo $ID; ?>"><?php echo $Nom_article; ?></option>
                        <?php
                    }
                } else {
                    echo "<option disabled>Aucun article trouvé</option>";
                }

                // Fermer la connexion à la base de données
                mysqli_close($db_handle);
            } else {
                echo "<option disabled>Erreur de connexion a la base de donnees</option>";
            }
            ?>
        </select>
        <br>
        <button type="submit">Afficher les caracteristiques de l'article</button>
    </form>
</body>
</html>