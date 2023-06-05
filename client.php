<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire création de compte</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <style >
    .bouton form {
        display: inline;
    }
    .bouton a {
        display: inline-block;
        margin: 10px;
    }

    .entre img{
        border-radius: 50%;
    }

    #header{
        background-color: rgba(255, 255,255, 0.8);
    }

    #section{
        background-color: rgba(255, 255,255, 0.5);
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
                <a href="parcourir.php"><button class="navigateur">Tout Parcourir</button></a>
            </form>
            <button class="navigateur">Notifications</button>
            <button href="panier.html" class="navigateur">Panier</button>
        </div>
    </div>
    </div>
</body>
</html>