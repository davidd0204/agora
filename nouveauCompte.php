<?php
    session_start();
    
    if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
        $type = $_SESSION['Type'];
        
        if($type == 0){
            header("Location: administrateur.html");
            exit(); // Assurez-vous d'ajouter cette ligne pour arrêter l'exécution du script après la redirection
        }
        elseif($type == 1){
            header("Location: vendeur.php");
            exit(); // Assurez-vous d'ajouter cette ligne pour arrêter l'exécution du script après la redirection
        }
        elseif($type == 2){
            header("Location: acheteur.html");
            exit(); // Assurez-vous d'ajouter cette ligne pour arrêter l'exécution du script après la redirection
        }
        else{
            echo "Type de compte inconnu.";
        }
    }
    else{
        echo "Vous n'êtes pas connecté";
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire création de compte</title>
    <link rel="stylesheet" type="text/css" href="style_general_1.css">
    <style >
    .bouton form {
        display: inline;
    }
    .bouton a {
        display: inline-block;
        margin: 10px;
    }
    
    </style>
</head>
<body>
    <div id="header">
        <h1 align="center" class="titre">Tech Agora</h1>
        <div class="bouton">
            <a href="main.php"><button class="navigateur">Home</button></a>
            <a href="accueil2.html"><button class="navigateur">Accueil</button></a>
            <form action="parcourir.php" method="POST">
                <a href="parcourir.php"><button class="navigateur">Tout Parcourir</button></a>
            </form>
            <button class="navigateur">Notifications</button>
            <button class="navigateur">Panier</button>
        </div>
    </div>
    <div id="section">
        <h3 align="center">Créer un compte</h3>
        <h4 align="center">Saisissez vos données</h4>
        <form action="newAccount.php" method="post">
            <table border=1 align="center">
                <tr>
                    <td>Nom : </td>
                    <td><input type="text" name="Nom"></td>
                </tr>
                <tr>
                    <td>Prénom : </td>
                    <td><input type="text" name="Prénom"></td>
                </tr>
                <tr>
                    <td>Adresse : </td>
                    <td><input type="text" name="Adresse"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="text" name="Email"></td>
                </tr>
                <tr>

                    <td>Mot de passe </td>
                    <td><input type="password" name="Password1"></td>
                </tr>
                <tr>
                    <td>Confirmer le mot de passe </td>
                    <td><input type="password" name="Password2"></td>
                </tr>
                <tr>
                    <td>Vous êtes acheteur ou vendeur ? </td>
                    <td><input type="radio" id="acheteur" name="Type" value="acheteur">
                    <label for="acheteur">Client</label><br>
                    <input type="radio" id="vendeur" name="Type" value="vendeur">
                    <label for="acheteur">Vendeur</label><br></td>
                </tr>

                <tr>

                    <td colspan="2" align="center"><input type="submit" name="soumettre" ></td>
                </tr>
            </table>
        </form>
        <li><a href="identification.html">Déja un compte? Se connecter</a></li>
    </div>
</body>
</html>

