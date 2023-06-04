<!DOCTYPE html>
<html>
<head>
    <title>Caractéristiques de l'article</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
        }

        h1 {
            margin-bottom: 10px;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #f0f0f0;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        video {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 10px;
        }

        .buy-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
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
                $sql = "SELECT * FROM articles_reg WHERE ID = '$ID'";
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

                    <table>
                        <tr>
                            <th>Nom de l'article</th>
                            <td><?php echo $Nom_article; ?></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="<?php echo $Photo_article; ?>" alt="Image de l'article"></td>
                        </tr>
                        <tr>
                            <th>Vidéo</th>
                            <td>
                                <video src="<?php echo $Video; ?>" controls autoplay loop muted>
                                    Votre navigateur ne prend pas en charge la lecture de vidéos au format MP4.
                                </video>
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo $Description_article; ?></td>
                        </tr>
                        <tr>
                            <th>Prix</th>
                            <td><?php echo $Prix_article; ?></td>
                        </tr>
                        <tr>
                            <th>Catégorie</th>
                            <td><?php echo $categorie; ?></td>
                        </tr>
                    </table>

                    <p>

                        <a href="#" class="buy-button" type="button">Acheter</a>
                        <a class="buy-button" href="chat.php">Négocier</a>

                        <a href="#" class="buy-button" onclick="acheterArticle(<?php echo $ID; ?>)">Ajouter au panier</a>

                    </p>

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

        <script>
            function acheterArticle(articleID) {
                // Connexion à la base de données
                var database = "parcourir";
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "supprimer_article_reg.php?article=" + articleID, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            alert("Article supprimé avec succès.");
                            location.reload();
                        } else {
                            alert("Une erreur s'est produite lors de l'achat de l'article.");
                        }
                    }
                };
                xhr.send();
            }
        </script>
    </div>
</body>
</html>
