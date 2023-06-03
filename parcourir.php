<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </script>
    <title>Parcourir les objets tech</title>
  <style>
     h1 {
      text-align: center;
      font-size: 45px;
      color: black;
      border: 2px solid black;
      padding: 10px;
    }
    table {
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
    }
    #carrousel {
    display: flex;
}

#carrousel img {
    margin-left: auto;
    margin-right: auto;
    border-radius: 6px;
    transition: 500;
    height: 0px;
}

#controles {
    display: flex;
    margin-top: 20px;
    margin-bottom: 20px;
}

button {
    margin-top: 20px; 
    background-color: #2ea44f;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    /* Afficher une main quand on passe la souris dessus */
    padding: 6px 16px;
    line-height: 20px;
    font-size: 14px;
    font-weight: 600px;
}

button:hover {
    background-color: #207137;
}

.image-navigation {
    width: 60px;
    margin-right: 20px;
    margin-left: 20px;
    margin-bottom: 20px;
    height: auto;
    /* Zoomer sur l'image plutôt que déformer en cas de taille différente */
    cursor: pointer;
}
#carrousel img.zoom {
  transform: scale(1.1); /* Ajustez la valeur pour déterminer le niveau de zoom */
}

  </style>
</head>
<body>
    <h1>Parcourir les objets tech</h1>

  <table>
    <tr>
      <th>Articles réguliers</th>
      <td>
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
    </div>
    </td>
    </tr>
    <tr>
      <th>Articles haut de gamme</th>
      <td>
      <form action="afficher_articlesHDG.php" method="POST">
        <label for="article">Selectionnez un article :</label>
        <select name="article" id="article">
            <?php
            // Connexion à la base de données
            $database = "parcourir";
            $db_handle = mysqli_connect('localhost', 'root', '', 'parcourir');
            $db_found = mysqli_select_db($db_handle, $database);

            if ($db_found) {
                // Récupération des articles depuis la base de données
                $sql = "SELECT * FROM articles_HDG";
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
      </td>
      
    </tr>
    <tr>
      <th>Articles rares</th>
      <td>
      <form action="afficher_articlesrare.php" method="POST">
        <label for="article">Selectionnez un article :</label>
        <select name="article" id="article">
            <?php
            // Connexion à la base de données
            $database = "parcourir";
            $db_handle = mysqli_connect('localhost', 'root', '', 'parcourir');
            $db_found = mysqli_select_db($db_handle, $database);

            if ($db_found) {
                // Récupération des articles depuis la base de données
                $sql = "SELECT * FROM articles_rare";
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
      </td>
    </tr>
  </table>

</body>
</html>




