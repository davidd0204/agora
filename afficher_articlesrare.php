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
    <div class="entre"><img src="tech_agora.jpg"></div>
    <div id="header">
        <h1 align="center" class="titre">Tech Agora</h1>
        <div class="bouton">

            <a href="main.php"><button class="navigateur">Home</button></a>

            <a href="accueil2.html"><button class="navigateur">Accueil</button></a>
            <form action="parcourir.php" method="POST">
                <a href="nouveauCompte.php"><button class="navigateur">Compte</button></a>
            </form>
            <button class="navigateur">Notifications</button>
            <button href="panier.html" class="navigateur">Panier</button>
        </div>
    </div>
    <div class="container">
        <h1>Caractéristiques de l'article</h1>

        <?php

        if (isset($_POST["article"])) {

            $ID = $_POST["article"];


            $database = "parcourir";
            $db_handle = mysqli_connect('localhost', 'root', '', 'parcourir');
            $db_found = mysqli_select_db($db_handle, $database);

            if ($db_found) {

                $sql = "SELECT * FROM articles_rare WHERE ID = '$ID'";
                $result = mysqli_query($db_handle, $sql);


                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

 
                    $Nom_article = $row["Nom_article"];
                    $Photo_article = $row["Photo_article"];
                    $Video = $row["Video"];
                    $Description_article = $row["Description_article"];
                    // Remplacer les caractères \n par des balises <br>
                    $Description_article = nl2br($Description_article);
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
                        <a href="#" class="buy-button" onclick="acheterArticle(<?php echo $ID; ?>)">Ajouter au panier</a>
                    </p>

                    <?php
                } else {
                    echo "Aucun article trouvé.";
                }


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

                var database = "parcourir";
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "supprimer_article_rare.php?article=" + articleID, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            alert("Article ajouté avec succès.");
                            header("Location: client.html");
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
