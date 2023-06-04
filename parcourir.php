<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </script>

    <title>Parcourir les objets tech</title>
  <style>
    body{
        background-image: url(tech_fond3.jpg);
    }
     h1 {
      text-align: center;
      font-size: 45px;
      color: black;
      border: 2px solid black;
      padding: 10px;
      background-color: lightblue;
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
    padding: 0.5em;
    border: 2px solid black;
    background-color: rgba(255, 255, 255, 0.9);
    border-top: 0px;
}

#controles a{
    text-decoration: none;
    color: inherit;
}

button {
    margin-right: 35px;
    margin-left:35px;
    /* margin-block-end: 70px; */
    background-color: #6fdada;
    color: black;
    border-radius: 10px;
    cursor: pointer;
    /* Afficher une main quand on passe la souris dessus */
    padding: 6px 16px;
    line-height: 20px;
    font-size: 14px;
    font-weight: 600;
    transition: background-color 0.3s ease;
}
#nav{
			width: auto;
			float: right;
			padding: 5px;
			margin-bottom: 10px;
			top: 0;
			position: sticky;
            float:top;
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
th{
    color: whitesmoke;
}
label{
    color: whitesmoke;
}
table{
    border-color: whitesmoke;
}

#section{
    background-color: rgba(92, 170, 255, 0.7);
}
#entre img{
    border-radius: 50%;
}

#entre{
    padding: 0px;
    text-align: center;

}

  </style>
</head>
<body>
    <div id="entre"><img src="tech_agora.jpg"></div>
    <h1>Parcourir les objets tech</h1>
    <div id="controles" align="center">
        <table border="1">
            <a href="main.php">
                <button id="home">Home</button>
            </a>
            <a href="accueil2.html">
                <button id="acceuil">Accueil</button>
            </a>
            <a href="notification.html">
                <button id="notification">notifications</button>
            </a>
            <a href="panier.html">
                <button id="panier">Panier</button>
            </a>
            <a href="nouveauCompte.php">
                <button id="compte">Compte</button>
            </a>
        </table>
    </div>
    <div id="section">
        
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

</div>


  <div id="nav">
		<div>
			<a href="main.html">
				<button class="navigateur">Home</button>
			</a>
		</div>
		<div>
        <a href="accueil2.html">
            <button class="navigateur">Accueil</button>
        </a>
		</div>
		<div>
			<a href="notification.html">
				<button class="navigateur">Notifications</button>
			</a>
		</div>
		<div>
			<a href="panier.html">
				<button class="navigateur">Panier</button>
			</a>	
		</div>
		<div>
			<a href="nouveauCompte.html"><button class="navigateur">Votre Compte</button></a>
		</div>
	</div>

</body>
</html>





