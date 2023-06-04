<?php
	session_start();

	if(isset($_SESSION['id'])){
		$user_id= $_SESSION['id'];
	}
	else
	{
		echo "Vous n'êtes pas connecté";
		header("Location: nouveauCompte.php");
	}

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Tech Agora</title>
    <link rel="stylesheet" type="text/css" href="main.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="agora.js">
    </script>
    <style type="text/css">
    	img{
    		border-radius: 50%;
		}
    </style>

</head>


<body>
	<div class="entre"><img src="tech_agora.jpg"></div>
	
	<div id="controles">
		<table border="1">
			<a href="accueil2.html">
				<button id="acceuil">Accueil</button>
			</a>
			<form action="parcourir.php" method="post">
			<a href="parcourir.php">
				<button id="parcourir">Tout Parcourir</button>
			</a>
			</form>
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

	<div id="controles" class="image-container">
		<div class="team-title">
			<h2>L'équipe Tech Agora</h2>
			<h3>Vous accompagne au quotidien</h3>
		</div>
		<div class="image-gallery">
			<figure>
				<img src="david.jpg" width="250" height="250">
				<figcaption>David</figcaption>
			</figure>
			<figure>
				<img src="chamyl.jpg" width="250" height="250">
				<figcaption>Chamyl</figcaption>
			</figure>
			<figure>
				<img src="romain1.jpg" width="220" height="250">
				<figcaption>Romain</figcaption>
			</figure>
			<figure>
				<img src="hugo.jpg" width="250" height="250">
				<figcaption>Hugo</figcaption>
			</figure>
		</div>
	</div>
</body>
</html>